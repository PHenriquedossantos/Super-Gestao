<?php

use Illuminate\Support\Facades\Route;




Route::get('/', 'PrincipalController@store')->name('site.index');
Route::get('/contato', 'ContatoController@store')->name('site.contato');
Route::post('/contato', 'ContatoController@store')->name('site.contato');
Route::get('/sobre', 'SobreController@store')->name('site.sobre-nos');
// Rotas para login
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');


Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){return 'produtos';})->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@store')->name('teste');


Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});
