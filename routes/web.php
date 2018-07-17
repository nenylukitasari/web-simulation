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

Route::get('/login', 'MainController@index');
Route::post('/login/checklogin', 'MainController@checklogin');
Route::get('admin/logout', 'MainController@logout');

//Route::get('/coba/{id}','OttController@index');//di get url
//Route::get('/coba','OttController@index');
Route::post('/input','OttController@input');
Route::get('/admin/realisasi/best-ott','OttController@index');
Route::get('/form','OttController@form');
Route::get('/best-ott','OttController@index');

Route::post('/search','OttController@postsearch');

/*Route::post('/search',function()
{
	$cari_tanggal = Input::get('cari_tanggal');
	dd($cari_tanggal);
	//if($cari_tanggal!="")
	//{
	//	$ott = ott::where('tanggal', 'LIKE', '%'.$cari_tanggal.'%');
	//}
	 //return view('realisasi.best-ott',compact('ott'));
});*/



Route::group(['middleware' => 'authenticated'], function() {
	Route::get('/admin', 'MainController@successlogin');
	Route::get('/admin/realisasi/best-ott/form','OttController@form');
});

/*
//Simulasi
Route::get('/admin/simulasi/best-ott','OttController@index');
Route::get('/admin/simulasi/best-addon/minipack','MinipackController@index');
Route::get('/admin/simulasi/best-addon/STB-tambahan','STBController@index');
Route::get('/admin/simulasi/best-addon/telepon-mania','TeleponManiaController@index');
Route::get('/admin/simulasi/best-addon/upgrade-speed','UpgradeSpeedController@index');

//Realisasi 
Route::get('/admin/realisasi/best-ott','OttController@index_real');
Route::get('/admin/realisasi/best-addon/minipack','MinipackController@index_real');
Route::get('/admin/realisasi/best-addon/STB-tambahan','STBController@index_real');
Route::get('/admin/realisasi/best-addon/telepon-mania','TeleponManiaController@index_real');
Route::get('/admin/realisasi/best-addon/upgrade-speed','UpgradeSpeedController@index_real');
*/