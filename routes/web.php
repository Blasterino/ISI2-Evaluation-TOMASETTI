<?php

use Illuminate\Support\Facades\Route;

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

Route::get('films','FilmController@getLesFilms');

Route::get('films/{id}', 'FilmController@getFilmsByCategory');

Route::get('detailsFilm/{id}','FilmController@getDetailsOnFilm');

Route::get('deleteFilm/{id}', 'FilmController@deleteFilmById');
