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
Route::get('/', function () {
    return view('realisasi.best-ott');
});
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'MainController@index');
Route::post('/login/checklogin', 'MainController@checklogin');
Route::get('admin', 'MainController@successlogin');
Route::get('admin/logout', 'MainController@logout');

//Route::get('/coba/{id}','OttController@index');//di get url
Route::get('/coba','OttController@index');
Route::post('/input','OttController@input');
Route::get('/form','OttController@form');

