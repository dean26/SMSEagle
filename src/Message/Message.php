<?php 

namespace SMSEagle\Message;

abstract class Message
{
    abstract public function getUrlParams();
    abstract public function getArrayParams();
    abstract public function send(string $url, string $port, array $params);
}