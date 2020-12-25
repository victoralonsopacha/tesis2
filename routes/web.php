<?php

//use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/justificaciones', 'about')->name('about');

//ORDEN DE LAS RUTAS SI ES IMPORTANTE
Route::get('/portfolio', 'PortfolioController@index')->name('portfolio');
//MOSTRAR INICIO, EDITAR, ACTUALIZAR
Route::get('/users/index','UserController@index')->name('users.index');
Route::get('/users/crear','UserController@create')->name('users.create');
Route::get('/users/{user}/editar','UserController@edit')->name('users.edit');
Route::patch('/users/{user}','UserController@update')->name('users.update');
//GUARDAR
Route::post('/users', 'UserController@store')->name('users.store');
//MOSTRAR
Route::get('/users/{user}','UserController@show')->name('users.show');
//BORRAR
Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

Route::view('/permisos', 'permisos')->name('permisos');
Route::post('permisos', 'MessageController@store')->name('messages.store');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
