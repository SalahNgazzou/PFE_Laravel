<?php

use App\Http\Controllers\AjouterBiens;
use App\Http\Controllers\ajouterbiensController;
use App\Http\Controllers\AjouterController;
use App\Http\Controllers\BiController;
use App\Http\Controllers\biensController;
use App\Http\Controllers\BiensConttroler\AppartementController;
use App\Http\Controllers\BiensConttroler\DuplexController;
use App\Http\Controllers\BiensConttroler\EntropotController;
use App\Http\Controllers\BiensConttroler\ImmeubleController;
use App\Http\Controllers\BiensConttroler\Local_commercialController;
use App\Http\Controllers\BiensConttroler\Parking_GarageController;
use App\Http\Controllers\BiensConttroler\TerrainController;
use App\Http\Controllers\BiensConttroler\UsineController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\EstimationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ModifierBiens;
use App\Http\Controllers\ModifierbiensController;
use App\Http\Controllers\rechercheController;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\visiteurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [userController::class, 'login']);

Route::prefix('users')->group(function () {
    Route::post('', [userController::class, 'ajouter']);
    Route::get('', [userController::class, 'liste'])->middleware(['auth:api', 'scope:Admin']);
    Route::delete('/{id}', [userController::class, 'destroy'])->middleware(['auth:api', 'scope:Admin']);
    Route::get('/{id}', [userController::class, 'getUser'])->middleware(['auth:api', 'scope:Admin']);
    Route::put('update/{id}', [UserController::class, 'update']);
    Route::put('/{id}', [UserController::class, 'ChangeStatus']);
});


Route::prefix('biens')->group(function () {
    Route::post('', [biensController::class, 'add_Biens']);
    Route::put('edit/{id}', [biensController::class, 'edit_Biens']);
    Route::get('', [biensController::class, 'biensEnattent']);
    Route::get('publier', [biensController::class, 'biensPublier']);
    Route::get('/{id}', [biensController::class, 'getBiens']);
    Route::get('BiensByUserEnAttente/{id}', [biensController::class, 'listBiensByUserEnAttente']);
    Route::get('BiensByUserPublier/{id}', [biensController::class, 'listBiensByUserPublier']);
    Route::put('/{id}', [biensController::class, 'ChangeAnnonce']);
    Route::put('changestatue/{id}', [biensController::class, 'ChangeStatue']);
    Route::post('add', [biensController::class, 'addImages']);
    Route::delete('/{ids}', [biensController::class, 'deleteImages']);
});
Route::prefix('visiteur')->group(function () {
    Route::post('', [visiteurController::class, 'search']);
    Route::post('estimation', [visiteurController::class, 'add_estimation']);
    Route::post('recherche', [visiteurController::class, 'add_demandeRecherche']);
    Route::post('contact', [visiteurController::class, 'add_contact']);
    Route::get('random', [visiteurController::class, 'list_biens']);
    Route::get('/{id}', [visiteurController::class, 'getBiens']);
});
Route::prefix('estimation')->group(function () {
    Route::get('', [EstimationController::class,'getDemandesEnAttente']);
    Route::get('/{id}', [EstimationController::class,'getDemandeEstimationById']);
    Route::put('/{id}', [EstimationController::class,'updateEstimationStatusToTerminated']);
    Route::delete('/{id}', [EstimationController::class,'deleteEstimationById']);
});

Route::prefix('recherche')->group(function () {
    Route::get('', [rechercheController::class,'getDemandesRecherche']);
    Route::get('/{id}', [rechercheController::class,'getDemandeRechercheById']);
});
Route::prefix('contact')->group(function () {
    Route::get('', [contactController::class,'getContactEnAttente']);
    Route::get('/{id}', [contactController::class,'getDemandeContactsById']);
    Route::delete('/{id}', [contactController::class,'deleteContactById']);
});
Route::prefix('bi')->group(function () {
    Route::get('', [BiController::class,'nombreDeBiens']);
    Route::get('type_demander', [BiController::class,'BiensPlusDemander']);
});

Route::post('/send-email', [MailController::class,'send']);