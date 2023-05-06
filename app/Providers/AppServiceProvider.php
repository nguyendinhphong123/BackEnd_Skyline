<?php

namespace App\Providers;

use App\Repositories\Eloquents\RoomRepository;
use App\Repositories\Eloquents\UserRepository;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\RoomServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\RoomService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       /*
            Các interface không thể dùng để khởi tạo đối tượng
            Binding interface với một lớp giúp chúng ta có thể dùng được
            Tắt dòng binding là thấy tai hại liền :)
        */
        /* Binding Services*/
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(RoomServiceInterface::class, RoomService::class);


        
        /* Binding Repositories*/
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(RoomRepositoryInterface::class, RoomRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
