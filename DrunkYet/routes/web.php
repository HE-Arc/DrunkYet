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

Route::get('/', 'HomeController@home');
// Route::get('/home', 'HomeController@home');

Route::get('/example', function(){
    return view('example');
});

Route::get('/drink', 'DrinkController@select');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');


Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');
Route::get('/logout','SessionsController@destroy');

Route::get('/add','AddDrinkController@create');
Route::post('/add','AddDrinkController@store');
