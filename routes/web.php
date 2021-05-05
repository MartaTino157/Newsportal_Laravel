<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\CategoryConroller;
use app\Models\Category;
use app\Models\Task;

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
/*Открытие обычной страницы*/
// Route::get('/', function () {
//     return view('start');
// });
Route::get('/', 'TaskController@listLimit');

Route::group(['middleware' => ['auth']], function(){
//admin
	Route::middleware('admin')->group(function(){
//categorylist CRUD
		Route::get('/categorylist','CategoryController@index');
		Route::post('/addcategory','CategoryController@store');
		Route::get('/editcategory/{category}','CategoryController@edit');
		Route::post('/editcategory/{category}','CategoryController@update');
		Route::delete('/categorylist/{category}','CategoryController@destroy');
	});
//manager & admin
	Route::middleware('manager')->group(function(){
//task list CRUD
		Route::get('/newslist','TaskController@index');
		Route::get('/addtask','TaskController@create');
		Route::post('/addtask','TaskController@store');
		Route::get('/detail/{task}','TaskController@show');
		Route::get('/edittask/{task}','TaskController@edit');
		Route::post('/edittask/{task}','TaskController@update');
		Route::delete('/delete/{task}','TaskController@destroy');
	});
});//end Route::group

//--------------
Route::get('/detail/{task}','TaskController@detail')->name('task.detail');
//comments
Route::post('/comments','CommentsController@store')->name('comments.store');
//menu
Route::get('/news','CategoryController@listMenu');
Route::get('/categorynews/{category}','CategoryController@show');
//login
Route::get('/dashboard', function() {
	return view('dashboard');
});
Route::get('/register','Auth\AuthController@register')->name('register');
Route::post('/register','Auth\AuthController@storeUser');

Route::get('/login','Auth\AuthController@login')->name('login');
Route::post('/login','Auth\AuthController@authenticate');

Route::get('/logout','Auth\AuthController@logout')->name('logout');

Route::get('/dashboard','Auth\AuthController@dashboard')->name('dashboard');