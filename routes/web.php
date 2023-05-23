<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\ModificainfoController;

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

Route::get('/', function () {
    return view('home');
});
Route::get('home', function () {
    return view('home');
})->name('home');

Route::get('/lista-aziende', [PublicController::class, 'showAziendeList']);

Route::view("/faq", "faq");

Route::view("/contatti", "contatti");

Route::post("/catalogo/ricerca", [PublicController::class, 'showOfferte'])
        ->name('ricerca-offerte');

Route::get("/catalogo/ricerca", [PublicController::class, 'showOfferte'])
        ->name('ricerca-offerte');

// Route::get("/catalogo", [PublicController::class, 'showOfferteList']);
Route::view("/catalogo", 'catalogo', ['offerte' => 'inizio']);

Route::get("/dettagli-offerta/{id}", [PublicController::class, 'showDettagliOfferta'])
        ->name('dettagli-offerta');

Route::view("/coupon-generato", "coupon-generato");

// Rotte profilo in base al livello di autenticazione

Route::view('/profilo/cliente', 'profilo-cliente')->middleware('can:isUser');

Route::view('/profilo/staff', 'profilo-staff')->middleware('can:isStaff')
        ->name('staff');

Route::view('/profilo/admin', 'profilo-admin')->middleware('can:isAdmin')
        ->name('admin');



// Deprecato LOL
/* Route::get('/{param}', function ($param) {
  return view($param);
  }); */

require __DIR__ . '/auth.php';


