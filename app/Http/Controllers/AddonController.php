<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\addon;
use DB;

class AddonController extends Controller
{
    
    //public function index($id)
    public function index()
    {
        //return $id;
        $tgl_akhir=Date("Y-m-d");
        $bln=explode("-",$tgl_akhir)[1];
        $tgl=Date("Y-m-")."01";

        $addon=addon::select('witel',DB::raw('sum(input_minipack) as total_inpminipack,sum(realisasi_minipack) as total_reminipack,sum(target_minipack)as total_targetminipack,

            sum(input_stb) as total_inpstb,sum(realisasi_stb) as total_restb,sum(target_stb)as total_targetstb,sum(achievement_stb) as total_achstb,

            sum(input_telepon) as total_inptelepon,sum(realisasi_telepon) as total_retelepon,sum(target_telepon)as total_targettelepon,

            sum(input_upspeed) as total_inpupspeed,sum(realisasi_upspeed) as total_reupspeed,sum(target_upspeed)as total_targetupspeed'))->where('tanggal','like','____-'.$bln.'-%')->where('tanggal',$tgl_akhir)->groupBy('witel')->get();
        
        return view('best-addon.index-addon',compact('addon','tgl','tgl_akhir'));
    }

    public function searchbestaddon(Request $r)
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
        
        $addon=addon::select('witel',DB::raw('sum(input_minipack) as total_inpminipack,sum(realisasi_minipack) as total_reminipack,sum(target_minipack)as total_targetminipack,

            sum(input_stb) as total_inpstb,sum(realisasi_stb) as total_restb,sum(target_stb)as total_targetstb,

            sum(input_telepon) as total_inptelepon,sum(realisasi_telepon) as total_retelepon,sum(target_telepon)as total_targettelepon,

            sum(input_upspeed) as total_inpupspeed,sum(realisasi_upspeed) as total_reupspeed,sum(target_upspeed)as total_targetupspeed'))->where('tanggal','>=',$tgl)->where('tanggal','<=',$tgl_akhir)->groupBy('witel')->get();

        //return redirect('/index');
        return view('best-addon.index-addon',compact('addon','tgl','tgl_akhir'));
    }

    public function input_minipack(Request $r)
    {
        $cek=addon::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->input_minipack=$r->input_minipack;//
            $cek->save();
            return redirect('/best-addon/minipack/input');
        }
        else
        {
            $addon=new addon();
            $addon->tanggal=$r->tanggal;
            $addon->witel=$r->witel;
            $addon->input_minipack=$r->input_minipack;
            $addon->realisasi_minipack=0;
            $addon->target_minipack=0;

            $addon->input_stb=0;
            $addon->realisasi_stb=0;
            $addon->target_stb=0;

            $addon->input_telepon=0;
            $addon->realisasi_telepon=0;
            $addon->target_telepon=0;

            $addon->input_upspeed=0;
            $addon->realisasi_upspeed=0;
            $addon->target_upspeed=0;
        
            $addon->save();
            return redirect('/best-addon/minipack/input');
        }
    }

    public function postminipack_input(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=addon::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-addon.input_minipack',compact('bln','witel','jmlhari','thn'));
    }

    public function getminipack_input()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel', DB::raw('sum(input_minipack) as total_inpminipack'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-addon.input_minipack',compact('bln','witel','jmlhari','thn'));
    }

