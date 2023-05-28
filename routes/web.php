<?php

use App\Http\Controllers\AdminController;
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

 Route::get("/gestione-promozioni/mod/{id}", [StaffController::class , 'showModificaOfferta'])->middleware("can:isStaff")
        ->name("modifica-offerta-view");

  Route::post("/gestione-promozioni/mod/conferma", [StaffController::class , 'modifyOfferta'])->middleware("can:isStaff")
        ->name("modifica-offerta");

 Route::get("/gestione-promozioni/elim/{id}", [StaffController::class , 'deleteOfferta'])->middleware("can:isStaff")
        ->name("elimina-offerta");

 Route::get("/gestione-promozioni/crea", [StaffController::class , 'showCreaOfferta'])->middleware("can:isStaff")
        ->name("crea-offerta");

  Route::post("/gestione-promozioni/crea", [StaffController::class , 'createOfferta'])->middleware("can:isStaff")
        ->name("crea-offerta");

// Rotte Amministratore

// Rotte di gestione-aziende
Route::get("/gestione-aziende", [AdminController::class, 'showGestioneAziende'])->middleware('can:isAdmin')// apre la lista di aziende
    ->name('gestione-aziende');

Route::get("/gestione-aziende/mod/{id}", [AdminController::class , 'showModifyAzienda'])->middleware("can:isAdmin")// apre la form di modifica
    ->name("modifica-azienda-view");

Route::post("/gestione-aziende/mod/conferma", [AdminController::class , 'modifyAzienda'])->middleware("can:isAdmin")// effettua la modifica
    ->name("modifica-azienda");

Route::get("/gestione-aziende/crea", [AdminController::class , 'showCreaAzienda'])->middleware("can:isAdmin")
    ->name("crea-azienda-view");

Route::post("/gestione-aziende/crea", [AdminController::class , 'createAzienda'])->middleware("can:isAdmin")
    ->name("crea-azienda");

Route::get("/gestione-aziende/elim/{id}", [AdminController::class , 'deleteAzienda'])->middleware("can:isAdmin")
    ->name("elimina-azienda-view");

// Rotte per gestione-membristff
Route::get("/gestione-membristaff", [AdminController::class, 'showGestioneStaff'])->middleware('can:isAdmin')
    ->name('gestione-membristaff');

Route::get("/gestione-membristaff/mod/{username}", [AdminController::class , 'showModifyStaff'])->middleware("can:isAdmin")// apre la form di modifica
    ->name("modifica-staff-view");

Route::post("/gestione-membristaff/mod/conferma", [AdminController::class , 'modifyStaff'])->middleware("can:isAdmin")// effettua la modifica
    ->name("modifica-staff-conf");

Route::get("/gestione-membristaff/crea", [AdminController::class , 'showCreaStaff'])->middleware("can:isAdmin")
    ->name("crea-staff-view");

Route::post("/gestione-membristaff/crea", [AdminController::class , 'createStaff'])->middleware("can:isAdmin")
    ->name("crea-staff-conf");

Route::get("/gestione-membristaff/elim/{username}", [AdminController::class , 'deleteStaff'])->middleware("can:isAdmin")
    ->name("elimina-staff-view");

// Rotte per gestione-faq
Route::get("/gestione-faq", [AdminController::class, 'showGestioneFaq'])->middleware('can:isAdmin')
    ->name('gestione-faq');

Route::get("/gestione-faq/mod/{id}", [AdminController::class , 'showModifyFaq'])->middleware("can:isAdmin")// apre la form di modifica
    ->name("modifica-faq-view");

Route::post("/gestione-faq/mod/conferma", [AdminController::class , 'modifyFaq'])->middleware("can:isAdmin")// effettua la modifica
    ->name("modifica-faq-conf");

Route::get("/gestione-faq/crea", [AdminController::class , 'showCreaFaq'])->middleware("can:isAdmin")
    ->name("crea-faq-view");

Route::post("/gestione-faq/crea", [AdminController::class , 'createFaq'])->middleware("can:isAdmin")
    ->name("crea-faq-conf");

Route::get("/gestione-faq/elim/{id}", [AdminController::class , 'deleteFaq'])->middleware("can:isAdmin")
    ->name("elimina-faq-view");

// Rotte per statistiche
Route::get("/statistiche", [AdminController::class, 'numeroCoupon'])->middleware('can:isAdmin')
    ->name('statistiche');

// Rotte per eliminazione-utenti
Route::get("/eliminazione-utenti", [AdminController::class, 'showGestioneUtenti'])->middleware('can:isAdmin')
    ->name('elimina-utenti');

Route::get("/eliminazione-utenti/{username}", [AdminController::class, 'deleteUtenti'])->middleware('can:isAdmin')
    ->name('elimina-utenti-view');

// Rotte per la gestione della assegnazione di aziende a staff
Route::get("/gestione-assegnamento-aziende", [AdminController::class, 'showGestioneAssegnamento'])->middleware('can:isAdmin')
    ->name('gestione-assegnamento');

Route::get("/gestione-assegnamento/mod/{id}", [AdminController::class , 'showModifyAssegnamento'])->middleware("can:isAdmin")// apre la form di modifica
->name("modifica-assegnamento-view");

/*Route::post("/gestione-faq/mod/conferma", [AdminController::class , 'modifyFaq'])->middleware("can:isAdmin")// effettua la modifica
->name("modifica-faq-conf");

Route::get("/gestione-faq/crea", [AdminController::class , 'showCreaFaq'])->middleware("can:isAdmin")
    ->name("crea-faq-view");

Route::post("/gestione-faq/crea", [AdminController::class , 'createFaq'])->middleware("can:isAdmin")
    ->name("crea-faq-conf");

Route::get("/gestione-faq/elim/{id}", [AdminController::class , 'deleteFaq'])->middleware("can:isAdmin")
    ->name("elimina-faq-view");
*/
// Rotte profilo in base al livello di autenticazione

Route::view('/profilo/cliente', 'sezione-clienti/profilo-cliente')->middleware('can:isUser')
        ->name('cliente');

Route::view('/profilo/staff', 'sezione-staff/profilo-staff')->middleware('can:isStaff')
        ->name('staff');

Route::view('/profilo/admin', 'sezione-admin/profilo-admin')->middleware('can:isAdmin')
        ->name('admin');

require __DIR__ . '/auth.php';


