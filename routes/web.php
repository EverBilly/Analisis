<?php


//Route::get('/', 'LoginController@index');

Auth::routes();

Route::get('/', 'HomeController@index');
// Route::get('inicio','LoginController@loguearse');
Route::resource('rol', 'RolController');
Route::resource('usuario', 'UsuarioController');
Route::resource('producto', 'ProductoController');
Route::resource('categoria', 'CategoriaController');
Route::resource('medida', 'MedidaController');
Route::resource('marca', 'MarcaController');
Route::resource('entrada', 'EntradaController');
Route::resource('salida', 'SalidaController');
Route::resource('detalleproducto', 'DetalleProductoController');


Route::resource('log', 'LogController');
