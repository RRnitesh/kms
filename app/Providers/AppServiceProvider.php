<?php

namespace App\Providers;

use App\Repository\Contracts\UserRepositoryInterface;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    // when userreposiroty is to be used then 
    // it must know it gets data from userrepositiry interface
    // which means registering classes, interfaces, or other services into Laravel’s Service Container.
    // 
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(): void
    {
        //
    }
}
