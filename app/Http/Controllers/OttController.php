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
        $ott->tanggal=$r->tanggal;
    	$ott->witel=$r->witel;
        $ott->catchplay=$r->catchplay;
        $ott->iflix=$r->iflix;
        $ott->hooq=$r->hooq;
        $ott->movin=$r->movin;
       // $ott->jml_ott=$r->SUM($r->catchplay+$r->iflix+$r->hooq+$r->movin);
        $ott->salesDIY=$r->salesDIY;
        $ott->treshold=$r->treshold;
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
