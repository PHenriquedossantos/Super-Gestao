<?php

use Illuminate\Support\Facades\Route;





Route::get('/', 'PrincipalController@store')->name('site.index')->middleware('log.acesso');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::post('/contato', 'ContatoController@store')->name('site.contato');

Route::get('/sobre', 'SobreController@store')->name('site.sobre-nos');
// Rotas para login
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');


Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function(){
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/produto', 'ProdutoController@index')->name('app.produto');

});

Route::get('/teste/{p1}/{p2}', 'TesteController@store')->name('teste');


Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});
