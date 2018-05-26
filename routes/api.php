<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('cars/', "Api\\CarController@getCarList");
Route::get('cars/{id}', "Api\\CarController@getCar");
Route::resource('admin/cars', "Api\\Admin\\CarController");