<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicaController;

Route::get('/', function () {
    return view('welcome');
});

// Rota pública para listar os musicas
Route::get('/', [MusicaController::class, 'index'])->name('musicas.index');
Route::get('/musicas/{musica}', [MusicaController::class, 'show'])->name('musicas.show');

// Agrupando rotas que exigem autenticação
Route::middleware(['auth'])->group(function () {
    Route::get('/musicas/criar/novo', [MusicaController::class, 'create'])->name('musicas.create');
    Route::post('/musicas', [MusicaController::class, 'store'])->name('musicas.store');
    Route::get('/musicas/{musica}/editar', [MusicaController::class, 'edit'])->name('musicas.edit');
    Route::put('/musicas/{musica}', [MusicaController::class, 'update'])->name('musicas.update');
    Route::delete('/musicas/{musica}', [MusicaController::class, 'destroy'])->name('musicas.destroy');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
