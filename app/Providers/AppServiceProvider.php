<?php

namespace App\Providers;

use App\Repository\Implementation\AuthRepository;
use App\Repository\Implementation\SubTopicRepository;
use App\Repository\Implementation\TopicRepository;
use App\Repository\Interface\UserRepositoryInterface;
use App\Repository\Implementation\UserRepository;
use App\Repository\Interface\AuthRepositoryInterface;
use App\Repository\Interface\SubTopicRepositoryInterface;
use App\Repository\Interface\TopicRepositoryInterface;
use App\Services\Implementation\AuthService;
use App\Services\Implementation\FileUpLoadService;
use App\Services\Implementation\SubTopicService;
use App\Services\Implementation\TopicService;
use App\Services\Implementation\UserService;
use App\Services\Interface\AuthServiceInterface;
use App\Services\Interface\FileUpLoadServiceInterface;
use App\Services\Interface\SubTopicServiceInterface;
use App\Services\Interface\TopicServiceInterface;
use App\Services\Interface\UserServiceInterface;

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
        $this->app->bind(TopicServiceInterface::class, TopicService::class);
        $this->app->bind(TopicRepositoryInterface::class, TopicRepository::class);


        $this->app->bind(SubTopicServiceInterface::class, SubTopicService::class);
        $this->app->bind(SubTopicRepositoryInterface::class, SubTopicRepository::class);


        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
    }

    public function boot(): void
    {
        //
        Paginator::useBootstrap();
    }
}
