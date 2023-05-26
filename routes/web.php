<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\ModificainfoController;
use App\Http\Controllers\StaffController;

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

// Sezione pubblica del sito

Route::view('/', 'sezione-pubblica/home')
        ->name('home');

Route::view('/home', 'sezione-pubblica/home')
        ->name('home');

Route::get('/lista-aziende', [PublicController::class, 'showAziendeList'])
        ->name('lista-aziende');

Route::get("/faq",[PublicController::class, 'showFAQ'])
        ->name("faq");

Route::get("/contatti", [PublicController::class, 'showContatti'])
        ->name('contatti');

Route::get("/catalogo", [PublicController::class, 'showAziendeInCatalogo'])
        ->name('catalogo');

Route::post("/catalogo/ricerca", [PublicController::class, 'showOfferte'])
        ->name('ricerca-offerte');

Route::get("/catalogo/ricerca", [PublicController::class, 'showOfferte'])
        ->name('ricerca-offerte');

Route::get("/dettagli-offerta/{id}", [PublicController::class, 'showDettagliOfferta'])
        ->name('dettagli-offerta');

// Sezione riservata al Cliente (Livello 1)

Route::view("/coupon-generato", "sezione-clienti/coupon-generato")->middleware("can:isUser")
        ->name('coupon-generato');

// Sezione riservata allo Staff (Livello 2)

 Route::get("/gestione-promozioni", [StaffController::class , 'showGestioneOfferta'])->middleware("can:isStaff")
        ->name("gestione-promozioni");

// Rotte Amministratore

Route::post("/gestione-aziende", [AdminController::class, ''])->middleware('can:isAdmin')
    ->name('gestione-aziende');

// Rotte profilo in base al livello di autenticazione

Route::view('/profilo/cliente', 'sezione-clienti/profilo-cliente')->middleware('can:isUser')
        ->name('cliente');

Route::view('/profilo/staff', 'sezione-staff/profilo-staff')->middleware('can:isStaff')
        ->name('staff');

Route::view('/profilo/admin', 'sezione-admin/profilo-admin')->middleware('can:isAdmin')
        ->name('admin');

require __DIR__ . '/auth.php';


