<?php

namespace App\Providers;

use App\Interfaces\INewsServices;
use App\Interfaces\IUserServices;
use App\Services\NewsServices;
use App\Services\UserServices;
use Illuminate\Support\ServiceProvider;

class BindingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(INewsServices::class,NewsServices::class);
        $this->app->bind(IUserServices::class,UserServices::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
