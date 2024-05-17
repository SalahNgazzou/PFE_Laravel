<?php


use App\Http\Controllers\BiController;
use App\Http\Controllers\biensController;
use App\Http\Controllers\commentairController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\EstimationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\rechercheController;
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
    Route::post('', [userController::class, 'ajouter'])->middleware(['auth:api', 'scope:Admin']);
    Route::get('', [userController::class, 'liste'])->middleware(['auth:api', 'scope:Admin']);
    Route::delete('/{id}', [userController::class, 'destroy'])->middleware(['auth:api', 'scope:Admin']);
    Route::get('/{id}', [userController::class, 'getUser'])->middleware(['auth:api', 'scope:Admin']);
    Route::put('update/{id}', [UserController::class, 'update'])->middleware(['auth:api', 'scope:Admin']);
    Route::put('/{id}', [UserController::class, 'ChangeStatus'])->middleware(['auth:api', 'scope:Admin']);
});


Route::prefix('biens')->group(function () {
    Route::post('', [biensController::class, 'add_Biens'])->middleware(['auth:api', 'checkUserRole']);
    Route::put('edit/{id}', [biensController::class, 'edit_Biens'])->middleware(['auth:api', 'checkUserRole']);
    Route::get('', [biensController::class, 'biensEnattent'])->middleware(['auth:api', 'checkUserRole']);
    Route::get('publier', [biensController::class, 'biensPublier'])->middleware(['auth:api', 'checkUserRole']);
    Route::get('/{id}', [biensController::class, 'getBiens'])->middleware(['auth:api', 'checkUserRole']);
    Route::get('BiensByUserEnAttente/{id}', [biensController::class, 'listBiensByUserEnAttente'])->middleware(['auth:api', 'checkUserRole']);
    Route::get('BiensByUserPublier/{id}', [biensController::class, 'listBiensByUserPublier'])->middleware(['auth:api', 'checkUserRole']);
    Route::put('/{id}', [biensController::class, 'ChangeAnnonce'])->middleware(['auth:api', 'scope:Admin']);
    Route::put('changestatue/{id}', [biensController::class, 'ChangeStatue'])->middleware(['auth:api', 'checkUserRole']);
    Route::post('add', [biensController::class, 'addImages'])->middleware(['auth:api', 'checkUserRole']);
    Route::delete('/{ids}', [biensController::class, 'deleteImages'])->middleware(['auth:api', 'checkUserRole']);
});
Route::prefix('visiteur')->group(function () {
    Route::post('', [visiteurController::class, 'search']);
    Route::post('estimation', [visiteurController::class, 'add_estimation']);
    Route::post('recherche', [visiteurController::class, 'add_demandeRecherche']);
    Route::post('commentair', [visiteurController::class, 'add_Commentaire']);
    Route::post('contact', [visiteurController::class, 'add_contact']);
    Route::get('random', [visiteurController::class, 'list_biens']);
    Route::get('/{id}', [visiteurController::class, 'getBiens']);
});
Route::prefix('estimation')->group(function () {
    Route::get('', [EstimationController::class,'getDemandesEnAttente'])->middleware(['auth:api', 'scope:Secrétaire']);
    Route::get('/{id}', [EstimationController::class,'getDemandeEstimationById'])->middleware(['auth:api', 'scope:Secrétaire']);
    Route::put('/{id}', [EstimationController::class,'updateEstimationStatusToTerminated'])->middleware(['auth:api', 'scope:Secrétaire']);
    Route::delete('/{id}', [EstimationController::class,'deleteEstimationById'])->middleware(['auth:api', 'scope:Secrétaire']);
});

Route::prefix('recherche')->group(function () {
    Route::get('', [rechercheController::class,'getDemandesRecherche'])->middleware(['auth:api','CheckSecrétairCoutierRole']);
    Route::get('/{id}', [rechercheController::class,'getDemandeRechercheById'])->middleware(['auth:api', 'CheckSecrétairCoutierRole']);
    Route::put('/{id}', [rechercheController::class,'updateRechercheStatusToTerminated'])->middleware(['auth:api', 'scope:Courtier']);
    Route::delete('/{id}', [rechercheController::class,'deleteRechercheById'])->middleware(['auth:api', 'scope:Courtier']);
});
Route::prefix('contact')->group(function () {
    Route::get('', [contactController::class,'getContactEnAttente'])->middleware(['auth:api', 'scope:Secrétaire']);
    Route::get('/{id}', [contactController::class,'getDemandeContactsById'])->middleware(['auth:api', 'scope:Secrétaire']);
    Route::put('/{id}', [contactController::class,'updateContactStatusToTerminated'])->middleware(['auth:api', 'scope:Secrétaire']);
    Route::delete('/{id}', [contactController::class,'deleteContactById'])->middleware(['auth:api', 'scope:Secrétaire']);
});
Route::prefix('commentaire')->group(function () {
    Route::get('', [commentairController::class,'getCommentairEnAttente'])->middleware(['auth:api', 'checkUserRole']);
    Route::get('/{id}', [commentairController::class,'CommentaireById'])->middleware(['auth:api', 'checkUserRole']);
    Route::get('bien/{id}', [commentairController::class, 'get_commentaire_bien'])->middleware(['auth:api', 'checkUserRole']);
    Route::put('/{id}', [commentairController::class,'updateCommentaireStatusToTerminated'])->middleware(['auth:api', 'checkUserRole']);
    Route::delete('/{id}', [commentairController::class,'deleteCommentById'])->middleware(['auth:api', 'checkUserRole']);
});
Route::prefix('bi')->group(function () {
    Route::get('', [BiController::class,'nombreDeBiens'])->middleware(['auth:api', 'scope:Admin']);
    Route::get('bien_encours', [BiController::class,'nombreBiensDisponibles'])->middleware(['auth:api', 'scope:Admin']);
    Route::get('bien_Avendre', [BiController::class,'nombreBiensAvendre'])->middleware(['auth:api', 'scope:Admin']);
    Route::get('bien_Alouer', [BiController::class,'nombreBiensAlouer'])->middleware(['auth:api', 'scope:Admin']);
    Route::get('type_demander', [BiController::class,'BiensPlusDemander'])->middleware(['auth:api', 'scope:Admin']);
    Route::get('typesBiensLesPlusVendus', [BiController::class,'typesBiensLesPlusVendus']);
    Route::get('typesBiensLesPluslouer', [BiController::class,'typesBiensLesPluslouer']);
    Route::get('categorieDemander', [BiController::class,'categorieDemander']);

});

Route::post('/send-email', [MailController::class,'send']);