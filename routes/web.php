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

Route::get('/', 'LandingController@index');
Route::get('/about/{id}', 'LandingController@about');

// middleware->auth(): La route existe seulement si l'utilisateur est connecté 
Route::get('/chanson/nouvelle', 'LandingController@newtrack')->middleware('auth');

// User routes
Route::get('/utilisateur/{id}', 'LandingController@utilisateur')->where('id', '[0-9]+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
