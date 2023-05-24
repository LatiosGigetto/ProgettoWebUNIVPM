<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\ModificainfoController;
use App\Models\Azienda;

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
    return view('sezione-pubblica/home');
});

//TODO rimuovere questa rotta che è inutile e ridondante
Route::get('home', function () {
    return view('sezione-pubblica/home');
})->name('home');

Route::get('/lista-aziende', [PublicController::class, 'showAziendeList'])->name('lista-aziende');

Route::view("/faq", "sezione-pubblica/faq")->name("faq");

Route::view("/contatti", "sezione-pubblica/contatti")->name("contatti");

Route::post("/catalogo/ricerca", [PublicController::class, 'showOfferte'])
        ->name('ricerca-offerte');

Route::get("/catalogo/ricerca", [PublicController::class, 'showOfferte'])
        ->name('ricerca-offerte');

// Route::get("/catalogo", [PublicController::class, 'showOfferteList']);
Route::view("/catalogo", 'sezione-pubblica/catalogo', ['offerte' => 'inizio', 'aziende' => Azienda::paginate(5)])->name('catalogo');

Route::get("/dettagli-offerta/{id}", [PublicController::class, 'showDettagliOfferta'])
        ->name('dettagli-offerta');

Route::view("/coupon-generato", "sezione-clienti/coupon-generato")->name('coupon-generato');

Route::get("/gestione-aziende", [AdminController::class, ''])
    ->name('gestione-aziende');

// Rotte profilo in base al livello di autenticazione

Route::view('/profilo/cliente', 'sezione-clienti/profilo-cliente')->middleware('can:isUser')
        ->name('cliente');

Route::view('/profilo/staff', 'sezione-staff/profilo-staff')->middleware('can:isStaff')
        ->name('staff');

Route::view('/profilo/admin', 'sezione-admin/profilo-admin')->middleware('can:isAdmin')
        ->name('admin');


// Deprecato LOL
/* Route::get('/{param}', function ($param) {
  return view($param);
  }); */

require __DIR__ . '/auth.php';


