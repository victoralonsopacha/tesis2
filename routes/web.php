<?php

//use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/quienes somos', 'about')->name('about');

//ORDEN DE LAS RUTAS SI ES IMPORTANTE
Route::get('/portfolio', 'PortfolioController@index')->name('portfolio');

Route::get('/users/index','UserController@index')->name('users.index');
Route::get('/users/crear','UserController@create')->name('users.create');

Route::post('/users', 'UserController@store')->name('users.store');

Route::get('/users/{user}','UserController@show')->name('users.show');

Route::view('/contacto', 'contact')->name('contact');
Route::post('contact', 'MessageController@store')->name('messages.store');

