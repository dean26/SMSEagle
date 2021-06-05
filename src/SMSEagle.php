<?php

namespace SMSEagle;
use SMSEagle\Auth\Auth;
use SMSEagle\Method\Method;
use SMSEagle\Message\Message;

class SMSEagle
{
    protected string $host;
    protected Auth $auth;
    protected Method $method;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function setHost(string $host)
    {
        $this->host = $host;
    }

    public function setMethod(Method $method)
    {
        $this->method = $method;
    }

    public function getBaseUrl():string
    {
        return "http://{$this->host}{$this->method->getSendSmsUrl()}";
    }

    public function getAllParamsArray():array
    {
        return array_merge($this->auth->getArrayParams(), $this->method->getArrayParams());
    }

    public function send(Message $message):bool
    {
        return $message->send($this->getBaseUrl(), $this->getAllParamsArray());
    }
}