<?php

namespace App\Repositories;

use App\Models\Subscription;
use Illuminate\Contracts\Events\Dispatcher;
use App\Notifications\PublishNotification;
use App\Repositories\Interfaces\SubscriptionRepositoryInterface;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{

    protected $subscription;

    public function __construct(Subscription $subscription, Dispatcher $dispatcher)
    {
        $this->subscription = $subscription;
    }

    public function subscribe($topic, $url)
    {
        return $this->subscription->create(['topic' => $topic,'url' =>  $url]);
    }

    public function publish($topic, $body)
    {
        try{
            $subscribers = $this->subscription->where('topic', $topic)->get();
            foreach($subscribers as $subscribe){
                $subscribe->notify(new PublishNotification($body));
            }
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
}