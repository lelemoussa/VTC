<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vtcontroller;
use App\Http\Controllers\GpsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\ChauffeurController;


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
    return view('templete.layout');
})->name('layout');

//route pour chauffeur
Route::resource("chauffeur",ChauffeurController::class);
route::get("/chauffeur/{chauffeur}" ,[ChauffeurController::class, 'edit'])->name("chauffeur.edit");
route::delete("/chauffeur/{chauffeur}" ,[ChauffeurController::class, 'destroy'])->name("chauffeur.supprimer");
route::put("/chauffeur/{chauffeur}" ,[ChauffeurController::class, 'update'])->name("chauffeur.update");


//route pour voiture
Route::resource("voiture",VoitureController::class);
route::get("/voiture/{voiture}" ,[VoitureController::class, 'edit'])->name("voiture.edit");
route::delete("/voiture/{voiture}" ,[VoitureController::class, 'destroy'])->name("voiture.supprimer");
route::put("/voiture/{voiture}" ,[VoitureController::class, 'update'])->name("voiture.update");


//route pour client
Route::resource("client",ClientController::class);
route::get("/client/{client}" ,[ClientController::class, 'edit'])->name("client.edit");
route::delete("/client/{client}" ,[ClientController::class, 'destroy'])->name("client.supprimer");
route::put("/client/{client}" ,[ClientController::class, 'update'])->name("client.update");

//route pour trajet
Route::resource("trajet",TrajetController::class);
route::get("/trajet/{trajet}" ,[TrajetController::class, 'edit'])->name("trajet.edit");
route::delete("/trajet/{trajet}" ,[TrajetController::class, 'destroy'])->name("trajet.supprimer");
route::put("/trajet/{trajet}" ,[TrajetController::class, 'update'])->name("trajet.update");


//route pour passager
Route::resource("passager",PassagerController::class);
route::get("/passager/{passager}" ,[PassagerController::class, 'edit'])->name("passager.edit");
route::delete("/passager/{passager}" ,[PassagerController::class, 'destroy'])->name("passager.supprimer");
route::put("/passager/{passager}" ,[PassagerController::class, 'update'])->name("passager.update");

//route pour Gps
Route::resource("gps",GpsController::class);
// route::get("/gpss/{gps}" ,[GpsController::class, 'edit'])->name("gpss.edit");
// route::delete("/gps/{gps}" ,[GpsController::class, 'destroy'])->name("gps.supprimer");
// route::put("/gps/{gps}" ,[GpsController::class, 'update'])->name("gps.update");


// Route::post('/chauffeur/create', [vtcontroller::class, 'store'])->name('chauffeur.store');
// route::get('/voiture' ,[vtcontroller::class, 'voiture'])->name('voiture');
// Route::post('/voiture/create', [vtcontroller::class, 'store'])->name('voiture.store');
