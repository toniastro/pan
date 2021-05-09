<?php

namespace App\Traits;

trait PublishNotifiableTrait
{
    public function getSubscriberUrl()
    {
        return $this->url;
    }
}