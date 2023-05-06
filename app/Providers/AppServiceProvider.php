<?php

namespace App\Providers;

use App\Repositories\Eloquents\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquents\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\CategoryService;
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



        /* Binding Repositories*/
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        // Category
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
