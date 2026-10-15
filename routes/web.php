<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

// Redireciona a raiz para a tela de login
Route::get('/', function () {
    return redirect()->route('login');
});

// Agrupamento protegido pelo login do Breeze
Route::middleware(['auth', 'verified'])->group(function () {
    // Se o usuário acessar /dashboard, é redirecionado para os produtos
    Route::get('/dashboard', function () {
        return redirect()->route('produtos.index');
    })->name('dashboard');

    // Suas rotas do CRUD de produtos
    Route::resource('produtos', ProdutoController::class);
});

require __DIR__.'/auth.php';