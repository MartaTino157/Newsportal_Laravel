<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\CategoryConroller;
use app\Models\Category; ////////////////////////////////??????????????

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
    return view('start');
});

//categorylist CRUD
Route::get('/categorylist','CategoryController@index');
Route::post('/addcategory','CategoryController@store');
Route::get('/editcategory/{category}','CategoryController@edit');
Route::post('/editcategory/{category}','CategoryController@update');
Route::delete('/categorylist/{category}','CategoryController@destroy');