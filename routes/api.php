<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\InitializeTenancyById;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[AuthController::class, 'login']);
Route::post('logout',[AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

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
    'auth:sanctum',
    InitializeTenancyById::class
])->group(function () {
    Route::get('tenancy', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
});
