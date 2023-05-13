<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/{param}', function ($param) {
    return view($param);
});

Route::get('/gestioneaziende', function () {
    return view('gestione aziende');
});

Route::get('/home', function () {
    return view('home');
});
