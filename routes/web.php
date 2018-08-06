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
//best-ott
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
Route::post('/searchbestott','OttController@searchbestottx');

//Route::get('/form','OttController@form');
//Route::post('/input','OttController@input');

Route::get('/login', 'MainController@index');
Route::post('/login/checklogin', 'MainController@checklogin');
Route::get('admin/logout', 'MainController@logout');

//broadband
Route::get('/best-broadband','BroadbandController@index');
Route::post('/searchbroadband','BroadbandController@searchbroadband');

Route::get('/best-broadband/duapuluh','BroadbandController@getduapuluh');
//Route::post('/best-broadband/searchduapuluh','BroadbandController@searchduapuluh');
Route::post('/best-broadband/searchduapuluh','BroadbandController@postduapuluh');

Route::get('/best-broadband/tigapuluh','BroadbandController@gettigapuluh');
Route::post('/best-broadband/searchtigapuluh','BroadbandController@posttigapuluh');

Route::get('/best-broadband/empatpuluh','BroadbandController@getempatpuluh');
Route::post('/best-broadband/searchempatpuluh','BroadbandController@postempatpuluh');

Route::get('/best-broadband/limapuluh','BroadbandController@getlimapuluh');
Route::post('/best-broadband/searchlimapuluh','BroadbandController@postlimapuluh');

Route::get('/best-broadband/seratus','BroadbandController@getseratus');
Route::post('/best-broadband/searchseratus','BroadbandController@postseratus');

Route::get('/best-broadband/ps','BroadbandController@gettotalps');
Route::post('/best-broadband/searchps','BroadbandController@posttotalps');

//ADMIN
Route::group(['middleware' => 'authenticated'], function() {
	Route::get('/admin', 'MainController@successlogin');

	Route::post('/input_minipack','AddonController@input_minipack');
	Route::post('/realisasi_minipack','AddonController@realisasi_minipack');
	Route::post('/target_minipack','AddonController@target_minipack');

	Route::post('/input_stb','AddonController@input_stb');
	Route::post('/realisasi_stb','AddonController@realisasi_stb');
	Route::post('/target_stb','AddonController@target_stb');

	Route::post('/input_telepon','AddonController@input_telepon');
	Route::post('/realisasi_telepon','AddonController@realisasi_telepon');
	Route::post('/target_telepon','AddonController@target_telepon');

	Route::post('/input_upspeed','AddonController@input_upspeed');
	Route::post('/realisasi_upspeed','AddonController@realisasi_upspeed');
	Route::post('/target_upspeed','AddonController@target_upspeed');

	Route::post('best-ott/inputcatchplay','OttController@inputcatchplay');
	Route::post('/best-ott/inputiflix','OttController@inputiflix');
	Route::post('/best-ott/inputhooq','OttController@inputhooq');
	Route::post('/best-ott/inputmovin','OttController@inputmovin');
	Route::post('/best-ott/inputsales','OttController@inputsales');

	Route::post('/best-broadband/inputduapuluh','BroadbandController@inputduapuluh');
	Route::post('/best-broadband/inputtigapuluh','BroadbandController@inputtigapuluh');
	Route::post('/best-broadband/inputempatpuluh','BroadbandController@inputempatpuluh');
	Route::post('/best-broadband/inputlimapuluh','BroadbandController@inputlimapuluh');
	Route::post('/best-broadband/inputseratus','BroadbandController@inputseratus');
	Route::post('/best-broadband/inputps','BroadbandController@inputtotalps');

	Route::post('/salespush','PullPutController@input_salespush');
	Route::post('/salespull','PullPutController@input_salespull');
	Route::post('/salesput','PullPutController@input_salesput');

});

//best-addon
Route::get('/best-addon','AddonController@index');
Route::post('/searchbestaddon','AddonController@searchbestaddon');

Route::get('/best-addon/minipack/input','AddonController@getminipack_input');
Route::post('/searchinputminipack','AddonController@postminipack_input');
Route::get('/best-addon/stb/input','AddonController@getstb_input');
Route::post('/searchinputstb','AddonController@poststb_input');
Route::get('/best-addon/telepon/input','AddonController@gettelepon_input');
Route::post('/searchinputtelepon','AddonController@posttelepon_input');
Route::get('/best-addon/upspeed/input','AddonController@getupspeed_input');
Route::post('/searchinputupspeed','AddonController@postupspeed_input');

Route::get('/best-addon/minipack/realisasi','AddonController@getminipack_realisasi');
Route::post('/searchrealisasiminipack','AddonController@postminipack_realisasi');
Route::get('/best-addon/stb/realisasi','AddonController@getstb_realisasi');
Route::post('/searchrealisasistb','AddonController@poststb_realisasi');
Route::get('/best-addon/telepon/realisasi','AddonController@gettelepon_realisasi');
Route::post('/searchrealisasitelepon','AddonController@posttelepon_realisasi');
Route::get('/best-addon/upspeed/realisasi','AddonController@getupspeed_realisasi');
Route::post('/searchrealisasiupspeed','AddonController@postupspeed_realisasi');

Route::get('/best-addon/minipack/target','AddonController@getminipack_target');
Route::post('/searchtargetminipack','AddonController@postminipack_target');
Route::get('/best-addon/stb/target','AddonController@getstb_target');
Route::post('/searchtargetstb','AddonController@poststb_target');
Route::get('/best-addon/telepon/target','AddonController@gettelepon_target');
Route::post('/searchtargettelepon','AddonController@posttelepon_target');
Route::get('/best-addon/upspeed/target','AddonController@getupspeed_target');
Route::post('/searchtargetupspeed','AddonController@postupspeed_target');

//best-pullput
Route::get('/best-pullput','PullPutController@index');
Route::post('/searchbestpullput','PullPutController@searchbestpullput');

Route::get('/best-pullput/salespush','PullPutController@getsalespush');
Route::post('/searchsalespush','PullPutController@postsalespush');

Route::post('/searchsalespull','PullPutController@postsalespull');
Route::get('/best-pullput/salespull','PullPutController@getsalespull');

Route::post('/searchsalesput','PullPutController@postsalesput');
Route::get('/best-pullput/salesput','PullPutController@getsalesput');

