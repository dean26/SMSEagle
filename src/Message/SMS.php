<?php

namespace SMSEagle\Message;

class SMS extends Message
{

    public string $to;
    public string $message;

    public function __construct(string $to, string $message)
    {
        $this->to = $to;
        $this->message = urlencode($message);
    }

    public function getUrlParams()
    {
        return "&to={$this->to}&message={$this->message}";
    }

    public function getArrayParams()
    {
        return ['to' => $this->to, 'message' => $this->message];
    }

    public function send(string $url, array $params):bool
    {
        $cURLConnection = curl_init();

        $url_params = http_build_query(array_merge($params, $this->getArrayParams()));

        curl_setopt($cURLConnection, CURLOPT_URL, "{$url}?{$url_params}");
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        if (substr($response, 0, 2) == "OK") {
            return true;
        } else {
            return false;
        }
    }
}
