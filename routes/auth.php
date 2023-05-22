<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ChangePasswordController;

Route::middleware('guest')->group(function () {
    Route::get('registrazione', [RegisteredUserController::class, 'create'])
                ->name('registrazione');

    Route::post('registrazione', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('password', [ChangePasswordController::class, 'create'])
        ->name('password');

    Route::post('password', [ChangePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
