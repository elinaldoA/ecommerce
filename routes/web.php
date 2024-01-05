<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

//Administrativo
Route::prefix('admin')->group(function () {
    Route::get('pages/login', 'Administrativo\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('pages/login', 'Administrativo\Auth\LoginController@login')->name('admin.login.submit');
    Route::post('pages/logout', 'Administrativo\Auth\LoginController@logout')->name('admin.logout');
    Route::get('/pages/dashboard', 'Administrativo\DashboardController@index')->name('dashboard');
    Route::get('/pages/profile', 'Administrativo\ProfileController@index')->name('profile');
});

Route::match(['get', 'post'], '/', [ProdutosController::class, 'index'])
    ->name('home');
Route::match(['get', 'post'], '/categoria', [ProdutosController::class, 'categoria'])
    ->name('categoria');
//Filtro categorias
Route::match(['get', 'post'], '/{idcategoria}/categoria', [ProdutosController::class, 'categoria'])
    ->name('categoria_por_id');

Route::match(['get', 'post'], '/cadastrar', [ClienteController::class, 'cadastrar'])
    ->name('cadastrar');

Route::match(['get', 'post'], '/cliente/cadastrar', [ClienteController::class, 'cadastrarCliente'])
    ->name('cadastrar_cliente');
//Login Cliente
Route::match(['get', 'post'], '/logar', [UsuarioController::class, 'logar'])
    ->name('logar');
Route::get('/sair', [UsuarioController::class, 'sair'])
    ->name('sair');
//Produto detalhes
Route::match(['get', 'post'], '/{produto}/produtos/detalhes', [ProdutosController::class, 'produtosDetalhes'])
    ->name('produto_detalhes');
//Carrinho
Route::match(['get', 'post'], '/{idproduto}/carrinho/adcionar', [ProdutosController::class, 'adcionarCarrinho'])
    ->name('adcionar_carrinho');
//Ver carrinho
Route::match(['get', 'post'], '/carrinho', [ProdutosController::class, 'verCarrinho'])
    ->name('ver_carrinho');
//Excluir item do carrinho
Route::match(['get', 'post'], '/{indice}/excluircarrinho', [ProdutosController::class, 'excluirCarrinho'])
    ->name('carrinho_excluir');
//Fechar item do carrinho
Route::post('/carrinho/finalizar', [ProdutosController::class, 'finalizar'])
    ->name('carrinho_finalizar');
//Historico de compras cliente
Route::match(['get', 'post'], '/compras/historico', [ProdutosController::class, 'historico'])
    ->name('compra_historico');
//Detalhes compras cliente
Route::match(['get', 'post'], '/compras/detalhes', [ProdutosController::class, 'detalhes'])
    ->name('compra_detalhes');
//Pagamentos compras cliente
Route::match(['get', 'post'], '/compras/pagar', [ProdutosController::class, 'pagar'])
    ->name('pagar');
