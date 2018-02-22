<?php

Route::resource('/painel/produtos', 'Painel\ProdutoController');
Route::get('/painel', function(){
	return view('painel/index');
});
Route::get('/painel/produtos/{id}/destroy', 'Painel\ProdutoController@destroy')->name('produtos.delete');

Route::group(['namespace' => 'Site'], function(){
	Route::get('/', 'SiteController@index');
	Route::get('/categoria/{id}', 'SiteController@categoria');
});


