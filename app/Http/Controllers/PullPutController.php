<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pullput;
use DB;

class PullPutController extends Controller
{
    
    //public function index($id)
    public function index()
    {
        //return $id;
        $tgl_akhir=Date("Y-m-d");
        $bln=explode("-",$tgl_akhir)[1];
        $tgl=Date("Y-m-")."01";

        $pullput=pullput::select('witel',DB::raw('sum(salespush) as total_salespush,sum(salespull) as total_salespull,sum(salesput)as total_salesput'))->where('tanggal','like','____-'.$bln.'-%')->where('tanggal',$tgl_akhir)->groupBy('witel')->get();
        
        return view('best-pullput.index-pullput',compact('pullput','tgl','tgl_akhir'));
    }

    public function searchbestpullput(Request $r)
    {
        if($r->cari_tanggal>$r->cari_akhir)
        {
            $tgl_akhir=$r->cari_tanggal;
            $tgl=$r->cari_akhir;
        }
        else
        {
            $tgl=$r->cari_tanggal;
            $tgl_akhir=$r->cari_akhir;
        }
        
        $pullput=pullput::select('witel',DB::raw('sum(salespush) as total_salespush,sum(salespull) as total_salespull,sum(salesput)as total_salesput'))->where('tanggal','>=',$tgl)->where('tanggal','<=',$tgl_akhir)->groupBy('witel')->get();

       return view('best-pullput.index-pullput',compact('pullput','tgl','tgl_akhir'));
    }

    public function input_salespush(Request $r)
    {
        $cek=pullput::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->salespush=$r->salespush;
            $cek->save();
            return redirect('/best-pullput/salespush');
        }
        else
        {
            $pullput=new pullput();
            $pullput->tanggal=$r->tanggal;
            $pullput->witel=$r->witel;
            $pullput->salespush=$r->salespush;
            $pullput->salespull=0;
            $pullput->salesput=0;
            
        
            $pullput->save();
            return redirect('/best-pullput/salespush');
        }
    }

    public function postsalespush(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=pullput::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-pullput.salespush',compact('bln','witel','jmlhari','thn'));
    }

    public function getsalespush()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=pullput::select('witel', DB::raw('sum(salespush) as total_salespush'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-pullput.salespush',compact('bln','witel','jmlhari','thn'));
    }

    public function input_salespull(Request $r)
    {
        $cek=pullput::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->salespull=$r->salespull;
            $cek->save();
            return redirect('/best-pullput/salespull');
        }
        else
        {
            $pullput=new pullput();
            $pullput->tanggal=$r->tanggal;
            $pullput->witel=$r->witel;
            $pullput->salespull=$r->salespull;
            $pullput->salespush=0;
            $pullput->salesput=0;
            
            $pullput->save();
            return redirect('/best-pullput/salespull');
        }
    }

    public function postsalespull(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=pullput::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-pullput.salespull',compact('bln','witel','jmlhari','thn'));
    }

    public function getsalespull()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=pullput::select('witel', DB::raw('sum(salespull) as total_salespull'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-pullput.salespull',compact('bln','witel','jmlhari','thn'));
    }

    public function input_salesput(Request $r)
    {
        $cek=pullput::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->salesput=$r->salesput;
            $cek->save();
            return redirect('/best-pullput/salesput');
        }
        else
        {
            $pullput=new pullput();
            $pullput->tanggal=$r->tanggal;
            $pullput->witel=$r->witel;
            $pullput->salesput=$r->salesput;
            $pullput->salespush=0;
            $pullput->salespull=0;
            
        
            $pullput->save();
            return redirect('/best-pullput/salesput');
        }
    }

    public function postsalesput(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=pullput::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-pullput.salesput',compact('bln','witel','jmlhari','thn'));
    }

    public function getsalesput()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=pullput::select('witel', DB::raw('sum(salesput) as total_salesput'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-pullput.salesput',compact('bln','witel','jmlhari','thn'));
    }

}
