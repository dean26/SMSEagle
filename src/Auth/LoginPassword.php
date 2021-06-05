<?php

namespace SMSEagle\Auth;

class LoginPassword extends Auth
{

    private string $login;
    private string $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function getUrlParams(): string
    {
        return "login={$this->login}&pass={$this->password}";
    }

    public function getArrayParams(): array
    {
        return ['login' => $this->login, 'pass' => $this->password];
    }
    
}