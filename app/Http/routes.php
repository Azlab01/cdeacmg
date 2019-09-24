<?php


Route::auth();

Route::post('/home', 'HomeController@store');
Route::post('/home/newuser', 'HomeController@addUser');
Route::get('/home/livrer/{id}', 'HomeController@updateCommande');
Route::get('/home/delete/{id}', 'HomeController@deleteCommande');
Route::get('/home', 'HomeController@index');
Route::get('/register', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::resource('user', 'UserController');