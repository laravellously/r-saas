<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Application;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
use App\Support\CustomSessionHandler;
use Illuminate\Session\DatabaseSessionHandler;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        //This is how the session is normally registered: https://github.com/laravel/framework/blob/8.x/src/Illuminate/Session/SessionManager.php#L83
        Session::resolved(function ($session) {
            $session->extend('screen', function ($app) {
                $table = $app['config']['session.table'];
                $lifetime = $app['config']['session.lifetime'];
                $connection = $app['db']->connection($app['config']['session.connection']);
                return new DatabaseSessionHandler($connection, $table, $lifetime, $app);
            });
        });

        // This is how the driver "session" is normally registered: https://github.com/laravel/framework/blob/8.x/src/Illuminate/Auth/AuthManager.php#L121
        Auth::resolved(function ($auth) {
            $auth->extend('c-session', function (Application $app, $name, array $config) {
                $provider = Auth::createUserProvider($config['provider']);

                $guard = new SessionGuard($name, $provider, $app->session->driver('c-db'));

                if (method_exists($guard, 'setCookieJar')) {
                    $guard->setCookieJar($this->app['cookie']);
                }

                if (method_exists($guard, 'setDispatcher')) {
                    $guard->setDispatcher($this->app['events']);
                }

                // if (method_exists($guard, 'setRequest')) {
                //     $guard->setRequest($this->app->refresh('request', $guard, 'setRequest'));
                // }
                return $guard;
            });
        });

        $this->registerPolicies();

        //
    }
}
