<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vtcontroller;
use App\Http\Controllers\VoitureController;
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







// Route::post('/chauffeur/create', [vtcontroller::class, 'store'])->name('chauffeur.store');
// route::get('/voiture' ,[vtcontroller::class, 'voiture'])->name('voiture');
// Route::post('/voiture/create', [vtcontroller::class, 'store'])->name('voiture.store');
