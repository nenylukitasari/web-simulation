<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ott;
class OttController extends Controller
{
    //
    //public function index($id)
    public function index()
    {
    	//return $id;
    	$ott=ott::get();
    	//$ott=ott::where('id',2)->get();
    	// $ott=ott::find(2);
    	// return $ott->created_at;
    	//fr
        //return $ott;
    	return view('realisasi.best-ott',compact('ott'));
    }

    public function input(Request $r)
    {
    	$ott=new ott();
    	$ott->catchplay=$r->blabla;
    	$ott->save();
    	return redirect('/coba');
    }

     public function form()
    {
    	//return $id;
    	$ott=ott::get();
    	//$ott=ott::where('id',2)->get();
    	// $ott=ott::find(2);
    	// return $ott->created_at;
    	// return $ott;
    	return view('realisasi.form');
    }
}
