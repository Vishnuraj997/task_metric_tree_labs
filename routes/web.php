<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/register',[App\Http\Controllers\UserController::class,'register'])->name('register');
Route::post('/register-user',[App\Http\Controllers\UserController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[App\Http\Controllers\UserController::class,'loginUser'])->name('login-user');
Route::get('/home',[App\Http\Controllers\UserController::class,'home'])->name('home');
Route::get('/create/{id}',[App\Http\Controllers\NotesController::class,'create'])->name('create');
Route::post('/create-note',[App\Http\Controllers\NotesController::class,'createnote'])->name('create-note');

