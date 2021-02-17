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
//PERFIL INSPECTOR
Route::get('/perfil/inspector','InspectorController@perfil')->name('perfil.inspector');
Route::get('/dashboard/inspector','InspectorController@dashboard')->name('dashboard.inspector');
//*CRUD PERMISOS*//
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

//**ROL PROFESOR**
Route::get('/perfil/profesor','ProfesorController@perfil')->name('perfil.profesor');
Route::get('/dashboard/profesor','ProfesorController@dashboard')->name('dashboard.profesor');
//CRUD JORNADA
//MOSTRAR INICIO, EDITAR, ACTUALIZAR
Route::get('/jornada/index','JornadaController@index')->name('jornada.index');
Route::post('/jornada/buscar','JornadaController@buscar')->name('jornada.buscar');


//CRUD PERMISOS PROFESORES
//MOSTRAR INICIO, EDITAR, ACTUALIZAR
Route::get('/permiso_profesors/principal','PermisoProfesorController@inicio')->name('permiso_profesors.principal');
Route::get('/permiso_profesors/{permiso_profesor}/index','PermisoProfesorController@index')->name('permiso_profesors.index');
Route::get('/permiso_profesors/{permiso_profesor}/index1','PermisoProfesorController@index1')->name('permiso_profesors.index1');
Route::get('/permiso_profesors/crear','PermisoProfesorController@create')->name('permiso_profesors.create');
Route::get('/permiso_profesors/{permiso_profesor}/editar','PermisoProfesorController@edit')->name('permiso_profesors.edit');
Route::get('/permiso_profesors/{permiso_profesor}/eliminar','PermisoProfesorController@destroy')->name('permiso_profesors.destroy');
Route::patch('/permiso_profesors/{permiso_profesor}','PermisoProfesorController@update')->name('permiso_profesors.update');
//GUARDAR
Route::post('/permiso_profesors', 'PermisoProfesorController@store')->name('permiso_profesors.store');
//MOSTRAR
Route::get('/permiso_profesors/{permiso_profesor}','PermisoProfesorController@show')->name('permiso_profesors.show');
Route::get('/permiso_profesors','PermisoProfesorController@shows')->name('permiso_profesors.shows');
//BORRAR
Route::delete('/permiso_profesors/{permiso_profesor}', 'PermisoProfesorController@destroy')->name('permiso_profesors.destroy');
//BUSCAR
Route::post('/permiso_profesors/buscar','PermisoProfesorController@buscar')->name('permiso_profesors.buscar');

//RUTAS PARA REGISTRAR TIMBRADAS DE PERMISOS
Route::get('/timbrada_permisos/index', 'TimbradaPermisoController@index')->name('timbrada_permisos.index')->middleware('auth');;
Route::post('/timbrada_permisos/crear', 'TimbradaPermisoController@create')->name('timbrada_permisos.create')->middleware('auth');
Route::post('/timbrada_permisos', 'TimbradaPermisoController@store')->name('timbrada_permisos.store')->middleware('auth');

//RUTAS PARA ATRASOS
Route::get('/atrasos/index','AtrasoController@index')->name('atrasos.index');
Route::post('/atrasos/buscar','AtrasoController@buscar')->name('atrasos.buscar');

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
Route::delete('/users/{user}/eliminar','UserController@destroy')->name('users.destroy');
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

//RUTAS PARA REGISTRAR TIMBRADAS DE PERMISOS
//Route::get('/timbrada_permisos/index', 'TimbradaPermisoController@index')->name('timbrada_permisos.index')->middleware('auth');;
Route::get('/timbrada_permisos/crear', 'TimbradaPermisoController@create')->name('timbrada_permisos.create')->middleware('auth');
Route::post('/timbrada_permisos', 'TimbradaPermisoController@store')->name('timbrada_permisos.store')->middleware('auth');

//RUTAS PARA CREAR Y ALMACENAR EL TIEMPO A REPONER
Route::get('/tiempo_reposicions/index', 'TiempoReposicionController@index')->name('tiempo_reposicions.index')->middleware('auth');;
Route::post('/tiempo_reposicions/create', 'TiempoReposicionController@create')->name('tiempo_reposicions.create')->middleware('auth');
Route::post('/tiempo_reposicions', 'TiempoReposicionController@store')->name('tiempo_reposicions.store')->middleware('auth');

//RUTAS PARA REPORTE CONSOLIDADO
ROUTE::get('/consolidado_individual/index', 'ConsolidadoIndividualController@index')->name('consolidado_individual.index')->middleware('auth');
ROUTE::get('/consolidado_individual/{user}/calcular', 'ConsolidadoIndividualController@show')->name('consolidado_individual.calcular')->middleware('auth');
Route::post('/consolidado_individual/{user}/total2','ConsolidadoIndividualController@consolidado_individual')->name('consolidado_individual.total2')->middleware('auth');