    public function realisasi_minipack(Request $r)
    {
        $cek=addon::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->realisasi_minipack=$r->realisasi_minipack;//
            $cek->save();
            return redirect('/best-addon/minipack/realisasi');
        }
        else
        {
            $addon=new addon();
            $addon->tanggal=$r->tanggal;
            $addon->witel=$r->witel;
            $addon->realisasi_minipack=$r->realisasi_minipack;
            $addon->input_minipack=0;
            $addon->target_minipack=0;

            $addon->input_stb=0;
            $addon->realisasi_stb=0;
            $addon->target_stb=0;

            $addon->input_telepon=0;
            $addon->realisasi_telepon=0;
            $addon->target_telepon=0;

            $addon->input_upspeed=0;
            $addon->realisasi_upspeed=0;
            $addon->target_upspeed=0;
        
            $addon->save();
            return redirect('/best-addon/minipack/realisasi');
        }
    }

    public function postminipack_realisasi(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=addon::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-addon.realisasi_minipack',compact('bln','witel','jmlhari','thn'));
    }

    public function getminipack_realisasi()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel', DB::raw('sum(realisasi_minipack) as total_reminipack'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-addon.realisasi_minipack',compact('bln','witel','jmlhari','thn'));
    }

    public function target_minipack(Request $r)
    {
        $cek=addon::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->target_minipack=$r->target_minipack;//
            $cek->save();
            return redirect('/best-addon/minipack/target');
        }
        else
        {
            $addon=new addon();
            $addon->tanggal=$r->tanggal;
            $addon->witel=$r->witel;
            $addon->realisasi_minipack=0;
            $addon->input_minipack=0;
            $addon->target_minipack=$r->target_minipack;

            $addon->input_stb=0;
            $addon->realisasi_stb=0;
            $addon->target_stb=0;

            $addon->input_telepon=0;
            $addon->realisasi_telepon=0;
            $addon->target_telepon=0;

            $addon->input_upspeed=0;
            $addon->realisasi_upspeed=0;
            $addon->target_upspeed=0;
        
            $addon->save();
            return redirect('/best-addon/minipack/target');
        }
    }

    public function postminipack_target(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=addon::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-addon.target_minipack',compact('bln','witel','jmlhari','thn'));
    }

    public function getminipack_target()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel', DB::raw('sum(target_minipack) as total_targetminipack'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-addon.target_minipack',compact('bln','witel','jmlhari','thn'));
    }

    public function input_stb(Request $r)
    {
        $cek=addon::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->input_stb=$r->input_stb;//
            $cek->save();
            return redirect('/best-addon/stb/input');
        }
        else
        {
            $addon=new addon();
            $addon->tanggal=$r->tanggal;
            $addon->witel=$r->witel;
            $addon->input_minipack=0;
            $addon->realisasi_minipack=0;
            $addon->target_minipack=0;

            $addon->input_stb=$r->input_stb;
            $addon->realisasi_stb=0;
            $addon->target_stb=0;

            $addon->input_telepon=0;
            $addon->realisasi_telepon=0;
            $addon->target_telepon=0;

            $addon->input_upspeed=0;
            $addon->realisasi_upspeed=0;
            $addon->target_upspeed=0;
        
            $addon->save();
            return redirect('/best-addon/stb/input');
        }
    }

    public function poststb_input(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=addon::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-addon.input_stb',compact('bln','witel','jmlhari','thn'));
    }

    public function getstb_input()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel', DB::raw('sum(input_stb) as total_inpstb'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-addon.input_stb',compact('bln','witel','jmlhari','thn'));
    }

    public function realisasi_stb(Request $r)
    {
        $cek=addon::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->realisasi_stb=$r->realisasi_stb;//
            $cek->save();
            return redirect('/best-addon/stb/realisasi');
        }
        else
        {
            $addon=new addon();
            $addon->tanggal=$r->tanggal;
            $addon->witel=$r->witel;
            $addon->realisasi_minipack=0;
            $addon->input_minipack=0;
            $addon->target_minipack=0;

            $addon->input_stb=0;
            $addon->realisasi_stb=$r->realisasi_stb;
            $addon->target_stb=0;

            $addon->input_telepon=0;
            $addon->realisasi_telepon=0;
            $addon->target_telepon=0;

            $addon->input_upspeed=0;
            $addon->realisasi_upspeed=0;
            $addon->target_upspeed=0;
        
            $addon->save();
            return redirect('/best-addon/stb/realisasi');
        }
    }

    public function poststb_realisasi(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=addon::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-addon.realisasi_stb',compact('bln','witel','jmlhari','thn'));
    }

    public function getstb_realisasi()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel', DB::raw('sum(realisasi_stb) as total_restb'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-addon.realisasi_stb',compact('bln','witel','jmlhari','thn'));
    }

    public function target_stb(Request $r)
    {
        $cek=addon::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->target_stb=$r->target_stb;//
            $cek->save();
            return redirect('/best-addon/stb/target');
        }
        else
        {
            $addon=new addon();
            $addon->tanggal=$r->tanggal;
            $addon->witel=$r->witel;
            $addon->realisasi_minipack=0;
            $addon->input_minipack=0;
            $addon->target_minipack=0;

            $addon->input_stb=0;
            $addon->realisasi_stb=0;
            $addon->target_stb=$r->target_stb;

            $addon->input_telepon=0;
            $addon->realisasi_telepon=0;
            $addon->target_telepon=0;

            $addon->input_upspeed=0;
            $addon->realisasi_upspeed=0;
            $addon->target_upspeed=0;
        
            $addon->save();
            return redirect('/best-addon/stb/target');
        }
    }

    public function poststb_target(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=addon::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-addon.target_stb',compact('bln','witel','jmlhari','thn'));
    }

    public function getstb_target()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel', DB::raw('sum(target_stb) as total_targetstb'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-addon.target_stb',compact('bln','witel','jmlhari','thn'));
    }

    public function input_telepon(Request $r)
    {
        $cek=addon::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->input_telepon=$r->input_telepon;//
            $cek->save();
            return redirect('/best-addon/telepon/input');
        }
        else
        {
            $addon=new addon();
            $addon->tanggal=$r->tanggal;
            $addon->witel=$r->witel;
            $addon->input_minipack=0;
            $addon->realisasi_minipack=0;
            $addon->target_minipack=0;

            $addon->input_stb=0;
            $addon->realisasi_stb=0;
            $addon->target_stb=0;

            $addon->input_telepon=$r->input_telepon;
            $addon->realisasi_telepon=0;
            $addon->target_telepon=0;

            $addon->input_upspeed=0;
            $addon->realisasi_upspeed=0;
            $addon->target_upspeed=0;
        
            $addon->save();
            return redirect('/best-addon/telepon/input');
        }
    }

    public function posttelepon_input(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=addon::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-addon.input_telepon',compact('bln','witel','jmlhari','thn'));
    }

    public function gettelepon_input()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel', DB::raw('sum(input_telepon) as total_inptelepon'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-addon.input_telepon',compact('bln','witel','jmlhari','thn'));
    }

    public function realisasi_telepon(Request $r)
    {
        $cek=addon::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->realisasi_telepon=$r->realisasi_telepon;//
            $cek->save();
            return redirect('/best-addon/telepon/realisasi');
        }
        else
        {
            $addon=new addon();
            $addon->tanggal=$r->tanggal;
            $addon->witel=$r->witel;
            $addon->realisasi_minipack=0;
            $addon->input_minipack=0;
            $addon->target_minipack=0;

            $addon->input_stb=0;
            $addon->realisasi_stb=0;
            $addon->target_stb=0;

            $addon->input_telepon=0;
            $addon->realisasi_telepon=$r->realisasi_telepon;
            $addon->target_telepon=0;

            $addon->input_upspeed=0;
            $addon->realisasi_upspeed=0;
            $addon->target_upspeed=0;
        
            $addon->save();
            return redirect('/best-addon/telepon/realisasi');
        }
    }

    public function posttelepon_realisasi(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=addon::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-addon.realisasi_telepon',compact('bln','witel','jmlhari','thn'));
    }

    public function gettelepon_realisasi()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel', DB::raw('sum(realisasi_telepon) as total_retelepon'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-addon.realisasi_telepon',compact('bln','witel','jmlhari','thn'));
    }

    public function target_telepon(Request $r)
    {
        $cek=addon::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->target_telepon=$r->target_telepon;//
            $cek->save();
            return redirect('/best-addon/telepon/target');
        }
        else
        {
            $addon=new addon();
            $addon->tanggal=$r->tanggal;
            $addon->witel=$r->witel;
            $addon->realisasi_minipack=0;
            $addon->input_minipack=0;
            $addon->target_minipack=0;

            $addon->input_stb=0;
            $addon->realisasi_stb=0;
            $addon->target_stb=0;

            $addon->input_telepon=0;
            $addon->realisasi_telepon=0;
            $addon->target_telepon=$r->target_telepon;

            $addon->input_upspeed=0;
            $addon->realisasi_upspeed=0;
            $addon->target_upspeed=0;
        
            $addon->save();
            return redirect('/best-addon/telepon/target');
        }
    }

    public function posttelepon_target(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=addon::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-addon.target_telepon',compact('bln','witel','jmlhari','thn'));
    }

    public function gettelepon_target()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel', DB::raw('sum(target_telepon) as total_targettelepon'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-addon.target_telepon',compact('bln','witel','jmlhari','thn'));
    }

    public function input_upspeed(Request $r)
    {
        $cek=addon::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->input_upspeed=$r->input_upspeed;//
            $cek->save();
            return redirect('/best-addon/upspeed/input');
        }
        else
        {
            $addon=new addon();
            $addon->tanggal=$r->tanggal;
            $addon->witel=$r->witel;
            $addon->input_minipack=0;
            $addon->realisasi_minipack=0;
            $addon->target_minipack=0;

            $addon->input_stb=0;
            $addon->realisasi_stb=0;
            $addon->target_stb=0;

            $addon->input_telepon=0;
            $addon->realisasi_telepon=0;
            $addon->target_telepon=0;

            $addon->input_upspeed=$r->input_upspeed;
            $addon->realisasi_upspeed=0;
            $addon->target_upspeed=0;
        
            $addon->save();
            return redirect('/best-addon/upspeed/input');
        }
    }

    public function postupspeed_input(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=addon::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-addon.input_upspeed',compact('bln','witel','jmlhari','thn'));
    }

    public function getupspeed_input()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel', DB::raw('sum(input_upspeed) as total_inpupspeed'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-addon.input_upspeed',compact('bln','witel','jmlhari','thn'));
    }

    public function realisasi_upspeed(Request $r)
    {
        $cek=addon::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->realisasi_upspeed=$r->realisasi_upspeed;//
            $cek->save();
            return redirect('/best-addon/upspeed/realisasi');
        }
        else
        {
            $addon=new addon();
            $addon->tanggal=$r->tanggal;
            $addon->witel=$r->witel;
            $addon->realisasi_minipack=0;
            $addon->input_minipack=0;
            $addon->target_minipack=0;

            $addon->input_stb=0;
            $addon->realisasi_stb=0;
            $addon->target_stb=0;

            $addon->input_telepon=0;
            $addon->realisasi_telepon=0;
            $addon->target_telepon=0;

            $addon->input_upspeed=0;
            $addon->realisasi_upspeed=$r->realisasi_upspeed;
            $addon->target_upspeed=0;
        
            $addon->save();
            return redirect('/best-addon/upspeed/realisasi');
        }
    }

    public function postupspeed_realisasi(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=addon::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-addon.realisasi_upspeed',compact('bln','witel','jmlhari','thn'));
    }

    public function getupspeed_realisasi()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel', DB::raw('sum(realisasi_upspeed) as total_reupspeed'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-addon.realisasi_upspeed',compact('bln','witel','jmlhari','thn'));
    }

    public function target_upspeed(Request $r)
    {
        $cek=addon::where('tanggal',$r->tanggal)->where('witel',$r->witel)->first();
        if($cek!=null)
        {
            $cek->target_upspeed=$r->target_upspeed;//
            $cek->save();
            return redirect('/best-addon/upspeed/target');
        }
        else
        {
            $addon=new addon();
            $addon->tanggal=$r->tanggal;
            $addon->witel=$r->witel;
            $addon->realisasi_minipack=0;
            $addon->input_minipack=0;
            $addon->target_minipack=0;

            $addon->input_stb=0;
            $addon->realisasi_stb=0;
            $addon->target_stb=0;

            $addon->input_telepon=0;
            $addon->realisasi_telepon=0;
            $addon->target_telepon=0;

            $addon->input_upspeed=0;
            $addon->realisasi_upspeed=0;
            $addon->target_upspeed=$r->target_upspeed;
        
            $addon->save();
            return redirect('/best-addon/upspeed/target');
        }
    }

    public function postupspeed_target(Request $r)
    {
        $blnthn=explode("-",$r->bln);
        $bln=$blnthn[1];
        $thn=$blnthn[0];
        $witel=addon::select('witel')->where('tanggal','like',$r->bln.'%')->groupby('witel')->get();
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

        return view('best-addon.target_upspeed',compact('bln','witel','jmlhari','thn'));
    }

    public function getupspeed_target()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel', DB::raw('sum(target_upspeed) as total_targetupspeed'))->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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

        return view('best-addon.target_upspeed',compact('bln','witel','jmlhari','thn'));
    }



}
