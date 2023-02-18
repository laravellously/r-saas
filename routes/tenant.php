<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Features\UserImpersonation;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
// use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;

Route::group([
    'name' => 'tenant.',
    'prefix' => '/{tenant}',
    'middleware' => [
        InitializeTenancyByPath::class,
        CheckIfSubscribed::class
    ],
],function () {
    Route::get('/welcome', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });

    Route::view('dashboard', 'tail')->name('dashboard');

    Route::get('/impersonate/{token}', function ($token) {
        return UserImpersonation::makeResponse($token);
    })->name('impersonate');
});
