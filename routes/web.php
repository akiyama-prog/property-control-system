<?php

use Illuminate\Http\Request;
use App\Property;
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

Route::get('/', 'PropertiesController@index');

Route::resource('properties', 'PropertiesController');

Route::get('search','PropertiesController@search')->name('properties.search');