<?php

namespace App\Providers;

use App\Repositories\Eloquents\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquents\CategoryRepository;
use App\Repositories\Eloquents\CustomerRepository;
use App\Repositories\Eloquents\GroupRepository;
use App\Repositories\Eloquents\RoomRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\CategoryService;
use App\Services\CustomerService;
use App\Services\GroupService;
use App\Services\Interfaces\CustomerServiceInterface;
use App\Services\Interfaces\GroupServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use App\Services\RoomService;
use Illuminate\Pagination\Paginator;

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
        // Category
        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
        // Customer
        $this->app->singleton(CustomerServiceInterface::class, CustomerService::class);
        // room
        $this->app->singleton(RoomServiceInterface::class, RoomService::class);
        // groups
        $this->app->singleton(GroupServiceInterface::class, GroupService::class);


        /* Binding Repositories*/
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        // Category
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        // Customer
        $this->app->singleton(CustomerRepositoryInterface::class, CustomerRepository::class);
        // room
        $this->app->singleton(RoomRepositoryInterface::class, RoomRepository::class);
        // room
        $this->app->singleton(GroupRepositoryInterface::class, GroupRepository::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
         Paginator::useBootstrapFour();
    }
}
