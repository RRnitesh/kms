<?php

namespace App\Providers;

use App\Repository\Interface\UserRepositoryInterface;
use App\Repository\Implementation\UserRepository;
use App\Services\Implementation\FileUpLoadService;
use App\Services\Implementation\UserService;
use App\Services\Interface\FileUpLoadServiceInterface;
use App\Services\Interface\UserServiceInterface;

use AuthService;
use AuthServiceInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        // when ever interface is defined this line tells it to use the userService
        $this->app->bind(UserServiceInterface::class, UserService::class);
        //  meaning that when userserviceinterface is defined in the controlelr then 
        // it says to refer to that userserice 

          $this->app->bind(FileUpLoadServiceInterface::class, FileUpLoadService::class);
          
        //   $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    public function boot(): void
    {
        //
        Paginator::useBootstrap();
    }
}
