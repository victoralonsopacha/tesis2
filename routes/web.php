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


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
//REDIRECT INDEX
Route::get('/', function () {
    return view('index');
});
//RUTAS AUTENTICACION
//Route::auth();
//Rutas Auth - Personalizacion
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
/*Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');*/
// Password Reset Routes...*/
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');/*password.email*/
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email'); /*password.email*/
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset'); /*password.reset*/
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//**ROL ADMINISTRADOR**
Route::group(['middleware' => ['role:Admin']], function () {
    //CRUD USUARIOS
    Route::get('/users/activos', 'UsersController@activos')->name('users.activos');
    Route::post('/users/find', 'UsersController@find')->name('users.find');

    Route::get('/users/inactivos', 'UsersController@inactivos')->name('users.inactivos');
    Route::get('/users/crear', 'UsersController@create')->name('users.create');
    Route::get('/users/{user_id}/editar','UsersController@edit')->name('users.edit');
    Route::delete('/users/{user}/eliminar','UsersController@destroy')->name('users.destroy');
    Route::get('/users/{user}','UsersController@show')->name('users.show');
    Route::post('/users', 'UsersController@store')->name('users.store');
    Route::patch('/users/{user_id}','UsersController@update')->name('users.update');
    //ACTIVAR USUARIO
    Route::patch('/users/{user}/activar', 'UsersController@activar')->name('users.active');
    Route::patch('/users/{user}/desactivar', 'UsersController@desactivar')->name('users.deactive');

    


});

//RUTAS PARA CARGAR EXCEL
Route::get('import-form', 'TimbradaController@importForm')->name('import-form');
Route::post('import-form', 'TimbradaController@import')->name('import');



//RUTAS PARA REGISTRAR TIMBRADAS DE PERMISOS
Route::get('/timbrada_permisos/index', 'TimbradaPermisoController@index')->name('timbrada_permisos.index');
Route::patch('/timbrada_permisos/{timbrada}/crear', 'TimbradaPermisoController@create')->name('timbrada_permisos.create');
Route::post('/timbrada_permisos', 'TimbradaPermisoController@store')->name('timbrada_permisos.store');
//
//**ROL INSPECTOR**

//PERFIL
//EDITAR PERFIL

Route::get('/dashboard/inspector','InspectorController@dashboard')->name('dashboard.inspector');
Route::post('/inspector/{user_id}/edit','InspectorController@edit')->name('inspector.edit');
Route::patch('/inspector/{user_id}','InspectorController@update')->name('inspector.update');

//*CRUD PERMISOS*//
Route::group(['middleware' => ['role:Inspector']], function () {
    Route::get('/profile/inspector','InspectorController@profile')->name('profile.inspector');
    Route::get('/permisos/index','PermisoController@index')->name('permisos.index');
    Route::get('/permisos/crear','PermisoController@create')->name('permisos.create');
    Route::get('/permisos/{permiso}/editar','PermisoController@edit')->name('permisos.edit');
    Route::get('/permisos/{permiso}/eliminar','PermisoController@destroy')->name('permisos.destroy');
    Route::patch('/permisos/{permiso}','PermisoController@update')->name('permisos.update');
    //GUARDAR
    Route::post('/permisos', 'PermisoController@store')->name('permisos.store');
    //MOSTRAR
    Route::get('/permisos/{permiso}','PermisoController@show')->name('permisos.show');
    Route::post('/permisos/find','PermisoController@findRequest')->name('permisos.find');
    
    //JUSTIFICAR
    Route::get('/permisos/{permiso}/justificar','PermisoController@justificar')->name('permisos.justificar');


});
Route::get('/permisos/downloadFile/{uuid}', 'PermisoController@downloadFile')->name('permisos.download');

//PERMISOS APROBADOS

//PERMISOS REPROBADOS



//EDITAR PERFIL
Route::patch('/user/{user_id}','ProfesorController@update')->name('profesor.update');
Route::post('/user/{user_id}/editar','ProfesorController@edit')->name('profesor.edit');

