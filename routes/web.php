<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtablissementController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','is_admin']], function(){

        // teste route
        Route::get('/etablissements', [EtablissementController::class, 'index'])->name('liste-etab');
        Route::get('/create-etablissement',[EtablissementController::class, 'create'])->name('create-etab');
        Route::post('/store-etab',[EtablissementController::class, 'store'])->name('save-etab');

});
