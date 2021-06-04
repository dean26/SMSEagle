<?php

namespace SMSEagle\Auth;

class Token extends Auth
{

    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function getUrlParams(): string
    {
        return "?access_token={$this->token}";
    }
    
}