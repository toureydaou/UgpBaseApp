<?php

use App\Http\Controllers\PrescripteurController;
use App\Http\Controllers\SiteController;
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

Route::post('/home/liste-prescripteurs{prescripteur}', [PrescripteurController::class, 'destroy'])->name('prescripteur.destroy');


Route::post('/home/inscription', [PrescripteurController::class, 'inscription'])->name('inscrirePrescripteur');

Route::get('/home/inscription', [PrescripteurController::class, 'showInscription'])->name('inscription');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Routes de gestion des sites

Route::get('file-import-export', [SiteController::class, 'fileImportExport'])->name('file-import-export');

Route::post('file-import', [SiteController::class, 'fileImport'])->name('file-import');

Route::get('creation-site', [SiteController::class, 'create'])->name('site.create');

Route::get('liste-des-sites', [SiteController::class, 'index'])->name('site.index');

Route::get('retriveDistrict/{id}', [SiteController::class, 'retriveDistrict'])->name('site.retrive');