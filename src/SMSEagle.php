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
        return "http://{$this->host}";
    }

    public function getFullUrl():string
    {
        return $this->getBaseUrl() . $this->method->getSendSmsUrl() . 
            $this->auth->getUrlParams() . $this->method->getParams();
    }

    public function send(Message $message):bool
    {
        return $message->send($this->getFullUrl());
    }
}