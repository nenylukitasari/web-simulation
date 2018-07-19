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

	Route::get('/admin/realisasi/best-ott/form','OttController@form');
	Route::post('/admin/best-ott/input','OttController@input');

Route::get('/login', 'MainController@index');
Route::post('/login/checklogin', 'MainController@checklogin');
Route::get('admin/logout', 'MainController@logout');

//ADMIN
Route::group(['middleware' => 'authenticated'], function() {
	Route::get('/admin', 'MainController@successlogin');

	//best-ott
	Route::get('/admin/realisasi/best-ott/catchplay','CatchController@index_real');
	Route::get('/admin/realisasi/best-ott/iflix','IflixController@index_real');
	Route::get('/admin/realisasi/best-ott/hooq','HooqController@index_real');
	Route::get('/admin/realisasi/best-ott/movin','MovinController@index_real');

	Route::get('/admin/simulasi/best-ott/catchplay','CatchController@index');
	Route::get('/admin/simulasi/best-ott/iflix','IflixController@index');
	Route::get('/admin/simulasi/best-ott/hooq','HooqController@index');
	Route::get('/admin/simulasi/best-ott/movin','MovinController@index');

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
	

});

//USER - realisasi
Route::get('/realisasi/best-addon/minipack','MinipackController@index_real');
Route::get('/realisasi/best-addon/STBtambahan', 'STBController@index_real');
Route::get('/realisasi/best-addon/teleponmania', 'TeleponManiaController@index_real');
Route::get('/realisasi/best-addon/upgradespeed', 'UpgradeSpeedController@index_real');

Route::get('/realisasi/best-addon/minipack','MinipackController@index_real');
Route::get('/realisasi/best-addon/STBtambahan', 'STBController@index_real');
Route::get('/realisasi/best-addon/teleponmania', 'TeleponManiaController@index_real');
Route::get('/realisasi/best-addon/upgradespeed', 'UpgradeSpeedController@index_real');

//USER - simulasi
Route::get('/simulasi/best-ott/catchplay','CatchController@index');
Route::get('/simulasi/best-ott/iflix','IflixController@index');
Route::get('/simulasi/best-ott/hooq','HooqController@index');
Route::get('/simulasi/best-ott/movin','MovinController@index');

Route::get('/simulasi/best-addon/minipack','MinipackController@index');
Route::get('/simulasi/best-addon/STBtambahan', 'STBController@index');
Route::get('/simulasi/best-addon/teleponmania', 'TeleponManiaController@index');
Route::get('/simulasi/best-addon/upgradespeed', 'UpgradeSpeedController@index');

//USER - achievement
Route::get('/achievement/best-addon/minipack','MinipackController@achievement');
Route::get('/achievement/best-addon/STBtambahan', 'STBController@achievement');
Route::get('/achievement/best-addon/teleponmania', 'TeleponManiaController@achievement');
Route::get('/achievement/best-addon/upgradespeed', 'UpgradeSpeedController@achievement');


/*Route::get('/best-ott', function () {
	if(Auth::check())
  		return redirect ('/admin/best-ott');
  	//return redirect ('/best-ott');
    return redirect()->action('OttController@index_real');
});*/
//Route::get('/admin/best-ott','OttController@index');

//Route::get('/best-ott','OttController@index');
Route::post('/best-ott/search','OttController@postsearch_real');

Route::get('/best-addon/minipack','MinipackController@index_real');
Route::post('/best-addon/minipack/search','MinipackController@postsearch_real');

Route::get('/best-addon/STB-tambahan','STBController@index_real');
Route::post('/best-addon/STB-tambahan/search','STBController@postsearch_real');

Route::get('/best-addon/telepon-mania','TeleponManiaController@index_real');
Route::post('/admin/best-addon/telepon-mania/search','TeleponManiaController@postsearch_real');

Route::get('/best-addon/upgrade-speed','UpgradeSpeedController@index_real');
Route::post('/best-addon/upgrade-speed/search','UpgradeSpeedController@postsearch_real');
	
//simulasi
//Route::get('/best-ott','OttController@index');
Route::post('/best-ott/search','OttController@postsearch');

Route::get('/best-addon/minipack','MinipackController@index');
Route::post('/best-addon/minipack/search','MinipackController@postsearch');

Route::get('/best-addon/STB-tambahan','STBController@index');
Route::post('/best-addon/STB-tambahan/search','STBController@postsearch');

Route::get('/best-addon/telepon-mania','TeleponManiaController@index');
Route::post('/best-addon/telepon-mania/search','TeleponManiaController@postsearch');

Route::get('/best-addon/upgrade-speed','UpgradeSpeedController@index');
Route::post('/best-addon/upgrade-speed/search','UpgradeSpeedController@postsearch');




//Route::get('/coba/{id}','OttController@index');//di get url
//Route::get('/coba','OttController@index');

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