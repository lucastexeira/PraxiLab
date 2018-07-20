<?php

// Nuestra vista raiz ('/') es index
Route::get('/', function () {
	
    return view('index');
});

Route::get('index',[
	'uses' => 'HomeController@index' //Nombre_del_controlador@Nombre_del_metodo

]);

Route::get('indexSinRegistro',[
	'uses' => 'HomeController@indexSinRegistro' //Nombre_del_controlador@Nombre_del_metodo

]);

Route::get('registro',[
	'uses' => 'HomeController@registro' //Nombre_del_controlador@Nombre_del_metodo

]);

Route::get('registroSinRegistro',[
	'uses' => 'HomeController@registroSinRegistro' //Nombre_del_controlador@Nombre_del_metodo

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

//Inicio de Sesion - (login y logout)
Route::get('perfil',[
	'uses' => 'HomeController@perfil'
]);
//Rubros y Servicios
Route::get('rubrosYServicios',[
	'uses' => 'RubroController@verRubrosYServicios' //Nombre_del_controlador@Nombre_del_metodo

]);

//Lista de servicios
Route::get('todosLosServicios',[
	'uses' => 'ServicioController@verTodosLosServicios' //Nombre_del_controlador@Nombre_del_metodo

]);

/**Lista Servicios de un Rubro
Route::get('servicios/{id_rubro}',[
	'uses' => 'ServicioController@verServiciosPorRubro' //Nombre_del_controlador@Nombre_del_metodo

]);*/

Route::get('servicios/{id_rubro}',[
	'uses' => 'ServicioController@verServicios' //Nombre_del_controlador@Nombre_del_metodo

]);

//Lista los usuarios que pertenecen a un servicio
Route::get('usuariosPorServicio/{id_servicio}', 'ServicioController@verUsuariosServicios');

//Rubro por ID
Route::get('/verRubro/{id_rubro}', 'HomeController@someMethod');

//ir a Wizard
Route::get('wizard',[
	'uses' => 'ServicioController@irAWizard' //Nombre_del_controlador@Nombre_del_metodo

]);

//Crear una practica (Wizard)
Route::get('createPractica',[
	'uses' => 'ServicioController@createPractica' //Nombre_del_controlador@Nombre_del_metodo

]);

//Lista de Practicas Por Estados
Route::get('listadoPracticasEstados',[
	'uses' => 'ServicioController@listadoPracticasEstados' //Nombre_del_controlador@Nombre_del_metodo

]);

//Ir al ABM de Practicas (Lista de Rubros)
Route::get('abmPractica',[
	'uses' => 'ServicioController@irAbmPractica' //Nombre_del_controlador@Nombre_del_metodo

]);

//Oferta
Route::get('oferta/{id_practica}',[
	'uses' => 'OfertaController@oferta'
]);

Route::get('transacciones',[
	'uses' => 'TransaccionController@verTransacciones' //Nombre_del_controlador@Nombre_del_metodo
]);

Route::get('cargarEvidencia',[
	'uses' => 'EvidenciaController@cargarEvidencia' //Nombre_del_controlador@Nombre_del_metodo
]);

Route::get('verEvidencia',[
	'uses' => 'EvidenciaController@verEvidencia' //Nombre_del_controlador@Nombre_del_metodo
]);
//Lista de Practicas en abmPractica
//Route::get('abmPracticaServicios','ServicioController@abmPracticaServicios');

//Route::get('mp', 'MercadoPagoController@compraMP' );

Route::get('compra', 'MercadoPagoController@compraMP');
Route::post('compra', 'MercadoPagoController@compraMP');