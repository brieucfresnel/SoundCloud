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

// Main pages routes
Route::get('/', 'LandingController@index');
Route::get('/about/{id}', 'LandingController@about');

// Tracks routes
Route::get('/track/new', 'TrackController@newTrack')->middleware('auth'); // middleware->auth(): La route existe seulement si l'utilisateur est connecté
Route::post('/track/new', 'TrackController@create')->middleware('auth');

// User routes
Route::get('/user/{id}', 'UserController@show')->where('id', '[0-9]+');
Route::get('/follow/{id}', 'UserController@follow')->where('id', '[0-9]+')->middleware('auth');

// Like routes
Route::get('/like/{id}', 'TrackController@like')->where('id', '[0-9]+')->middleware('auth');

// Search routes
Route::get('/search', 'SearchController@index');
Route::post('/search', 'SearchController@index');


Auth::routes();

/*
* TODO
* accueil,
* profil
* search for user
* nb of <3, nb of follows
* list of followers
* 404
* +more
*/
