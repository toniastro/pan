<?php

namespace App\Providers;

use App\Repositories\SubscriptionRepository;
use App\Repositories\Interfaces\SubscriptionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function boot()
    {
        $this->app->bind(SubscriptionRepositoryInterface::class, SubscriptionRepository::class);
    }
}