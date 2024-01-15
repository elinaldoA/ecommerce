<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('loja');
});

Auth::routes();
//Administrativo
Route::prefix('admin')->group(function () {
Route::get('/dashboard', [App\Http\Controllers\Administrativo\HomeController::class, 'index'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\Administrativo\ProfileController::class, 'index'])->name('profile');
Route::put('/profile-update', [App\Http\Controllers\Administrativo\ProfileController::class, 'update'])->name('profile.update');
/**Categorias*/
Route::get('/categoria/index', [App\Http\Controllers\Administrativo\CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria', [App\Http\Controllers\Administrativo\CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria', [App\Http\Controllers\Administrativo\CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/categoria/{categoria}/edit', [App\Http\Controllers\Administrativo\CategoriaController::class, 'edit'])->name('categoria.edit');
Route::post('/categoria/{categoria}/update', [App\Http\Controllers\Administrativo\CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/{categoria}/excluir', [App\Http\Controllers\Administrativo\CategoriaController::class, 'destroy'])->name('categoria.excluir');
/**Produtos*/
Route::get('/produtos', [App\Http\Controllers\Administrativo\ProdutoController::class, 'index'])->name('produtos');
Route::get('/produto', [App\Http\Controllers\Administrativo\ProdutoController::class, 'create'])->name('produto.create');
Route::post('/produto', [App\Http\Controllers\Administrativo\ProdutoController::class, 'store'])->name('produto.store');
Route::get('/produto/{produto}/edit', [App\Http\Controllers\Administrativo\ProdutoController::class, 'edit'])->name('produto.edit');
Route::post('/produto/{produto}/update', [App\Http\Controllers\Administrativo\ProdutoController::class, 'update'])->name('produto.update');
Route::delete('/produto/{produto}/excluir', [App\Http\Controllers\Administrativo\ProdutoController::class, 'destroy'])->name('produto.excluir');
});

//Loja
Route::prefix('cliente')->group(function () {
Route::match(['get', 'post'], '/', [App\Http\Controllers\Loja\ProdutoController::class, 'index'])
    ->name('home');
Route::match(['get', 'post'], '/categoria', [App\Http\Controllers\Loja\ProdutoController::class, 'categoria'])
    ->name('categoria');
//Filtro categorias
Route::match(['get', 'post'], '/{idcategoria}/categoria', [App\Http\Controllers\Loja\ProdutoController::class, 'categoria'])
    ->name('categoria_por_id');

Route::match(['get', 'post'], '/cadastrar', [App\Http\Controllers\Loja\ClienteController::class, 'cadastrar'])
        ->name('cadastrar');

Route::match(['get', 'post'], '/cliente/cadastrar', [App\Http\Controllers\Loja\ClienteController::class, 'cadastrarCliente'])
        ->name('cadastrar_cliente');
    //Login Cliente
Route::match(['get', 'post'], '/logar', [App\Http\Controllers\Loja\UsuarioController::class, 'logar'])
        ->name('logar');
Route::get('/sair', [App\Http\Controllers\Loja\UsuarioController::class, 'sair'])
        ->name('sair');
//Produto detalhes
Route::match(['get', 'post'], '/{produto}/produtos/detalhes', [App\Http\Controllers\Loja\ProdutoController::class, 'produtosDetalhes'])
    ->name('produto_detalhes');
//Carrinho
Route::match(['get', 'post'], '/{idproduto}/carrinho/adcionar', [App\Http\Controllers\Loja\ProdutoController::class, 'adcionarCarrinho'])
    ->name('adcionar_carrinho');
//Ver carrinho
Route::match(['get', 'post'], '/carrinho', [App\Http\Controllers\Loja\ProdutoController::class, 'verCarrinho'])
    ->name('ver_carrinho');
//Excluir item do carrinho
Route::match(['get', 'post'], '/{indice}/excluircarrinho', [App\Http\Controllers\Loja\ProdutoController::class, 'excluirCarrinho'])
    ->name('carrinho_excluir');
//Fechar item do carrinho
Route::post('/carrinho/finalizar', [App\Http\Controllers\Loja\ProdutoController::class, 'finalizar'])
    ->name('carrinho_finalizar');
//Historico de compras cliente
Route::match(['get', 'post'], '/compras/historico', [App\Http\Controllers\Loja\ProdutoController::class, 'historico'])
    ->name('compra_historico');
//Detalhes compras cliente
Route::match(['get', 'post'], '/compras/detalhes', [App\Http\Controllers\Loja\ProdutoController::class, 'detalhes'])
    ->name('compra_detalhes');
//Pagamentos compras cliente
Route::match(['get', 'post'], '/compras/pagar', [App\Http\Controllers\Loja\ProdutoController::class, 'pagar'])
    ->name('pagar');
});
