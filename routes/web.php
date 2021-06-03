<?php

use App\Http\Controllers\RaceController;
use Illuminate\Support\Facades\Hash;
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

// Route::get('/test', function () {
//    exit(Hash::make('password'))
// ;   // return view('dashboard');
// });

Route::get('login', ['as' => 'login', 'uses' => 'App\Http\Controllers\LoginController@index']);
Route::post('/signin', ['as' => 'signin', 'uses' => 'App\Http\Controllers\LoginController@signin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'App\Http\Controllers\LoginController@logout']);
Route::post('/register', ['as' => 'register', 'uses' => 'App\Http\Controllers\LoginController@store']);

Route::get('/', ['as' => 'web', 'uses' => 'App\Http\Controllers\MainController@index']);

 
Route::group(
   [
      'prefix' => '',
      'middleware' => 'auth'
   ],
   function(){
      Route::get('/home', ['as' => 'home', 'uses' => 'App\Http\Controllers\MainController@home']);
      Route::get('/votenow/{driver?}/{round?}',['as' => 'uservote','uses' => 'App\Http\Controllers\VoteController@UserVote']);
      Route::get('/voted',['as' => 'voted','uses' => 'App\Http\Controllers\MainController@getvotes']);

   }
);
    
 Route::group(
   [
      'prefix' => 'admin',
      'middleware' => 'auth:admin'
   ]
   ,
   function () {
 
Route::get('races/', ['as' => 'listraces', 'uses' => 'App\Http\Controllers\RaceController@index']);
Route::get('races/add', ['as' => 'addrace', 'uses' => 'App\Http\Controllers\RaceController@create']);
Route::post('races/store/', ['as' => 'saverace', 'uses' => 'App\Http\Controllers\RaceController@store']);
Route::get('races/edit/{id?}', ['as' => 'editrace', 'uses' => 'App\Http\Controllers\RaceController@edit']);
Route::post('races/update/{id?}', ['as' => 'updaterace', 'uses' => 'App\Http\Controllers\RaceController@update']);
Route::get('races/delete/{id?}', ['as' => 'deleterace', 'uses' => 'App\Http\Controllers\RaceController@destroy']);
Route::post('races/update/{id?}', ['as' => 'updaterace', 'uses' => 'App\Http\Controllers\RaceController@update']);


Route::get('rounds/', ['as' => 'listrounds', 'uses' => 'App\Http\Controllers\RoundController@index']);
Route::get('rounds/add', ['as' => 'addround', 'uses' => 'App\Http\Controllers\RoundController@create']);
Route::post('rounds/store/', ['as' => 'saveround', 'uses' => 'App\Http\Controllers\RoundController@store']);
Route::get('rounds/edit/{id?}', ['as' => 'editround', 'uses' => 'App\Http\Controllers\RoundController@edit']);
Route::post('rounds/update/{id?}', ['as' => 'updateround', 'uses' => 'App\Http\Controllers\RoundController@update']);
Route::get('rounds/delete/{id?}', ['as' => 'deleteround', 'uses' => 'App\Http\Controllers\RoundController@destroy']);
 


Route::get('drivers/', ['as' => 'listdrivers', 'uses' => 'App\Http\Controllers\DriverController@index']);
Route::get('drivers/add', ['as' => 'adddriver', 'uses' => 'App\Http\Controllers\DriverController@create']);
Route::post('drivers/store/', ['as' => 'savedriver', 'uses' => 'App\Http\Controllers\DriverController@store']);
Route::get('drivers/edit/{id?}', ['as' => 'editdriver', 'uses' => 'App\Http\Controllers\DriverController@edit']);
Route::post('drivers/update/{id?}', ['as' => 'updatedriver', 'uses' => 'App\Http\Controllers\DriverController@update']);
Route::get('drivers/delete/{id?}', ['as' => 'deletedriver', 'uses' => 'App\Http\Controllers\DriverController@destroy']);
 

Route::get('voting/', ['as' => 'listvotes', 'uses' => 'App\Http\Controllers\VoteController@index']);
Route::get('voting/add', ['as' => 'addvote', 'uses' => 'App\Http\Controllers\VoteController@create']);
Route::post('voting/store/', ['as' => 'savevote', 'uses' => 'App\Http\Controllers\VoteController@store']);
Route::get('voting/edit/{id?}', ['as' => 'editvote', 'uses' => 'App\Http\Controllers\VoteController@edit']);
Route::post('voting/update/{id?}', ['as' => 'updatevote', 'uses' => 'App\Http\Controllers\VoteController@update']);
Route::get('voting/delete/{id?}', ['as' => 'deletevote', 'uses' => 'App\Http\Controllers\VoteController@destroy']);
    
});
 
 
