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
Route::middleware(['auth'])->get('/denuncias/mostrar', [DenunciasController::class, 'index'])->name('denuncias');
Route::get('/denuncias/mostrarcasos', [DenunciasController::class, 'mostrarcasos'])->name('mostrarcasos');
Route::post('/denuncias/cargarcasos', [DenunciasController::class, 'cargarCasosDesdeVista'])->name('denuncias.cargarCasosDesdeVista');
Route::get('/denuncias/registro',[DenunciasController::class,'registrardenuncias'])->name('registrar');
Route::get('/denuncias/recepcion', [DenunciasController::class, 'filtroRecepcion'])->name('denuncias.filtroRecepcion');
Route::get('/denuncias/evaluacion', [DenunciasController::class, 'filtroEvaluacion'])->name('denuncias.filtroEvaluacion');
Route::post('/denuncias/registrar', [DenunciasController::class, 'store'])->name('denuncias.store');
Route::put('/denuncias/{denuncia}/estado', [DenunciasController::class, 'updateEstado'])->name('denuncias.update_estado');