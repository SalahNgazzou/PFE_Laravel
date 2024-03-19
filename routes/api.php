<?php

use App\Http\Controllers\AjouterController;
use App\Http\Controllers\BiensConttroler\AppartementController;
use App\Http\Controllers\BiensConttroler\EntropotController;
use App\Http\Controllers\BiensConttroler\ImmeubleController;
use App\Http\Controllers\BiensConttroler\Local_commercialController;
use App\Http\Controllers\BiensConttroler\Parking_GarageController;
use App\Http\Controllers\BiensConttroler\TerrainController;
use App\Http\Controllers\BiensConttroler\UsineController;
use App\Http\Controllers\VillaController;
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
    Route::put('/{id}', [UserController::class, 'update'])->middleware(['auth:api', 'scope:Admin']);
    Route::put('/{id}', [UserController::class, 'ChangeStatus'])->middleware(['auth:api', 'scope:Admin']);
});
Route::post('/Villa/ajouter', [VillaController::class, 'ajouterVilla'])->name('Villa.ajouter');
Route::post('/appartement/ajouter', [AppartementController::class, 'ajouterAppartement'])->name('appartement.ajouter');
Route::post('/duplex/ajouter', [AppartementController::class, 'ajouterDuplex'])->name('duplex.ajouter');
Route::post('/terrain/ajouter', [TerrainController::class, 'ajouterTerrain'])->name('terrain.ajouter');
Route::post('/parking_garage/ajouter', [Parking_GarageController::class, 'ajouterParking'])->name('parking_garage.ajouter');
Route::post('/immeuble/ajouter', [ImmeubleController::class, 'ajouterImmeuble'])->name('immeuble.ajouter');
Route::post('/usine/ajouter', [UsineController::class, 'ajouterUsine'])->name('usine.ajouter');
Route::post('/entropot/ajouter', [EntropotController::class, 'ajouterEntropot'])->name('entropot.ajouter');
Route::post('/local_commercial/ajouter', [Local_commercialController::class, 'ajouterLocalCommercial'])->name('local_commercial.ajouter');