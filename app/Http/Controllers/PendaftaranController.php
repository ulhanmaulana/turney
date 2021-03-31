<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class PendaftaranController extends Controller
{
    public function index(){
        $data=DB::table('t_pendaftaran')
        ->select('t_turnamen.*', 't_tim.*', 't_pendaftaran.*')
        ->join('t_tim', 't_tim.id_tim', '=', 't_pendaftaran.id_tim')
        ->join('t_turnamen', 't_turnamen.id_turnamen', '=', 't_pendaftaran.id_turnamen')
        ->get();
        //dd($data);
        return view('admin.pendaftaran.index', ["data"=> $data]);
    }
}
