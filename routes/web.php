<?php


// Nuestra vista raiz ('/') es index
Route::get('/', function () {
	
    return view('index');
});


//Registro de usuarios
Route::get('persona', 'HomeController@registro');
Route::post('persona', 'HomeController@registro');

Route::get('registro',[
	'uses' => 'HomeController@registro' //Nombre_del_controlador@Nombre_del_metodo

]);

Route::get('usuarioCreado',[
	'uses' => 'HomeController@usuarioCreado' //Nombre_del_controlador@Nombre_del_metodo

]);

//Inicio de Sesion - (login y logout)
Route::get('inicioSesion',[
	'uses' => 'HomeController@inicioSesion', 
	'as' => 'login'
]);

Route::post('login', 'HomeController@inicioSesion');
Route::get('logout', 'HomeController@logout');
