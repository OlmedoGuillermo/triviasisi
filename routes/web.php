<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TriviaController;

Route::get('/', [TriviaController::class, 'inicio'])->name('rem.inicio');
Route::post('/pregunta', [TriviaController::class, 'guardarYAvanzar'])->name('rem.pregunta');
Route::get('/resultado', [TriviaController::class, 'resultado'])->name('rem.resultado');