//**ROL PROFESOR**
Route::group(['middleware' => ['role:Profesor']], function () {
    Route::get('/dashboard/profesor','ProfesorController@dashboard')->name('dashboard.profesor');
    //PERFIL
    Route::get('/profile/profesor','ProfesorController@perfil')->name('profile.profesor');

    //CRUD PERMISOS PROFESORES
    //MOSTRAR INICIO, EDITAR, ACTUALIZAR
    Route::get('/permiso_profesors/{permiso_profesor}/index','PermisoProfesorController@index')->name('permiso_profesors.index');
    Route::get('/permiso_profesors/{permiso_profesor}/index1','PermisoProfesorController@index1')->name('permiso_profesors.index1');
    Route::get('/permiso_profesors/crear','PermisoProfesorController@create')->name('permiso_profesors.create');
    Route::get('/permiso_profesors/{permiso_profesor}/editar','PermisoProfesorController@edit')->name('permiso_profesors.edit');
    Route::get('/permiso_profesors/{permiso_profesor}/eliminar','PermisoProfesorController@destroy')->name('permiso_profesors.destroy');
    Route::patch('/permiso_profesors/{permiso_profesor}/update','PermisoProfesorController@update')->name('permiso_profesors.update');
    //GUARDAR
    Route::post('/permiso_profesors', 'PermisoProfesorController@store')->name('permiso_profesors.store');
    //MOSTRAR
    Route::get('/permiso_profesors/{permiso_profesor}','PermisoProfesorController@show')->name('permiso_profesors.show');
    Route::get('/permiso_profesors','PermisoProfesorController@shows')->name('permiso_profesors.shows');
    //BORRAR
    Route::delete('/permiso_profesors/{permiso_profesor}', 'PermisoProfesorController@destroy')->name('permiso_profesors.destroy');
    //BUSCAR
    Route::post('/permiso_profesors/buscar','PermisoProfesorController@buscar')->name('permiso_profesors.buscar');
    Route::post('/permiso_profesors/buscarA','PermisoProfesorController@buscarA')->name('permiso_profesors.buscarA');
    Route::post('/permiso_profesors/buscarB','PermisoProfesorController@buscarB')->name('permiso_profesors.buscarB');

});
//MOSTRAR INICIO, EDITAR, ACTUALIZAR
Route::get('/jornada/index','JornadaController@index')->name('jornada.index');
Route::post('/jornada/buscar','JornadaController@buscar')->name('jornada.buscar');

//RUTAS PARA VER TIMBRADAS
ROUTE::get('/consolidado_individual/index', 'ConsolidadoIndividualController@index')->name('consolidado_individual.index');
ROUTE::get('/consolidado_individual/{user}/calcular', 'ConsolidadoIndividualController@show')->name('consolidado_individual.calcular');
Route::post('/consolidado_individual/{user}/total2','ConsolidadoIndividualController@exportPdf')->name('consolidado_individual.total2');




//RUTAS PARA ATRASOS
Route::get('/atrasos/index','AtrasoController@index')->name('atrasos.index');
Route::post('/atrasos/buscar','AtrasoController@buscar')->name('atrasos.buscar');

//RUTAS PARA CREAR HORARIOS
Route::get('/horarios/index', 'HorarioController@index')->name('horarios.index');
Route::get('/horarios/{user}/crear', 'HorarioController@create')->name('horarios.create');
Route::get('/horarios/{user}/editar', 'HorarioController@edit')->name('horarios.edit');
Route::get('/horarios/{user}','HorarioController@show')->name('horarios.show');
Route::post('/horarios', 'HorarioController@store')->name('horarios.store');
Route::patch('/horarios/{user}','HorarioController@update')->name('horarios.update');

