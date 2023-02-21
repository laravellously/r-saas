<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Features\UserImpersonation;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use App\Http\Middleware\CheckIfSubscribed;

Route::middleware([
    InitializeTenancyByPath::class,
    // CheckIfSubscribed::class
])->name('tenant.')->prefix('u/{tenant}')->group(function () {
    Route::get('/welcome', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    })->name('welcome');

    Route::view('home', 'home')->name('dashboard');
    Route::view('settings', 'settings')->name('settings');
    Route::view('users', 'users')->name('users');
    Route::view('deposits', 'deposits')->name('deposits');
    Route::view('transactions', 'transactions')->name('transactions');

    Route::get('/impersonate/{token}', function ($token) {
        return UserImpersonation::makeResponse($token);
    })->name('impersonate');
});
