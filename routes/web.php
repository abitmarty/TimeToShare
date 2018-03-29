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

Route::get('/home', 'HomeController@homeTry')->name('home');
Route::post('/voegProductToe', 'HomeController@voegProd');
Route::post('/uitlenen', 'HomeController@leenUit');
Route::get('/uitgeleend', 'uitleenController@makeView');
Route::get('/geleend', 'geleendController@makeView');
Route::post('/acceptOfWeiger', 'geleendController@accOfWei');
Route::post('/ikhebm', 'uitleenController@productVanMij');
Route::get('/profiel', 'profielController@maakProfiel');
