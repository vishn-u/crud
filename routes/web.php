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

/*Route::get('/edit', function () {
    return view('city_edit');
});*/

Route::get('/create', function () {
    return view('city_create');
});

Route::resource('country','CountryController');

Route::resource('state','StateController');

Route::resource('city','CityController');

