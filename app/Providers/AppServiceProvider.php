<?php

namespace App\Providers;

use App\Interfaces\AuthInterface;
use App\Interfaces\UserInterface;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, function () {
            return new UserService();
        });

        $this->app->bind(AuthInterface::class, function () {
            return new AuthService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}