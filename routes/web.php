<?php

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
    return view('index');
});

Route::get('/produtos', 'ProdutoController@index');

Route::get('/produtos/modal', 'ProdutoController@listaComboCategoria');

Route::post('/produtos', 'ProdutoController@store');

Route::get('/produtos/excluir/{id}', 'ProdutoController@destroy');

Route::post('/produtos/edit/{id}', 'ProdutoController@update');

Route::get('/categorias', 'CategoriaController@index');

Route::post('/categorias', 'CategoriaController@store');

Route::get('/categorias/excluir/{id}', 'CategoriaController@destroy');

Route::post('/categorias/edit/{id}', 'CategoriaController@update');