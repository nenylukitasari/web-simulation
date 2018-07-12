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
    return view('realisasi.best-ott');
});

//Route::get('/coba/{id}','OttController@index');//di get url
Route::get('/coba','OttController@index');
Route::post('/input','OttController@input');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
