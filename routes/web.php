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
    return view('/user/home');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/user','UserController@home');
Route::get('/about','UserController@about');
Route::post('/items/create','ItemsController@create');
//Route::get('/list','ItemsController@list');
//Route::get('/showlist','ItemsController@showlist');
Route::resource('/items','ItemsController');   //Ni dah include semua benda yg diperlukan untuk Route pada ItemsController


