<?php

namespace App\Providers;

use App\Support\CustomSessionHandler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class SessionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Session::extend('mydb', function (Application $app) {
            return new CustomSessionHandler(
                $app->db->connection(config('session.connection')),
                config('session.table'),
                config('session.lifetime'),
                $app
            );
        });
    }
}
