<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicaController;
use Illuminate\Support\Facades\Auth; // Certifique-se de que esta linha está presente

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

// Rota pública para listar as músicas (página inicial)
Route::get('/', [MusicaController::class, 'index'])->name('musicas.index');

// Rota pública para mostrar os detalhes de uma música específica
Route::get('/musicas/{musica}', [MusicaController::class, 'show'])->name('musicas.show');


// Rotas que exigem autenticação para usuários logados (CRUD completo)
Route::middleware(['auth'])->group(function () {
    // Exibir o formulário para criar uma nova música
    Route::get('/musicas/criar/nova', [MusicaController::class, 'create'])->name('musicas.create');
    // Salvar uma nova música no banco de dados
    Route::post('/musicas', [MusicaController::class, 'store'])->name('musicas.store');
    // Exibir o formulário para editar uma música existente
    Route::get('/musicas/{musica}/editar', [MusicaController::class, 'edit'])->name('musicas.edit');
    // Atualizar uma música no banco de dados
    Route::put('/musicas/{musica}', [MusicaController::class, 'update'])->name('musicas.update');
    // Excluir uma música do banco de dados
    Route::delete('/musicas/{musica}', [MusicaController::class, 'destroy'])->name('musicas.destroy');
});


// Rotas de Autenticação (Login, Registro, Logout)
Auth::routes();

// Rota para o painel de boas-vindas após o login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
