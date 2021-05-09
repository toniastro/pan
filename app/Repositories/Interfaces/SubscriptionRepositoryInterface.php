<?php

namespace App\Repositories\Interfaces;

interface SubscriptionRepositoryInterface
{
    public function subscribe($topic, $url);

    public function publish($topic, $body);   
}