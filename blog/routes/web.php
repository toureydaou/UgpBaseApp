<?php

use App\Http\Controllers\PrescripteurController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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
        return view('home');
    }
});


// Routes de la gestion des prescripteurs

Route::get('/home/creation-prescripteur', [PrescripteurController::class, 'create'])->name('creationPrescripteur');

Route::post('/home/creation-prescripteur', [PrescripteurController::class, 'store'])->name('enregistrementPrescripteur');

Route::get('/home/prescripteur{prescripteur}', [PrescripteurController::class, 'show'])->name('prescripteur.show');

Route::get('/home/liste-prescripteurs', [PrescripteurController::class, 'index'])->name('prescripteurs.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
