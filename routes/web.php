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
Route::get('/most-recent', 'LandingController@mostRecent');
Route::get('/most-popular', 'LandingController@mostPopular');


// Tracks routes
Route::get('/track/new', 'TrackController@newTrack')->middleware('auth'); // middleware->auth(): La route existe seulement si l'utilisateur est connecté
Route::post('/track/new', 'TrackController@create')->middleware('auth');

// Playlist routes
Route::post('/playlist/new', 'PlaylistController@create')->middleware('auth');
Route::get('/playlist/{id}', 'PlaylistController@show')->where('id', '[0-9]+');
Route::get('/playlist/add/{playlistID}/{trackID}', 'PlaylistController@addTrack')->where('id', '[0-9]+');

// User routes
Route::get('/user/{id}', 'UserController@show')->where('id', '[0-9]+');
Route::get('/follow/{id}', 'UserController@follow')->where('id', '[0-9]+')->middleware('auth');

// Like routes
Route::get('/like/{id}', 'TrackController@like')->where('id', '[0-9]+')->middleware('auth');

// Search routes
Route::get('/search', 'SearchController@index');
Route::post('/search', 'SearchController@index');

// AJAX routes
Route::get('/setCurrentTrack', 'LandingController@setCurrentTrack');
Route::post('/setCurrentTrack', 'LandingController@setCurrentTrack');

Auth::routes();
