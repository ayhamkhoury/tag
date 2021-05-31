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

//Route::get('/races', ['as' => 'raceslist', 'uses' => RaceController::class,[]]);
Route::resource('/admin/races', RaceController::class,['only' => ['index']]);


 
