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
	  if(Auth::check())
            return redirect('/admin');
  return view('welcome');
}); 
//IRSA
Route::get('/catchplay','OttController@getcatchplay');
Route::get('/iflix','OttController@getiflix');
Route::post('/searchcatchplay','OttController@postcatchplay');
//Route::post('/search','OttController@blnsearch');
Route::get('/form','OttController@form');
//Route::post('/input-catchplay','OttController@input_catchplay');
Route::post('/input','OttController@input');
Route::get('/best-ott','OttController@index');

	//Route::get('/admin/realisasi/best-ott/form','OttController@form');
	//Route::post('/input','OttController@input');

Route::get('/login', 'MainController@index');
Route::post('/login/checklogin', 'MainController@checklogin');
Route::get('admin/logout', 'MainController@logout');

//ADMIN
Route::group(['middleware' => 'authenticated'], function() {
	Route::get('/admin', 'MainController@successlogin');

/*	//best-ott
	Route::get('/admin/realisasi/best-ott/catchplay','OttController@getcatchplay_real');
	Route::get('/admin/realisasi/best-ott/iflix','Controller@');
	Route::get('/admin/realisasi/best-ott/hooq','Controller@');
	Route::get('/admin/realisasi/best-ott/movin','Controller@');

	//best-addon 
	Route::get('/admin/realisasi/best-addon/minipack','MinipackController@index_real');
	Route::get('/admin/realisasi/best-addon/STBtambahan', 'STBController@index_real');
	Route::get('/admin/realisasi/best-addon/teleponmania', 'TeleponManiaController@index_real');
	Route::get('/admin/realisasi/best-addon/upgradespeed', 'UpgradeSpeedController@index_real');

	Route::get('/admin/achievement/best-addon/minipack','MinipackController@achievement');
	Route::get('/admin/achievement/best-addon/STBtambahan', 'STBController@achievement');
	Route::get('/admin/achievement/best-addon/teleponmania', 'TeleponManiaController@achievement');
	Route::get('/admin/achievement/best-addon/upgradespeed', 'UpgradeSpeedController@achievement');

	Route::get('/admin/simulasi/best-addon/minipack','MinipackController@index');
	Route::get('/admin/simulasi/best-addon/STBtambahan', 'STBController@index');
	Route::get('/admin/simulasi/best-addon/teleponmania', 'TeleponManiaController@index');
	Route::get('/admin/simulasi/best-addon/upgradespeed', 'UpgradeSpeedController@index');
	
*/
});
/*
//USER - realisasi
Route::get('/realisasi/best-ott/catchplay','OttController@getcatchplay');
Route::get('/realisasi/best-ott/iflix','IflixController@index');
Route::get('/realisasi/best-ott/hooq','HooqController@index');
Route::get('/realisasi/best-ott/movin','MovinController@index');

Route::get('/realisasi/best-addon/minipack','MinipackController@index_real');
Route::get('/realisasi/best-addon/STBtambahan', 'STBController@index_real');
Route::get('/realisasi/best-addon/teleponmania', 'TeleponManiaController@index_real');
Route::get('/realisasi/best-addon/upgradespeed', 'UpgradeSpeedController@index_real');
*/

//USER - simulasi
Route::get('/index','AddonController@index');
Route::post('/searchminipack','AddonController@postminipack');
Route::post('/input_minipack','AddonController@input_minipack');
Route::get('/minipack','AddonController@getminipack');


Route::get('/simulasi/best-ott/catchplay','OttController@getcatchplay');
Route::get('/simulasi/best-ott/iflix','IflixController@index');
Route::get('/simulasi/best-ott/hooq','HooqController@index');
Route::get('/simulasi/best-ott/movin','MovinController@index');

Route::get('/simulasi/best-addon/minipack','AddonController@getcatchplay');
Route::get('/formneny','AddonController@form');

Route::get('/simulasi/best-addon/STBtambahan', 'STBController@index');
Route::get('/simulasi/best-addon/teleponmania', 'TeleponManiaController@index');
Route::get('/simulasi/best-addon/upgradespeed', 'UpgradeSpeedController@index');
