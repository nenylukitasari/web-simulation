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
    	return view('simulasi.best-ott',compact('ott'));
    }

    public function input_catchplay(Request $r)
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
    	return redirect('/catchplay');
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

    /*public function postsearch(Request $r)
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
    }*/

    public function blnsearch(Request $r)
    {
        $cari_bulan = $r->cari_bulan;
        return $r;
        if ($cari_bulan!="")
        {
            $bln=Date("m");
            $thn=Date("Y");
            $cari_bulan=ott::select('tanggal')->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();

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
        else   
        {
            abort(404);
        }
    }

    public function postcatchplay(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=ott::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
       // return $witel;
        $list30=["04","06","09","11"];
        $list31=["01","03","05","07","08","10","12"];
        if(in_array($bln, $list30))
        {
            $jmlhari=30;
        }
        elseif(in_array($bln, $list31))
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

    public function getcatchplay()
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
