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

//IRSA
Route::get('/best-ott','OttController@index');
Route::get('/best-ott/catchplay','OttController@getcatchplay');
Route::post('/best-ott/searchcatchplay','OttController@postcatchplay');

Route::get('/best-ott/iflix','OttController@getiflix');
Route::post('/best-ott/searchiflix','OttController@postiflix');

Route::get('/best-ott/hooq','OttController@gethooq');
Route::post('/best-ott/searchhooq','OttController@posthooq');

Route::get('/best-ott/movin','OttController@getmovin');
Route::post('/best-ott/searchmovin','OttController@postmovin');

Route::get('/best-ott/salesDIY','OttController@getsales');
Route::get('/best-ott/iflix-coba','OttController@search_hal');
Route::post('/best-ott/searchsales','OttController@postsales');

//Route::post('/search','OttController@blnsearch');
Route::post('/best-ott/searchbestott','OttController@searchbestottx');

//harus auth
Route::post('best-ott/inputcatchplay','OttController@inputcatchplay');
Route::post('/best-ott/inputiflix','OttController@inputiflix');
Route::post('/best-ott/inputhooq','OttController@inputhooq');
Route::post('/best-ott/inputmovin','OttController@inputmovin');
Route::post('/best-ott/inputsales','OttController@inputsales');
//
Route::get('/form','OttController@form');
Route::post('/input','OttController@input');



	//Route::get('/admin/realisasi/best-ott/form','OttController@form');
	//Route::post('/input','OttController@input');

Route::get('/login', 'MainController@index');
Route::post('/login/checklogin', 'MainController@checklogin');
Route::get('admin/logout', 'MainController@logout');

//ADMIN
Route::group(['middleware' => 'authenticated'], function() {
	Route::get('/admin', 'MainController@successlogin');


});


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



//NENY
Route::get('/best-addon','AddonController@index');
Route::post('/searchbestaddon','AddonController@searchbestaddon');

Route::get('/best-addon/minipack/input','AddonController@getminipack_input');
Route::post('/searchinputminipack','AddonController@postminipack_input');

Route::get('/best-addon/minipack/realisasi','AddonController@getminipack_realisasi');
Route::post('/searchrealisasiminipack','AddonController@postminipack_realisasi');

Route::get('/best-addon/stb/input','AddonController@getminipack_input');
Route::post('/searchinputminipack','AddonController@postminipack_input');

//admin
Route::post('/input_minipack','AddonController@input_minipack');
Route::post('/realisasi_minipack','AddonController@realisasi_minipack');
