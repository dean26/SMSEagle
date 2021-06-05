<?php

namespace SMSEagle\Auth;

abstract class Auth
{
    public abstract function getUrlParams();
    public abstract function getArrayParams();
}