//RUTAS PARA CALCULAR TIEMPOS Y CONTAR PERMISOS
Route::get('/calculo_tiempos/index','ControlTiempoController@index')->name('calculo_tiempos.index');
Route::get('/calculo_tiempos/{user}/calcular','ControlTiempoController@show')->name('calculo_tiempos.calcular');
Route::get('/calculo_tiempos/{user}/total','ControlTiempoController@suma_total_tiempo')->name('calculo_tiempos.total');
Route::post('/calculo_tiempos/{user}/total2','ControlTiempoController@suma_total_tiempo')->name('calculo_tiempos.total2');
Route::get('/calculo_tiempos/{user}/permisos','ControlTiempoController@suma_permisos')->name('calculo_tiempos.permisos');

Route::post('/calculo_tiempos/exportar','ControlTiempoController@exportPdf')->name('calculo_tiempos.exportPdf');



//RUTA PARA BUSCADOR EN PERMISOS
Route::post('/calculo_tiempos/index','BuscadorController@index')->name('calculo_tiempos.index');


//RUTAS PARA CREAR Y ALMACENAR EL TIEMPO A REPONER
Route::get('/tiempo_reposicions/index_inspector', 'TiempoReposicionController@index_inspector')->name('tiempo_reposicions.index_inspector');
Route::get('/tiempo_reposicions/create', 'TiempoReposicionController@create')->name('tiempo_reposicions.create');
Route::post('/tiempo_reposicions', 'TiempoReposicionController@store')->name('tiempo_reposicions.store');
Route::get('/tiempo_reposicions/shows', 'TiempoReposicionController@shows')->name('tiempo_reposicions.shows');

Route::get('/tiempo_reposicions/index', 'TiempoReposicionController@index')->name('tiempo_reposicions.index');
Route::get('/tiempo_reposicions/index_inspector', 'TiempoReposicionController@index_inspector')->name('tiempo_reposicions.index_inspector');
Route::get('/tiempo_reposicions/{user}/ver_dias', 'TiempoReposicionController@ver_dias')->name('tiempo_reposicions.ver_dias');
ROUTE::get('/tiempo_reposicions/{reposicion}/calcular', 'TiempoReposicionController@show')->name('tiempo_reposicions.calcular');
//ACTIVAR Y DESACTIVAR TIEMPOS DE REPOSICION
ROUTE::patch('/tiempo_reposicions/{reposicion}/active', 'TiempoReposicionController@active')->name('tiempo_reposicions.active');
ROUTE::patch('/tiempo_reposicions/{reposicion}/desactive', 'TiempoReposicionController@desactive')->name('tiempo_reposicions.desactive');



//RUTAS PARA VER TIMBRADAS BIOMETRICO
ROUTE::get('/consolidado_individual/index', 'ConsolidadoIndividualController@index')->name('consolidado_individual.index');
ROUTE::get('/consolidado_individual/{user}/calcular', 'ConsolidadoIndividualController@show')->name('consolidado_individual.calcular');
Route::post('/consolidado_individual/{user}/total2','ConsolidadoIndividualController@exportPdf')->name('consolidado_individual.total2');

//RUTAS PARA VER TIMBRADAS PERMISOS
//RUTAS PARA VER TIMBRADAS
ROUTE::get('/consolidado_permisos/index', 'ConsolidadoPermisoController@index')->name('consolidado_permisos.index');
ROUTE::get('/consolidado_permisos/{user}/calcular', 'ConsolidadoPermisoController@show')->name('consolidado_permisos.calcular');
Route::post('/consolidado_permisos/{user}/total2','ConsolidadoPermisoController@exportPdf2')->name('consolidado_permisos.total2');


//DASHBOARD ADMIN
Route::get('/dashboard/admin','AdminController@dashboard')->name('dashboard.admin');

//EXPORTAR A PDF
Route::get('/consolidado_individual/exportPdf', 'ConsolidadoIndividualController@exportExcel')->name('consolidado_individual.exportPdf');
Route::get('/consolidado_permisos/exportPdf2', 'ConsolidadoIndividualController@exportPdf2')->name('consolidado_permisos.exportPdf2');

//EXPORTAR IMG
Route::get('/image', 'ImageController@index');
Route::post('dropzone/store', 'ImageController@dropzoneStore')->name('dropzone.store');
