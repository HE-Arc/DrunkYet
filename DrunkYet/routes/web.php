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

Route::get('/home', 'HomeController@home');
Route::get('/', 'HomeController@home');

Route::get('/drink', 'DrinkController@select');
Route::get('/search', 'DrinkController@search');
Route::get('/consume/{drink_id}', 'DrinkController@consume');
Route::post('/consume', 'DrinkController@store');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');
Route::get('/edit','RegistrationController@edit');
Route::patch('/edit','RegistrationController@update');
Route::get('/pswd','PasswordController@edit');
Route::patch('/pswd','PasswordController@update');


Route::get('/login','SessionsController@create')->name('login');
Route::post('/login','SessionsController@store');
Route::get('/logout','SessionsController@destroy');

Route::get('/add','AddDrinkController@create');
Route::post('/add','AddDrinkController@store');
