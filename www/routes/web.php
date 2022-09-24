<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MouvementController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\CommandeController;
use App\Http\Livewire\welcome;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
//Route::get('/',[HistoriqueController::class,'index']);
//Route::get('historiques/{$ref}',[HistoriqueController::class,'getByReference'])->name("historique.getByReference");
//Route::get('front/historique/{ref}',[HistoriqueController::class,'getByReference'])->name("historique.getByReference");
//Route::get('/{ref?}',[HistoriqueController::class,'getByReference'])->name("historique.getByReference");
Route::controller(MouvementController::class)->group(function (){
    Route::get('/mouvements','index')->name("mouvements.index");
    Route::get('/Mouvement','add')->name("Mouvement.add");
    Route::get('front/historique/{ref}',[HistoriqueController::class,'getByReference'])->name("historique.getByReference");
});
Route::get('/',[CommandeController::class,'index']);
Route::get('/commandes',[CommandeController::class,'index'])->name("commande.index");
Route::get('/commande/{id}',[CommandeController::class,'show'])->name("commande.show");
Route::get('/commande',[CommandeController::class,'saveCommande'])->name("commande.saveCommande");
