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
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/home2', 'HomeController@inspector');


//CRUD PERMISOS

//MOSTRAR INICIO, EDITAR, ACTUALIZAR
Route::get('/permisos/index','PermisoController@index')->name('permisos.index');
Route::get('/permisos/crear','PermisoController@create')->name('permisos.create');
Route::get('/permisos/{permiso}/editar','PermisoController@edit')->name('permisos.edit');
Route::get('/permisos/{permiso}/eliminar','PermisoController@destroy')->name('permisos.destroy');
Route::patch('/permisos/{permiso}','PermisoController@update')->name('permisos.update')->middleware('auth');
//GUARDAR
Route::post('/permisos', 'PermisoController@store')->name('permisos.store')->middleware('auth');
//MOSTRAR
Route::get('/permisos/{permiso}','PermisoController@show')->name('permisos.show')->middleware('auth');
//BORRAR
//Route::delete('/permisos/{permiso}', 'PermisoController@destroy')->name('permisos.destroy')->middleware('auth');

//CRUD JUSTIFICACION
Route::get('/justificacion/index','JustificacionController@index')->name('justificacion.index');



Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
