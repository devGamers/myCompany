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

    Route::get('/annee', 'HomeController@annee')->name('annee');
    Route::post('annee', 'HomeController@annee_choisi')->name('annee_choisi');

    Route::middleware(['annee'])->group(function () {

        Route::get('/dashboard', 'HomeController@index')->name('home');
        Route::get('/dashboard/entree-sortie', 'HomeController@entreeSortie')->name('dashboard.entree-sortie');
        Route::get('/dashboard/travailleur', 'HomeController@travailleur')->name('dashboard.travailleur');
        Route::get('/dashboard/parametre', 'HomeController@parametre')->name('dashboard.parametre');

        Route::resource('agent', 'UserController');

        Route::prefix('entree-sortie')->namespace('EntreeSorties')->group(function () {
            Route::resource('activite', 'ActiviteController');
            Route::post('activite/{activite}/type/', 'ActiviteController@activite_type')->name('activite.type');
            Route::resource('type-depense', 'TypeDepenseController');
            Route::post('type-depense/affiche/{activite}', 'TypeDepenseController@affiche')->name('type-depense.affiche');
            Route::resource('type-entree', 'TypeEntreeController');
            Route::post('type-entree/affiche/{activite}', 'TypeEntreeController@affiche')->name('type-entree.affiche');
            Route::resource('entree-sorties', 'EntreeSortieController');
            Route::post('entree-sorties/affiche/{activite}/{mois}', 'EntreeSortieController@affiche')->name('entree-sorties.affiche');
        });

        Route::prefix('parametre')->namespace('Parametres')->group(function () {
            Route::resource('parametre', 'ParametreController');
        });
    });
});
