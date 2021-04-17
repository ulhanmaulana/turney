<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Session;
class PesertaController extends Controller
{
    public function peserta_profile(){
        $tim=DB::table('t_tim')->where('id_user', '=', Auth::user()->id_user)->first();
        $anggota=DB::table('t_anggota')->where('id_tim', '=', $tim->id_tim)->get();
        
        //dd($pendaftaran);
        return view('peserta.profile.index', ['tim'=> $tim, 'anggota'=> $anggota]);
    }
}
