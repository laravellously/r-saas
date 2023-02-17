<?php

use App\Http\Controllers\SubscriptionController;
use App\Http\Livewire\RegisterComplete;
use App\Http\Middleware\CheckIfSubscribed;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Contracts\Tenant;
use TCG\Voyager\Facades\Voyager;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'landing')->name('landing');
Route::post('checkout', [SubscriptionController::class, 'checkout'])->name('checkout');
Route::post('paddle/webhook', [SubscriptionController::class, 'webhook'])->name('webhook');

Route::view('pricing', 'pricing')
    ->name('pricing')
    ->middleware(['guest:' . config('fortify.guard')]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    // CheckIfSubscribed::class
])->group(function () {
    // Route::view('dashboard', function () {
    //     $tenant = Tenant::find(2);
    //     tenancy()->initialize($tenant);
    //     return view('tail');
    // })->name('dashboard');
    Route::view('set', 'set')->name('set');
    /*
    |   Subscription
    */
    Route::get('checkout/welcome', RegisterComplete::class);
    Route::controller(SubscriptionController::class)->group(function () {

        Route::post('cancel', 'cancel')->name('cancel');
        Route::post('subscribe', 'subscribe')->name('subscribe');
        Route::post('switch', 'switch')->name('switch');
    });
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});