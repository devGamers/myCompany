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
    if (Auth::guest()) {
        return view('auth.login');
    } else {
        return redirect()->route('home');
    }
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    //Route::get('/exercice', 'HomeController@exercice')->name('exercice');
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::get('/dashboard/comptabilite', 'HomeController@comptabilite')->name('dashboard.comptabilite');
    Route::get('/dashboard/agent', 'HomeController@agent')->name('dashboard.agent');
    Route::resource('agent', 'UserController');
    Route::resource('activite', 'ActiviteController');
    //Route::resource('comptabilite', 'ComptabiliteController');
    Route::resource('entree-sorties', 'EntreeSortiesController');
});
