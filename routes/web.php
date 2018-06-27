<?php


// Nuestra vista raiz ('/') es index
Route::get('/', function () {
	
    return view('index');
});


Route::get('registro',[
	'uses' => 'HomeController@registro' //Nombre_del_controlador@Nombre_del_metodo

]);

Route::get('create',[
	'uses' => 'HomeController@create' //Nombre_del_controlador@Nombre_del_metodo

]);

//Inicio de Sesion - (login y logout)
Route::get('inicioSesion',[
	'uses' => 'HomeController@inicioSesion', 
]);

//Inicio de Sesion - (login y logout)
Route::get('login',[
	'uses' => 'HomeController@login', 
]);

Route::get('login', 'HomeController@login');
Route::post('login', 'HomeController@login');
Route::get('logout', 'HomeController@logout');
