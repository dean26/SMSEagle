<?php

namespace SMSEagle\Message;

class MMS extends Message
{

    public string $to;
    public string $message;
    public array $attachments;

    public function __construct(string $to, string $message, array $attachments)
    {
        $this->to = $to;
        $this->message = urlencode($message);
        $this->attachments = $attachments;
    }

    public function getUrlParams()
    {
        return "&to={$this->to}&message={$this->message}";
    }

    public function getArrayParams()
    {
        return ['message_type' => 'mms', 'response' => 'extended', 'to' => $this->to, 'message' => $this->message, 'attachments' => [$this->attachments]];
    }

    public function send(string $url, string $port, array $params):bool
    {
        $cURLConnection = curl_init();

        $all_params = [
            "method" => "sms.send_sms",
            "params" => array_merge($params, $this->getArrayParams())
        ];

        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_PORT, $port);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, json_encode($all_params, JSON_UNESCAPED_SLASHES));

        $response = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $response_array = json_decode($response, true);

        if (isset($response_array['result']) && substr($response_array['result'], 0, 2)  == "OK") {
            return true;
        } else {
            return false;
        }
    }
}
