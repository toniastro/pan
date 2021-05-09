<?php

namespace App\Notifications;

use App\Channels\SubscribersChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class PublishNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $body;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SubscribersChannel::class];
    }

    public function toSubscriber($notifiable)
    {
        return [
            'topic' => $notifiable->topic,
            'body' =>  json_decode($this->body),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
