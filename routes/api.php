<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DepositController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\InitializeTenancyByAPIKey;

/*
|--------------------------------------------------------------------------
| Tenant API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your tenants. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware([
    InitializeTenancyByAPIKey::class
])->group(function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::middleware([
        CheckAuth::class
    ])->group(function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
    });

    // TransactionCreate
    Route::post('deposit', [DepositController::class, 'store']);
    Route::get('deposit/{wallet}', [DepositController::class, 'index']);

    Route::post('transfer', [TransactionController::class, 'transfer']);
    Route::get('transaction/{receipt}', [TransactionController::class, 'show']);
});
