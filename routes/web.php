<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/index',[App\Http\Controllers\UserController::class,'index'])->name('index');
Route::post('/register-user',[App\Http\Controllers\UserController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[App\Http\Controllers\UserController::class,'loginUser'])->name('login-user');
Route::get('/home',[App\Http\Controllers\UserController::class,'home'])->name('home');  
Route::get('/create/{id}',[App\Http\Controllers\NotesController::class,'create'])->name('create');
Route::post('/create-note',[App\Http\Controllers\NotesController::class,'createnote'])->name('create-note');
Route::get('/edit/{id}',[App\Http\Controllers\NotesController::class,'edit'])->name('edit');
Route::post('/edit-note',[App\Http\Controllers\NotesController::class,'editnote'])->name('edit-note');
Route::delete('/delete/{id}',[App\Http\Controllers\NotesController::class,'delete'])->name('delete');
Route::post('/logout',[App\Http\Controllers\UserController::class,'destory'])->name('logout');

