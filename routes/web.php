<?php

//use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/justificaciones', 'about')->name('about')->middleware('auth');

//ORDEN DE LAS RUTAS SI ES IMPORTANTE
Route::get('/portfolio', 'PortfolioController@index')->name('portfolio')->middleware('auth');
//MOSTRAR INICIO, EDITAR, ACTUALIZAR
Route::get('/users/index','UserController@index')->name('users.index')->middleware('auth');
Route::get('/users/crear','UserController@create')->name('users.create')->middleware('auth');
Route::get('/users/{user}/editar','UserController@edit')->name('users.edit')->middleware('auth');
Route::patch('/users/{user}','UserController@update')->name('users.update')->middleware('auth');
//GUARDAR
Route::post('/users', 'UserController@store')->name('users.store')->middleware('auth');
//MOSTRAR
Route::get('/users/{user}','UserController@show')->name('users.show')->middleware('auth');
//BORRAR
Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('auth');

Route::view('/permisos', 'permisos')->name('permisos')->middleware('auth');
Route::post('permisos', 'MessageController@store')->name('messages.store')->middleware('auth');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//CRUD PERMISOS

//MOSTRAR INICIO, EDITAR, ACTUALIZAR
Route::get('/permisos/index','PermisoController@index')->name('permisos.index')->middleware('auth');
Route::get('/permisos/crear','PermisoController@create')->name('permisos.create')->middleware('auth');
Route::get('/permisos/{permiso}/editar','PermisoController@edit')->name('permisos.edit')->middleware('auth');
Route::patch('/permisos/{permiso}','PermisoController@update')->name('permisos.update')->middleware('auth');
//GUARDAR
Route::post('/permisos', 'PermisoController@store')->name('permisos.store')->middleware('auth');
//MOSTRAR
Route::get('/permisos/{permiso}','PermisoController@show')->name('permisos.show')->middleware('auth');
//BORRAR
Route::delete('/permisos/{permiso}', 'PermisoController@destroy')->name('permisos.destroy')->middleware('auth');
