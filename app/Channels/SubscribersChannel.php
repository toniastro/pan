<?php

namespace App\Channels;

use App\Notifications\PublishNotification;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Http;

class SubscribersChannel
{
 
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function send($notifiable, PublishNotification $notification)
    {
        if (method_exists($notification, 'toSubscriber')) {
            $data = (array) $notification->toSubscriber($notifiable);
        } else {
            $data = $notification->toArray($notifiable);
        }
        $response = Http::post($notifiable->getSubscriberUrl(), $data);
        if($response->ok())
        {
            $this->logger->debug('Subscriber successfully notified at '. $notifiable->getSubscriberUrl());
            return;
        }
        $this->logger->error('Subscriber failed in notify at '. $notifiable->getSubscriberUrl());
        return;
    }
}