<?php


Route::get('index',[
	'uses' => 'HomeController@index' //Nombre_del_controlador@Nombre_del_metodo

]);

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

//Rubros y Servicios
Route::get('rubrosYServicios',[
	'uses' => 'RubroController@verRubrosYServicios' //Nombre_del_controlador@Nombre_del_metodo

]);

//Servicios
Route::get('servicios',[
	'uses' => 'ServicioController@verServicios' //Nombre_del_controlador@Nombre_del_metodo

]);

//Rubro por ID
Route::get('/verRubro/{id_rubro}', 'HomeController@someMethod');