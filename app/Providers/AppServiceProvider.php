<?php

namespace App\Providers;

use App\Actions\Voyager\Impersonate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {


        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Voyager::addAction(Impersonate::class);

        Blade::directive('isTenant',function (){
            return tenant();
        });

        Blade::directive('subscribed', function ($plan) {
            return "<?php if (!auth()->guest() && auth()->user()->subscribed($plan)) { ?>";
        });

        Blade::directive('notsubscribed', function () {
            return "<?php } else { ?>";
        });

        Blade::directive('endsubscribed', function () {
            return "<?php } ?>";
        });


        // Subscriber Directives

        Blade::directive('subscriber', function () {
            return "<?php if (!auth()->guest() && auth()->user()->subscriber()) { ?>";
        });

        Blade::directive('notsubscriber', function () {
            return "<?php } else { ?>";
        });

        Blade::directive('endsubscriber', function () {
            return "<?php } ?>";
        });


        // Trial Directives

        Blade::directive('trial', function ($plan) {
            return "<?php if (!auth()->guest() && auth()->user()->onTrial()) { ?>";
        });

        Blade::directive('nottrial', function () {
            return "<?php } else { ?>";
        });

        Blade::directive('endtrial', function () {
            return "<?php } ?>";
        });

        Blade::directive('role', function ($role) {
            return "<?php if (!auth()->guest() && auth()->user()->hasRole($role)) { ?>";
        });

        Blade::directive('notrole', function () {
            return "<?php } else { ?>";
        });


        Blade::directive('endrole', function () {
            return "<?php } ?>";
        });
    }
}
