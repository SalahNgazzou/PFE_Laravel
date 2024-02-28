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
Route:: get('liste',[userController::class,'liste']);
Route::delete('/liste/{id}',[userController::class,'destroy']);
Route::get('/edit/{id}',[userController::class,'edit']);
Route::put('/update/{id}', [UserController::class, 'update']);
