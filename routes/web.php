<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VitrineController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\RelatorioController;

Route::post('/carrinho/adicionar/{id}', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::post('/carrinho/remover/{id}', [CarrinhoController::class, 'remover'])->name('carrinho.remover');

Route::get('/', [VitrineController::class, 'index'])->name('vitrine.index');
Route::resource('funcionarios', App\Http\Controllers\Admin\FuncionarioController::class);
Route::resource('clientes', App\Http\Controllers\Admin\ClienteController::class);


Route::middleware(['auth'])->group(function () {
    
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('produtos', ProdutoController::class);
});

Route::post('/carrinho/finalizar', [CarrinhoController::class, 'finalizar'])->middleware('auth')->name('carrinho.finalizar');



Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/relatorios/vendas', [RelatorioController::class, 'vendas'])->name('relatorios.vendas');
    Route::get('/admin/relatorios/estoque', [RelatorioController::class, 'estoque'])->name('relatorios.estoque');
    Route::get('/admin/relatorios/clientes', [RelatorioController::class, 'clientes'])->name('relatorios.clientes');
});



require __DIR__.'/auth.php';
