<?php

use App\Http\Controllers\RaceController;
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
   // return view('dashboard');
});


Route::get('/admin', function () {
    return view('admin.view_races');
});

Route::get('/admin/races/', ['as' => 'listraces', 'uses' => 'App\Http\Controllers\RaceController@index']);
Route::get('/admin/races/add', ['as' => 'addrace', 'uses' => 'App\Http\Controllers\RaceController@create']);
Route::post('/admin/races/store/', ['as' => 'saverace', 'uses' => 'App\Http\Controllers\RaceController@store']);
Route::get('/admin/races/edit/{id?}', ['as' => 'editrace', 'uses' => 'App\Http\Controllers\RaceController@edit']);
Route::post('/admin/races/update/{id?}', ['as' => 'updaterace', 'uses' => 'App\Http\Controllers\RaceController@update']);
Route::get('/admin/races/delete/{id?}', ['as' => 'deleterace', 'uses' => 'App\Http\Controllers\RaceController@destroy']);
Route::post('/admin/races/update/{id?}', ['as' => 'updaterace', 'uses' => 'App\Http\Controllers\RaceController@update']);


Route::get('/admin/rounds/', ['as' => 'listrounds', 'uses' => 'App\Http\Controllers\RoundController@index']);
Route::get('/admin/rounds/add', ['as' => 'addround', 'uses' => 'App\Http\Controllers\RoundController@create']);
Route::post('/admin/rounds/store/', ['as' => 'saveround', 'uses' => 'App\Http\Controllers\RoundController@store']);
Route::get('/admin/rounds/edit/{id?}', ['as' => 'editround', 'uses' => 'App\Http\Controllers\RoundController@edit']);
Route::post('/admin/rounds/update/{id?}', ['as' => 'updateround', 'uses' => 'App\Http\Controllers\RoundController@update']);
Route::get('/admin/rounds/delete/{id?}', ['as' => 'deleteround', 'uses' => 'App\Http\Controllers\RoundController@destroy']);
Route::post('/admin/rounds/update/{id?}', ['as' => 'updateround', 'uses' => 'App\Http\Controllers\RoundController@update']);



Route::get('/admin/drivers/', ['as' => 'listdrivers', 'uses' => 'App\Http\Controllers\DriverController@index']);
Route::get('/admin/drivers/add', ['as' => 'adddriver', 'uses' => 'App\Http\Controllers\DriverController@create']);
Route::post('/admin/drivers/store/', ['as' => 'savedriver', 'uses' => 'App\Http\Controllers\DriverController@store']);
Route::get('/admin/drivers/edit/{id?}', ['as' => 'editdriver', 'uses' => 'App\Http\Controllers\DriverController@edit']);
Route::post('/admin/drivers/update/{id?}', ['as' => 'updatedriver', 'uses' => 'App\Http\Controllers\DriverController@update']);
Route::get('/admin/drivers/delete/{id?}', ['as' => 'deletedriver', 'uses' => 'App\Http\Controllers\DriverController@destroy']);
Route::post('/admin/drivers/update/{id?}', ['as' => 'updatedriver', 'uses' => 'App\Http\Controllers\DriverController@update']);


 
