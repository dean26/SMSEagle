<?php 

namespace SMSEagle\Method;

class HttpApi extends Method
{

    protected array $params;

    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    public function getSendSmsUrl(): string
    {
        return '/http_api/send_sms';
    }

    public function getParams(): string
    {
        $params_url = '';
        foreach($this->params as $key => $value) $params_url .= "&{$key}={$value}";
        return $params_url;
    }

}