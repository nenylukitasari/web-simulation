<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ott;
use DB;
class OttController extends Controller
{
    //
    //public function index($id)
    public function index()
    {
    	//return $id;
        $tgl_akhir=Date("Y-m-d");
        $bln=explode("-",$tgl_akhir)[1];
        $tgl=Date("Y-m-")."01";

    	$ott=ott::select('witel',DB::raw('sum(catchplay) as total_cp,sum(iflix) as total_iflix,sum(hooq)as total_hooq,sum(movin) as total_movin,sum(salesDIY) as total_diy'))->where('tanggal','like','____-'.$bln.'-%')->where('tanggal',$tgl_akhir)->groupBy('witel')->get();
    	return view('realisasi.best-ott',compact('ott','tgl','tgl_akhir'));
    }

    public function searchbestottx(Request $r)
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
        
        //$bln=explode("-",$tgl)[1];
        
        $ott=ott::select('witel',DB::raw('sum(catchplay) as total_cp,sum(iflix) as total_iflix,sum(hooq)as total_hooq,sum(movin) as total_movin,sum(salesDIY) as total_diy'))->where('tanggal','>=',$tgl)->where('tanggal','<=',$tgl_akhir)->groupBy('witel')->get();
        //$ott=ott::where('id',2)->get();
        // $ott=ott::find(2);
        // return $ott->created_at;
        //fr
        //return $ott;
        return view('realisasi.best-ott',compact('ott','tgl','tgl_akhir'));
    }

    public function search_hal(Request $r)
    {
        return value;
        /*if (value==1)
        {
            return redirect('/iflix');
        }*/
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
    public function getcatchplay()
        {
            $bln=Date("m");
            $thn=Date("Y");
            $witel=ott::select('witel',DB::raw('sum(catchplay) as total_cp'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

     public function inputcatchplay(Request $r)
        {
            $cek=ott::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
            if($cek!=null)
            {
                $cek->catchplay=$r->catchplay;//
                $cek->save();
                return redirect('best-ott/catchplay');
            }
            else
            {
                $ott=new ott();
                $ott->tanggal=$r->tanggal;
                $ott->witel=$r->witel;
                $ott->catchplay=$r->catchplay;//
                $ott->iflix=$r->hooq=$r->movin=$r->salesDIY=0;//
                $ott->jml_ott=$r->catchplay;//
                $ott->salesDIY=$r->salesDIY;
                $ott->treshold=70;
                $ott->save();
                return redirect('best-ott/catchplay');
            }
        }

    public function postcatchplay(Request $r)
    {
        $bln=$r->bln;
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

    public function getiflix()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=ott::select('witel',DB::raw('sum(iflix) as total_iflix'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('realisasi.iflix',compact('bln','witel','jmlhari','thn'));
    }

    public function inputiflix(Request $r)
    {
        $cek=ott::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->iflix=$r->iflix;//
            $cek->save();
            return redirect('best-ott/iflix');
        }
        else
        {
            $ott=new ott();
            $ott->tanggal=$r->tanggal;
            $ott->witel=$r->witel;
            $ott->iflix=$r->iflix;//
            $ott->catchplay=$r->hooq=$r->movin=$r->salesDIY=0;//
            $ott->jml_ott=$r->iflix+$r->catchplay+$r->hooq+$r->movin;//
            $ott->salesDIY=$r->salesDIY;
            $ott->treshold=70;
            $ott->save();
            return redirect('best-ott/iflix');
        }
    }

    public function postiflix(Request $r)
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

            return view('realisasi.iflix',compact('bln','witel','jmlhari','thn'));
        }

public function gethooq()
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

            return view('realisasi.hooq',compact('bln','witel','jmlhari','thn'));
        }

     public function inputhooq(Request $r)
        {
            $cek=ott::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
            if($cek!=null)
            {
                $cek->hooq=$r->hooq;//
                $cek->save();
                return redirect('best-ott/hooq');
            }
            else
            {
                $ott=new ott();
                $ott->tanggal=$r->tanggal;
                $ott->witel=$r->witel;
                $ott->hooq=$r->hooq;//
                $ott->iflix=$r->movin=$r->movin=$r->salesDIY=0;//
               // $ott->jml_ott=$r->iflix+$r->catchplay+$r->hooq+$r->movin;//
                $ott->salesDIY=$r->salesDIY;
                $ott->treshold=70;
                $ott->save();
                return redirect('best-ott/hooq');
            }
        }

    public function posthooq(Request $r)
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

        return view('realisasi.hooq',compact('bln','witel','jmlhari','thn'));
    }

    public function getsales()
        {
            $bln=Date("m");
            $thn=Date("Y");
            $witel=ott::select('witel',DB::raw('sum(salesDIY) as total_diy'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

            return view('realisasi.salesDIY',compact('bln','witel','jmlhari','thn'));
        }

     public function inputsales(Request $r)
        {
            $cek=ott::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
            if($cek!=null)
            {
                $cek->salesDIY=$r->salesDIY;//
                $cek->save();
                return redirect('best-ott/salesDIY');
            }
            else
            {
                $ott=new ott();
                $ott->tanggal=$r->tanggal;
                $ott->witel=$r->witel;
                $ott->salesDIY=$r->salesDIY;//
                $ott->iflix=$r->hooq=$r->movin=$r->catchplay=0;//
               // $ott->jml_ott=$r->catchplay;//
                //$ott->salesDIY=$r->salesDIY;
                $ott->treshold=70;
                $ott->save();
                return redirect('best-ott/salesDIY');
            }
        }

    public function postsales(Request $r)
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

        return view('realisasi.salesDIY',compact('bln','witel','jmlhari','thn'));
    }

    public function getmovin()
        {
            $bln=Date("m");
            $thn=Date("Y");
            $witel=ott::select('witel',DB::raw('sum(movin) as total_movin'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

            return view('realisasi.movin',compact('bln','witel','jmlhari','thn'));
        }

     public function inputmovin(Request $r)
        {
            $cek=ott::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
            if($cek!=null)
            {
                $cek->movin=$r->movin;//
                $cek->save();
                return redirect('best-ott/movin');
            }
            else
            {
                $ott=new ott();
                $ott->tanggal=$r->tanggal;
                $ott->witel=$r->witel;
                $ott->movin=$r->movin;//
                $ott->iflix=$r->hooq=$r->catchplay=$r->salesDIY=0;//
                //$ott->jml_ott=$r->catchplay;//
               // $ott->salesDIY=$r->salesDIY;
                $ott->treshold=70;
                $ott->save();
                return redirect('best-ott/movin');
            }
        }

    public function postmovin(Request $r)
    {
        $bln=$r->bln;
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

        return view('realisasi.movin',compact('bln','witel','jmlhari','thn'));
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
