<?php 

namespace SMSEagle\Method;

abstract class Method
{
    abstract public function getSendSmsUrl();
    abstract public function getUrlParams();
    abstract public function getArrayParams();
}