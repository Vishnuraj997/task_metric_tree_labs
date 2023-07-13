<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





Route::post('/register-user',[AuthController::class,'registerUser']);
Route::post('/login-user',[AuthController::class,'login']);


Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/create-note',[NotesController::class,'createnote']);
    Route::post('/update-note/{id}',[NotesController::class,'updatenoteforapi']);
    Route::get('/note/{id}',[NotesController::class,'notes']);
    Route::delete('/delete/{id}',[AuthController::class,'delete']);
    Route::post('logout',[AuthController::class,'logout']);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
