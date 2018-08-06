<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\broadband;
use DB;
class BroadbandController extends Controller
{

	 public function index()
    {
    	//return $id;
        $tgl_akhir=Date("Y-m-d");
        $bln=explode("-",$tgl_akhir)[1];
        $tgl=Date("Y-m-")."01";

    	$broadband=broadband::select('witel',DB::raw('sum(duapuluh) as total_duapuluh,sum(tigapuluh) as total_tigapuluh,sum(empatpuluh)as total_empatpuluh,sum(limapuluh) as total_limapuluh,sum(seratus) as total_seratus,sum(totalps) as totalps'))->where('tanggal','like','____-'.$bln.'-%')->where('tanggal',$tgl_akhir)->groupBy('witel')->get();
    	return view('broadband.broadband',compact('broadband','tgl','tgl_akhir'));
    }

    public function searchbroadband(Request $r)
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
        
        $broadband=broadband::select('witel',DB::raw('sum(duapuluh) as total_duapuluh,sum(tigapuluh) as total_tigapuluh,sum(empatpuluh)as total_empatpuluh,sum(limapuluh) as total_limapuluh,sum(seratus) as total_seratus,sum(totalps) as totalps'))->where('tanggal','>=',$tgl)->where('tanggal','<=',$tgl_akhir)->groupBy('witel')->get();
        //$ott=ott::where('id',2)->get();
        // $ott=ott::find(2);
        // return $ott->created_at;
        //fr
        //return $ott;
        return view('broadband.broadband',compact('broadband','tgl','tgl_akhir'));
    }

	public function getduapuluh()
        {
            $bln=Date("m");
            $thn=Date("Y");
            $witel=broadband::select('witel',DB::raw('sum(duapuluh) as total_duapuluh'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

            return view('broadband.duapuluh',compact('bln','witel','jmlhari','thn'));
        }

     public function inputduapuluh(Request $r)
        {
            $cek=broadband::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
            if($cek!=null)
            {
                $cek->duapuluh=$r->duapuluh;//
                $cek->save();
                return redirect('best-broadband/duapuluh');
            }
            else
            {
                $broadband=new broadband();
                $broadband->tanggal=$r->tanggal;
                $broadband->witel=$r->witel;
                $broadband->duapuluh=$r->duapuluh;//
                $broadband->tigapuluh=0;//
                $broadband->empatpuluh=0;
                $broadband->limapuluh=0;
                $broadband->seratus=0;
                $broadband->totalps=0;
                $broadband->save();
                return redirect('best-broadband/duapuluh');
            }
        }

    public function postduapuluh(Request $r)
    {
        $bln=$r->bln;
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=broadband::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('broadband.duapuluh',compact('bln','witel','jmlhari','thn'));
    }

    public function gettigapuluh()
        {
            $bln=Date("m");
            $thn=Date("Y");
            $witel=broadband::select('witel',DB::raw('sum(tigapuluh) as total_tigapuluh'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

            return view('broadband.tigapuluh',compact('bln','witel','jmlhari','thn'));
        }

         public function inputtigapuluh(Request $r)
        {
            $cek=broadband::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
            if($cek!=null)
            {
                $cek->tigapuluh=$r->tigapuluh;//
                $cek->save();
                return redirect('best-broadband/tigapuluh');
            }
            else
            {
                $broadband=new broadband();
                $broadband->tanggal=$r->tanggal;
                $broadband->witel=$r->witel;
                $broadband->tigapuluh=$r->tigapuluh;//
                $broadband->duapuluh=0;//
                $broadband->empatpuluh=0;
                $broadband->limapuluh=0;
                $broadband->seratus=0;
                $broadband->totalps=0;
                $broadband->save();
                return redirect('best-broadband/tigapuluh');
            }
        }

    public function posttigapuluh(Request $r)
    {
        $bln=$r->bln;
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=broadband::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('broadband.tigapuluh',compact('bln','witel','jmlhari','thn'));
    }

    public function getempatpuluh()
        {
            $bln=Date("m");
            $thn=Date("Y");
            $witel=broadband::select('witel',DB::raw('sum(empatpuluh) as total_empatpuluh'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

            return view('broadband.empatpuluh',compact('bln','witel','jmlhari','thn'));
        }

         public function inputempatpuluh(Request $r)
        {
            $cek=broadband::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
            if($cek!=null)
            {
                $cek->empatpuluh=$r->empatpuluh;//
                $cek->save();
                return redirect('best-broadband/empatpuluh');
            }
            else
            {
                $broadband=new broadband();
                $broadband->tanggal=$r->tanggal;
                $broadband->witel=$r->witel;
                $broadband->empatpuluh=$r->empatpuluh;//
                $broadband->duapuluh=0;//
                $broadband->tigapuluh=0;
                $broadband->limapuluh=0;
                $broadband->seratus=0;
                $broadband->totalps=0;
                $broadband->save();
                return redirect('best-broadband/empatpuluh');
            }
        }

    public function postempatpuluh(Request $r)
    {
        $bln=$r->bln;
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=broadband::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('broadband.empatpuluh',compact('bln','witel','jmlhari','thn'));
    }
    public function getlimapuluh()
        {
            $bln=Date("m");
            $thn=Date("Y");
            $witel=broadband::select('witel',DB::raw('sum(limapuluh) as total_limapuluh'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

            return view('broadband.limapuluh',compact('bln','witel','jmlhari','thn'));
        }

         public function inputlimapuluh(Request $r)
        {
            $cek=broadband::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
            if($cek!=null)
            {
                $cek->limapuluh=$r->limapuluh;//
                $cek->save();
                return redirect('best-broadband/limapuluh');
            }
            else
            {
                $broadband=new broadband();
                $broadband->tanggal=$r->tanggal;
                $broadband->witel=$r->witel;
                $broadband->limapuluh=$r->limapuluh;//
                $broadband->duapuluh=0;//
                $broadband->tigapuluh=0;
                $broadband->empatpuluh=0;
                $broadband->seratus=0;
                $broadband->totalps=0;
                $broadband->save();
                return redirect('best-broadband/limapuluh');
            }
        }

    public function postlimapuluh(Request $r)
    {
        $bln=$r->bln;
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=broadband::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('broadband.limapuluh',compact('bln','witel','jmlhari','thn'));
    }

    public function getseratus()
        {
            $bln=Date("m");
            $thn=Date("Y");
            $witel=broadband::select('witel',DB::raw('sum(seratus) as total_seratus'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

            return view('broadband.seratus',compact('bln','witel','jmlhari','thn'));
        }

         public function inputseratus(Request $r)
        {
            $cek=broadband::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
            if($cek!=null)
            {
                $cek->seratus=$r->seratus;//
                $cek->save();
                return redirect('best-broadband/seratus');
            }
            else
            {
                $broadband=new broadband();
                $broadband->tanggal=$r->tanggal;
                $broadband->witel=$r->witel;
                $broadband->seratus=$r->seratus;//
                $broadband->duapuluh=0;//
                $broadband->tigapuluh=0;
                $broadband->empatpuluh=0;
                $broadband->limapuluh=0;
                $broadband->totalps=0;
                $broadband->save();
                return redirect('best-broadband/seratus');
            }
        }

    public function postseratus(Request $r)
    {
        $bln=$r->bln;
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=broadband::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('broadband.seratus',compact('bln','witel','jmlhari','thn'));
    }

    public function gettotalps()
        {
            $bln=Date("m");
            $thn=Date("Y");
            $witel=broadband::select('witel',DB::raw('sum(totalps) as total_ps'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

            return view('broadband.ps',compact('bln','witel','jmlhari','thn'));
        }

         public function inputtotalps(Request $r)
        {
            $cek=broadband::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
            if($cek!=null)
            {
                $cek->totalps=$r->totalps;//
                $cek->save();
                return redirect('best-broadband/ps');
            }
            else
            {
                $broadband=new broadband();
                $broadband->tanggal=$r->tanggal;
                $broadband->witel=$r->witel;
                $broadband->totalps=$r->totalps;//
                $broadband->duapuluh=0;//
                $broadband->tigapuluh=0;
                $broadband->empatpuluh=0;
                $broadband->limapuluh=0;
                $broadband->seratus=0;
                $broadband->save();
                return redirect('best-broadband/ps');
            }
        }

    public function posttotalps(Request $r)
    {
        $bln=$r->bln;
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=broadband::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('broadband.ps',compact('bln','witel','jmlhari','thn'));
    }
}