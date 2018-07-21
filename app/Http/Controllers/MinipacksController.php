<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\minipacks;

class MinipacksController extends Controller
{

    public function input(Request $r)
    {
    	$ott=new ott();
        $ott->tanggal=$r->tanggal;
    	$ott->witel=$r->witel;
        $ott->catchplay=$r->catchplay;
        $ott->iflix=$r->iflix;
        $ott->hooq=$r->hooq;
        $ott->movin=$r->movin;
        $ott->jml_ott=$r->catchplay+$r->iflix+$r->hooq+$r->movin;
        $ott->salesDIY=$r->salesDIY;
        $ott->treshold=$r->treshold;
    	$ott->save();
    	return redirect('/coba');
    }

     public function form()
    {
    	$ott=ott::get();
    	return view('realisasi.form');
    }

    public function search()
    { 
        $ott=ott::all();
        return view('realisasi.best-ott',compact('ott'));
    }

    public function postsearch(Request $r)
    {
        $cari_tanggal = $r->cari_tanggal;
        //dd($cari_tanggal);
        if($cari_tanggal!="")
        {
            $ott = ott::where('tanggal', $cari_tanggal)->get();
            return view('realisasi.best-ott',compact('ott'));
        }
        else
        {
            abort(404);
        }
    }


    public function minipacks()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=ott::select('witel')->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();

        $blnn=Date("n");
        $list30=[4,6,9,11];
        $list31=[1,3,5,7,8,10,12];

        if(in_array($blnn, $list30))
        {
            $jmlhari=30;
        }
        elseif(in_array($blnn, $list31))
        {
            $jmlhari=31;
        }
        else
        {
            if($thn%4==0)
            {
                $jmlhari=29;
            }
            else
            {
                $jmlhari=28;
            }
        }

        return view('realisasi.catchplay',compact('bln','witel','jmlhari','thn'));
    }

    public function jmlottpersentase()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=ott::select('witel')->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();

        $blnn=Date("n");
        $list30=[4,6,9,11];
        $list31=[1,3,5,7,8,10,12];

        if(in_array($blnn, $list30))
        {
            $jmlhari=30;
        }
        elseif(in_array($blnn, $list31))
        {
            $jmlhari=31;
        }
        else
        {
            if($thn%4==0)
            {
                $jmlhari=29;
            }
            else
            {
                $jmlhari=28;
            }
        }

        return view('realisasi.jmlottpersentase',compact('bln','witel','jmlhari','thn'));
    }
}
