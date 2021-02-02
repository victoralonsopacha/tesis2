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

Route::get('/home', 'HomeController@index')->middleware('auth');
//ROL INSPECTOR
//*CRUD PERMISOS*//
//MOSTRAR INICIO, EDITAR, ACTUALIZAR
Route::group(['middleware' => ['role:Inspector']], function () {
    Route::get('/permisos/index','PermisoController@index')->name('permisos.index');
    Route::get('/permisos/crear','PermisoController@create')->name('permisos.create');
    Route::get('/permisos/{permiso}/editar','PermisoController@edit')->name('permisos.edit');
    Route::get('/permisos/{permiso}/eliminar','PermisoController@destroy')->name('permisos.destroy');
    Route::patch('/permisos/{permiso}','PermisoController@update')->name('permisos.update');
    //GUARDAR
    Route::post('/permisos', 'PermisoController@store')->name('permisos.store');
    //MOSTRAR
    Route::get('/permisos/{permiso}','PermisoController@show')->name('permisos.show');


});
//JUSTIFICAR
Route::get('/permisos/{permiso}/justificar','PermisoController@justificar')->name('permisos.justificar');

//----------------------------------------------
//CRUD PERMISOS PROFESORES
//MOSTRAR INICIO, EDITAR, ACTUALIZAR
Route::get('/permiso_profesors/principal','PermisoProfesorController@inicio')->name('permiso_profesors.principal');
Route::get('/permiso_profesors/{permiso_profesor}/index','PermisoProfesorController@index')->name('permiso_profesors.index');
Route::get('/permiso_profesors/crear','PermisoProfesorController@create')->name('permiso_profesors.create');
Route::get('/permiso_profesors/{permiso_profesor}/editar','PermisoProfesorController@edit')->name('permiso_profesors.edit');
Route::get('/permiso_profesors/{permiso_profesor}/eliminar','PermisoProfesorController@destroy')->name('permiso_profesors.destroy');
Route::patch('/permiso_profesors/{permiso_profesor}','PermisoProfesorController@update')->name('permiso_profesors.update');
//GUARDAR
Route::post('/permiso_profesors', 'PermisoProfesorController@store')->name('permiso_profesors.store');
//MOSTRAR
Route::get('/permiso_profesors/{permiso_profesor}','PermisoProfesorController@show')->name('permiso_profesors.show');
//BORRAR
Route::delete('/permiso_profesors/{permiso_profesor}', 'PermisoProfesorController@destroy')->name('permiso_profesors.destroy');


//RUTAS PARA CARGAR EXCEL
Route::get('import-form', 'TimbradaController@importForm')->name('import-form');
Route::post('import-form', 'TimbradaController@import')->name('import');

//RUTAS PARA CREAR HORARIOS
Route::get('/horarios/index', 'HorarioController@index')->name('horarios.index')->middleware('auth');
Route::get('/horarios/{user}/crear', 'HorarioController@create')->name('horarios.create')->middleware('auth');
Route::get('/horarios/{user}/editar', 'HorarioController@edit')->name('horarios.edit')->middleware('auth');
Route::get('/horarios/{user}','HorarioController@show')->name('horarios.show')->middleware('auth');
Route::post('/horarios', 'HorarioController@store')->name('horarios.store')->middleware('auth');
Route::patch('/horarios/{user}','HorarioController@update')->name('horarios.update')->middleware('auth');


//RUTAS CRUD USUARIOS
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/users/index', 'UserController@index')->name('users.index')->middleware('auth');;
Route::get('/users/crear', 'UserController@create')->name('users.create');
Route::get('/users/{user}/editar','UserController@edit')->name('users.edit');
Route::get('/users/{user}/eliminar','UserController@destroy')->name('users.destroy');
Route::get('/users/{user}','UserController@show')->name('users.show');
Route::post('/users', 'UserController@store')->name('users.store');
Route::patch('/users/{user}','UserController@update')->name('users.update');


//RUTAS AUTENTICACION
//Route::auth();
//Rutas Auth - Personalizacion
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
/*$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
// Password Reset Routes...*/
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');/*password.email*/
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email'); /*password.email*/
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset'); /*password.reset*/
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');
 


//RUTAS PARA CALCULAR TIEMPOS Y CONTAR PERMISOS
Route::get('/calculo_tiempos/index','ControlTiempoController@index')->name('calculo_tiempos.index')->middleware('auth');
Route::get('/calculo_tiempos/{user}/calcular','ControlTiempoController@show')->name('calculo_tiempos.calcular')->middleware('auth');
Route::get('/calculo_tiempos/{user}/total','ControlTiempoController@suma_total_tiempo')->name('calculo_tiempos.total')->middleware('auth');
Route::post('/calculo_tiempos/{user}/total2','ControlTiempoController@suma_total_tiempo')->name('calculo_tiempos.total2')->middleware('auth');

Route::get('/calculo_tiempos/{user}/permisos','ControlTiempoController@suma_permisos')->name('calculo_tiempos.permisos')->middleware('auth');








