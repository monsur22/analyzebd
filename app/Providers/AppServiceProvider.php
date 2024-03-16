<?php

namespace App\Providers;

use App\Events\UserActionEvent;
use App\Listeners\UserActionListener;
use App\Services\AddressService;
use App\Services\Interfaces\AddressServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Services\UserService;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(AddressServiceInterface::class, AddressService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            UserActionEvent::class,
            UserActionListener::class
        );
    }
}
