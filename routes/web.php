<?php

//use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/quienes somos', 'about')->name('about');

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

Route::view('/contacto', 'contact')->name('contact');
Route::post('contact', 'MessageController@store')->name('messages.store');

