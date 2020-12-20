<?php

//use Illuminate\Support\Facades\Route;






Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::get('/portfolio', 'PortfolioController@index')->name('portfolio');
Route::get('/users','UsersController@index')->name('users');

Route::post('contact', 'MessagesController@store');

