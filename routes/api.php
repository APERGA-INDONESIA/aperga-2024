<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

define('AUTH', App\Http\Controllers\Api\V1\Auth\AuthController::class);

Route::prefix("/v1")->group(function () {

    // Health
    Route::get('/health', function () {
        return response()->json([
            "status" => "OK"
        ]);
    })->name("health");

    // No Middleware Routes
    Route::prefix("/auth")->group(function () {
        Route::post('/login', [AUTH, 'login'])->name('api_auth_login');
    });

    // Middleware Routes
    Route::middleware("session")->group(function () {
        Route::prefix("/auth")->group(function () {
            Route::get('/get', [AUTH, 'index'])->name('api_auth_get');
            Route::post('/logout', [AUTH, 'logout'])->name('api_auth_logout');
        });
    });
});
