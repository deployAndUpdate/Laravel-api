<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\UserService;
//use App\Models\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(UserService $userService): void
    {
//        View::share('users', User::all());

        View::composer('users.index', function ($view) use ($userService) {
            $view->with('users', $userService->getAllUsers());
        });

    }
}
