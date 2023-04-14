<?php

namespace App\Providers;

use App\Interfaces\AdminInterface;
use App\Interfaces\AuthInterface;
use App\Interfaces\BlogInterface;
use App\Interfaces\CommentInterface;
use App\Interfaces\LikeInterface;
use App\Interfaces\UserInterface;
use App\Interfaces\VerificationInterface;
use App\Interfaces\VerifyMailInterface;
use App\Services\AdminService;
use App\Services\AuthService;
use App\Services\BlogService;
use App\Services\CommentService;
use App\Services\LikeService;
use App\Services\UserService;
use App\Services\VerifyMailService;
use App\Services\VerifyService;
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

        $this->app->bind(VerifyMailInterface::class, function () {
            return new VerifyMailService();
        });

        $this->app->bind(VerificationInterface::class, function () {
            $userService = $this->app->make(UserService::class);
            return new VerifyService($userService);
        });

        $this->app->bind(BlogInterface::class, function () {
            return new BlogService();
        });

        $this->app->bind(CommentInterface::class, function () {
            return new CommentService();
        });

        $this->app->bind(LikeInterface::class, function () {
            return new LikeService();
        });

        $this->app->bind(AdminInterface::class, function () {
            return new AdminService();
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
