<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ModificainfoController;
use App\Http\Controllers\ClientController;

Route::middleware('guest')->group(function () {
    Route::get('registrazione', [RegisteredUserController::class, 'create'])
        ->name('registrazione');

    Route::post('registrazione', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('cambia-password', [ChangePasswordController::class, 'create'])
        ->name('cambia-password');

    Route::get('/profilo-cliente', [ClientController::class, 'show'])->name('profilo-cliente');

    Route::post('cambia-password', [ChangePasswordController::class, 'store']);

    Route::get('/modifica-info', [ModificainfoController::class, 'create'])->name('modifica-info');

    Route::post('/modifica-info', [ModificainfoController::class, 'store']);

    Route::get('/acquisto/{id}', [ClientController::class, 'acquista'])->name('acquisto');

    Route::get("riepilogo", [ClientController::class, 'riepilogo'])->name('riepilogo');
});
