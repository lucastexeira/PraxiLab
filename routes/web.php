<?php


// Nuestra vista raiz ('/') es index
Route::get('/', function () {
	
    return view('index');
});

Route::get('personas', 'HomeController@index');

Route::get('index',[
	'uses' => 'HomeController@index' //Nombre_del_controlador@Nombre_del_metodo

]);

Route::get('registro',[
	'uses' => 'HomeController@registro' //Nombre_del_controlador@Nombre_del_metodo

]);

Route::get('inicioSesion',[
	'uses' => 'HomeController@inicioSesion' 
]);