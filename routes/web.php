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
/*
Route::get('/', function () {
    return view('realisasi.best-ott');
});
*/
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/login', function () {
    return redirect('/#login');
});
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/coba/{id}','OttController@index');//di get url
Route::get('/coba','OttController@index');
Route::post('/input','OttController@input');
Route::get('/form','OttController@form');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
