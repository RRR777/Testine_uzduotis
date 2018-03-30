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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/autos', 'AutoController@index');
Route::get('/autos/create', 'AutoController@create');
Route::post('/autos', 'AutoController@store');
Route::get('/autos/{auto}', 'AutoController@show');


Route::get('/trips', 'TripController@index');
Route::get('/trips/{auto}/create', 'TripController@create');
Route::post('/trips/{auto}', 'TripController@store');

Route::get('/users', 'UserController@index');