<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;

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
    return view('welcome');
});
Route::get('home', function () {
    return view('home');
});
Route::get('/lista-aziende', [PublicController::class, 'showAziendeList']);
Route::view("/faq","faq");
Route::view("/contatti","contatti");
Route::get("/catalogo" , [PublicController::class, 'showOfferteList']);
Route::view("/dettagli-offerta","dettagli-offerta");
Route::view("/coupon-generato","coupon-generato");
/*Route::get('/{param}', function ($param) {
    return view($param);
});*/

require __DIR__.'/auth.php';
