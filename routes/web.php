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
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//RUTAS DEL ADMINISTRADOR
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
  
	//Panel principal Administrador.
	Route::get('/','Admin\AdminController@index'); 

	//Rutas de los Usuarios
	Route::resource('user', 'Admin\UserController', ['names' => [
		'index' => 'admin.user.index',
		'create' => 'admin.user.create',
		'store' => 'admin.user.store',
		'destroy' => 'admin.user.destroy',
		'show' => 'admin.user.show',
		'edit' => 'admin.user.edit',
		'update' => 'admin.user.update',
	]]);
	Route::post('user/activar/{user}',[
	  'uses'  =>'Admin\UserController@activar',
	  'as'    =>'admin.user.activar'
	]);
	Route::post('user/pw',[
	  'uses'  =>'Admin\UserController@pw',
	  'as'    =>'admin.user.pw'
	]);
	Route::put('user/pw_save/{user}',[
	  'uses'  =>'Admin\UserController@pw_save',
	  'as'    =>'admin.user.pw_save'
	]);

	//Rutas de los Equipos
	Route::resource('equipo', 'Admin\EquipoController', ['names' => [
		'index' => 'admin.equipo.index',
		'create' => 'admin.equipo.create',
		'store' => 'admin.equipo.store',
		'destroy' => 'admin.equipo.destroy',
		'show' => 'admin.equipo.show',
		'edit' => 'admin.equipo.edit',
		'update' => 'admin.equipo.update',
	]]);
	Route::post('equipo/activar/{equipo}',[
	  'uses'  =>'Admin\EquipoController@activar',
	  'as'    =>'admin.equipo.activar'
	]);

	//Rutas de los Partidos
	Route::resource('partido', 'Admin\PartidoController', ['names' => [
		'index' => 'admin.partido.index',
		'create' => 'admin.partido.create',
		'store' => 'admin.partido.store',
		'destroy' => 'admin.partido.destroy',
		'show' => 'admin.partido.show',
		'edit' => 'admin.partido.edit',
		'update' => 'admin.partido.update',
	]]);
	Route::post('equipo/activar/{partido}',[
	  'uses'  =>'Admin\PartidoController@activar',
	  'as'    =>'admin.partido.activar'
	]);

	//Rutas de los Partidos Singles
	Route::resource('partido_s', 'Admin\PartidoSingleController', ['names' => [
		'index' => 'admin.partidoSingle.index',
		'create' => 'admin.partidoSingle.create',
		'store' => 'admin.partidoSingle.store',
		'destroy' => 'admin.partidoSingle.destroy',
		'show' => 'admin.partidoSingle.show',
		'edit' => 'admin.partidoSingle.edit',
		'update' => 'admin.partidoSingle.update',
	]]);
	Route::post('equipo_s/activar/{partidoSingle}',[
	  'uses'  =>'Admin\PartidoSingleController@activar',
	  'as'    =>'admin.partidoSingle.activar'
	]);

	//Rutas de los Partidos Dobles
	Route::resource('partido_d', 'Admin\PartidoDobleController', ['names' => [
		'index' => 'admin.partidoDoble.index',
		'create' => 'admin.partidoDoble.create',
		'store' => 'admin.partidoDoble.store',
		'destroy' => 'admin.partidoDoble.destroy',
		'show' => 'admin.partidoDoble.show',
		'edit' => 'admin.partidoDoble.edit',
		'update' => 'admin.partidoDoble.update',
	]]);
	Route::post('equipo_s/activar/{partidoDoble}',[
	  'uses'  =>'Admin\PartidoDobleController@activar',
	  'as'    =>'admin.partidoDoble.activar'
	]);

	//Rutas de las Carreras
	Route::resource('carrera', 'Admin\CarreraController', ['names' => [
		'index' => 'admin.carrera.index',
		'create' => 'admin.carrera.create',
		'store' => 'admin.carrera.store',
		'destroy' => 'admin.carrera.destroy',
		'show' => 'admin.carrera.show',
		'edit' => 'admin.carrera.edit',
		'update' => 'admin.carrera.update',
	]]);
	Route::post('carrera/activar/{carrera}',[
	  'uses'  =>'Admin\CarreraController@activar',
	  'as'    =>'admin.carrera.activar'
	]);

	//Rutas de los Eventos
	Route::resource('evento', 'Admin\EventoController', ['names' => [
		'index' => 'admin.evento.index',
		'create' => 'admin.evento.create',
		'store' => 'admin.evento.store',
		'destroy' => 'admin.evento.destroy',
		'show' => 'admin.evento.show',
		'edit' => 'admin.evento.edit',
		'update' => 'admin.evento.update',
	]]);
	Route::post('evento/activar/{evento}',[
	  'uses'  =>'Admin\EventoController@activar',
	  'as'    =>'admin.evento.activar'
	]);
	Route::get('evento/partidos/{evento}',[
	  'uses'  =>'Admin\EventoController@partidos',
	  'as'    =>'admin.evento.partidos'
	]);

	//Rutas de las Modalidades
	Route::resource('modalidad', 'Admin\ModalidadController', ['names' => [
		'index' => 'admin.modalidad.index',
		'create' => 'admin.modalidad.create',
		'store' => 'admin.modalidad.store',
		'destroy' => 'admin.modalidad.destroy',
		'show' => 'admin.modalidad.show',
		'edit' => 'admin.modalidad.edit',
		'update' => 'admin.modalidad.update',
	]]);
	Route::post('modalidad/activar/{modalidad}',[
	  'uses'  =>'Admin\ModalidadController@activar',
	  'as'    =>'admin.modalidad.activar'
	]);
});

Route::group(['prefix' => 'estudiante', 'middleware' => 'estudiante'], function () {

	// //Panel principal del estudiante
	// Route::get('/','Estudiante\EstudianteController@index');

	Route::get('perfil', [
	  'uses'  =>'Estudiante\UserController@perfil',
	  'as'    =>'estudiante.perfil'
	]);

	Route::post('perfil/posicion',[
	  'uses'  =>'Estudiante\UserController@posicion',
	  'as'    =>'estudiante.posicion'
	]);

	Route::post('perfil/password',[
	  'uses'  =>'Estudiante\UserController@password',
	  'as'    =>'estudiante.password'
	]);

	Route::get('Equipo', [
	  'uses'  =>'Estudiante\UserController@equipo',
	  'as'    =>'estudiante.equipo'
	]);

	Route::get('historial', [
	  'uses'  =>'Estudiante\UserController@historial',
	  'as'    =>'estudiante.historial'
	]);

	//Rutas de los usuarios
	Route::resource('/', 'Estudiante\UserController')->only([
    'index', 'show',
	])->names([
	'index' => 'estudiante.user.index',
	'show' => 'estudiante.user.show'
	]);

	Route::get('eventos',[
	  'uses'  =>'Estudiante\UserController@eventos',
	  'as'    =>'estudiante.eventos'
	]);
/*
	//Rutas de los usuarios
	Route::resource('eventos', 'Admin\EventoController')->only([
    'index', 'show',
	])->names([
	'index' => 'estudiante.user.index',
	'show' => 'estudiante.user.show'
	]);

	*/
});