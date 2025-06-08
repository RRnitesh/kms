<?php

namespace App\Providers;

use App\Repository\Interface\UserRepositoryInterface;
use App\Repository\Implementation\UserRepository;

use App\Services\Implementation\UserService;
use App\Services\Interface\UserServiceInterface;
use App\Services\Interface\FileUploadServiceInterface;
use App\Services\Implementation\FileUploadService;
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

          $this->app->bind(FileUploadServiceInterface::class, FileUploadService::class);
    }

    public function boot(): void
    {
        //
        Paginator::useBootstrap();
    }
}
