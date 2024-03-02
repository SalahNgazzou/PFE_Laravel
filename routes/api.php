<?php

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
Route:: post('ajouter',[userController::class,'ajouter']);
Route:: post('login',[userController::class,'login']);
Route::delete('/liste/{id}',[userController::class,'destroy']);
Route::group(['prefix' =>'user'], function(){

Route:: get('liste',function(){
    return "sddsgsdgs";
})->middleware(['scope:r1']);});

//->middleware(['auth:api','scope:employe']);