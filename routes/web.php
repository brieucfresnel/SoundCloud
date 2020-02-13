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
Route::get('/piste/nouvelle', 'LandingController@newTrack')->middleware('auth');
Route::post('/piste/upload', 'LandingController@uploadTrack')->middleware('auth');

// User routes
Route::get('/utilisateur/{id}', 'LandingController@utilisateur')->where('id', '[0-9]+');
Route::get('/suivre/{id}', 'LandingController@follow')->where('id', '[0-9]+')->middleware('auth');

// Tracks routes

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
