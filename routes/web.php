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
Route::get('/user/{id}', 'LandingController@profile');

// middleware->auth(): La route existe seulement si l'utilisateur est connecté
Route::get('/track/new', 'LandingController@newTrack')->middleware('auth');
Route::post('/track/new', 'LandingController@uploadTrack')->middleware('auth');

// User routes
Route::get('/utilisateur/{id}', 'LandingController@utilisateur')->where('id', '[0-9]+');
Route::get('/follow/{id}', 'LandingController@follow')->where('id', '[0-9]+')->middleware('auth');

// Tracks routes

// Like route
Route::post('/like', 'LandingController@likeTrack')->middleware('auth');

Auth::routes();

/*
* TODO
* accueil,
* profil
* follow user,
* search for user
* like a track,
* nb of <3, nb of follows
* list of followers
* 404
* +more
*/
