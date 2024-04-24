<?php

use App\Http\Controllers\AjouterBiens;
use App\Http\Controllers\ajouterbiensController;
use App\Http\Controllers\AjouterController;
use App\Http\Controllers\biensController;
use App\Http\Controllers\BiensConttroler\AppartementController;
use App\Http\Controllers\BiensConttroler\DuplexController;
use App\Http\Controllers\BiensConttroler\EntropotController;
use App\Http\Controllers\BiensConttroler\ImmeubleController;
use App\Http\Controllers\BiensConttroler\Local_commercialController;
use App\Http\Controllers\BiensConttroler\Parking_GarageController;
use App\Http\Controllers\BiensConttroler\TerrainController;
use App\Http\Controllers\BiensConttroler\UsineController;
use App\Http\Controllers\ModifierBiens;
use App\Http\Controllers\ModifierbiensController;
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
    Route::put('update/{id}', [UserController::class, 'update']);
    Route::put('/{id}', [UserController::class, 'ChangeStatus']);
});


Route::prefix('biens')->group(function () {
    Route::post('', [biensController::class, 'add_Biens']);
    Route::put('edit/{id}', [biensController::class, 'edit_Biens']);
    Route::get('', [biensController::class, 'listebiens']);
    Route::get('/{id}', [biensController::class, 'getBiens']);
    Route::get('BiensByUser/{id}', [biensController::class, 'listBiensByUser']);
    Route::put('/{id}', [biensController::class, 'ChangeAnnonce']);
    Route::put('changestatue/{id}', [biensController::class, 'ChangeStatue']);
    Route::post('add', [biensController::class, 'addImages']);
    Route::delete('/{ids}', [biensController::class, 'deleteImages']);
});

