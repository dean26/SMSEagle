<?php 

namespace SMSEagle\Method;

class JsonRPC extends Method
{

    protected array $params;

    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    public function getSendSmsUrl(): string
    {
        return '/jsonrpc/sms';
    }

    public function getUrlParams(): string
    {
        $params_url = '';
        foreach($this->params as $key => $value) $params_url .= "&{$key}={$value}";
        return $params_url;
    }

    public function getArrayParams(): array
    {
        return $this->params;
    }

}