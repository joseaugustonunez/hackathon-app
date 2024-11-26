<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DenunciasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/chat/mostrar',[ChatController::class,'index'])->name('chat');
Route::get('/denuncias/mostrar',[DenunciasController::class,'index'])->name('denuncias');
Route::get('/denuncias/registro',[DenunciasController::class,'registro'])->name('registrar');
