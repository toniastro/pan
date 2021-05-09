<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublishRequest;
use App\Http\Requests\SubscriptionRequest;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\SubscriptionRepositoryInterface;

class SubscribePublishController extends Controller
{

    protected $repository;

    public function __construct(SubscriptionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function subscribe(SubscriptionRequest $request, $topic)
    {
        $create = $this->repository->subscribe($topic, $request->url);
        if(!empty($create)){
            return response()->json($create, 200);
        }
       return response()->json(['error' => 'Something went wrong creating subscriber'], 500);
    }

    public function publish(PublishRequest $request, $topic)
    {
        return $this->repository->publish($topic, $request->body) ? 
            response()->json(['message' => 'Notification sent '], 200) : response()->json(['message' => 'Publish failed '], 500) ; 
    }
}
