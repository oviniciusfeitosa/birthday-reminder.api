<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::domain('auth')
        ->name('auth.register')
        ->post('/register', [AuthController::class, 'register']);
    Route::domain('auth')
        ->name('auth.login')
        ->post('/login', [AuthController::class, 'login']);
    Route::domain('auth')
        ->name('auth.profile')
        ->get('/user-profile', [AuthController::class, 'userProfile']);
    Route::domain('auth')
        ->name('auth.refresh')
        ->post('/refresh', [AuthController::class, 'refresh']);
    Route::domain('auth')
        ->name('auth.logout')
        ->post('/logout', [AuthController::class, 'logout']);
});
