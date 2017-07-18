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

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'cars'], function () {
    Route::get('/', 'CarController@index')->name('car-list');
    Route::get('/create', 'CarController@create')->name('car-form');
    Route::post('/', 'CarController@store')->name('car-store');
    Route::get('/{id}/edit', 'CarController@edit')->name('car-edit');
    Route::put('/{id}', 'CarController@update')->name('car-update');
    Route::get('/{id}', 'CarController@show')->name('car-show');
    Route::delete('/{id}', 'CarController@destroy')->name('car-destroy');
});