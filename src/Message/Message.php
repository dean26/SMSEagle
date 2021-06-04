<?php 

namespace SMSEagle\Message;

abstract class Message
{
    abstract public function getUrlParams();
    abstract public function send(string $url);
}