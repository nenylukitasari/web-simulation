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

        $addon=addon::select('witel',DB::raw('sum(input_minipack) as total_inpminipack,sum(realisasi_minipack) as total_reminipack,sum(target_minipack)as total_targetminipack,sum(achievement_minipack) as total_achminipack,

            sum(input_stb) as total_inpstb,sum(realisasi_stb) as total_restb,sum(target_stb)as total_targetstb,sum(achievement_stb) as total_achstb,

            sum(input_telepon) as total_inptelepon,sum(realisasi_telepon) as total_retelepon,sum(target_telepon)as total_targettelepon,sum(achievement_telepon) as total_achtelepon,

            sum(input_upspeed) as total_inpupspeed,sum(realisasi_upspeed) as total_reupspeed,sum(target_upspeed)as total_targetupspeed,sum(achievement_upspeed) as total_achupspeed'))->where('tanggal','like','____-'.$bln.'-%')->where('tanggal',$tgl_akhir)->groupBy('witel')->get();
        
        return view('best-addon.index-addon',compact('addon','tgl','tgl_akhir'));
    }

    public function input_minipack(Request $r)
    {
        $addon=new addon();
        $addon->tanggal=$r->tanggal;
        $addon->witel=$r->witel;
        $addon->input_minipack=$r->input_minipack;
        $addon->realisasi_minipack=$r->realisasi_minipack;
        $addon->target_minipack=$r->target_minipack;
    
        $addon->save();
        return redirect('/minipack');
    }

    public function postminipack(Request $r)
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

    public function getminipack()
    {
        $bln=Date("m");
        $thn=Date("Y");
        $witel=addon::select('witel')->where('tanggal','like',$thn."-".$bln.'%')->groupby('witel')->get();
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


}
