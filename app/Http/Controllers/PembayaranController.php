<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Mail;
use App\Tim;
use App\User;
use App\Turnamen;
use App\Pendaftaran;
use App\Mail\SendMail;

class PembayaranController extends Controller
{
    public function index(){
        $data=DB::table('t_pembayaran')
        ->select('t_pembayaran.*','t_pendaftaran.id_pendaftaran', 't_pendaftaran.id_tim', 't_tim.nama_tim')
        ->join('t_pendaftaran', 't_pendaftaran.no_invoice', '=', 't_pembayaran.no_invoice')
        ->join('t_tim', 't_tim.id_tim', '=', 't_pendaftaran.id_tim')
        ->get();
       // dd($data);
        return view('admin.pembayaran.index', ["data"=> $data]);
    }

    public function konfirmasi(Request $request){

        $pembayaran = DB::table('t_pembayaran')->where('id_pembayaran', '=', $request->id_pembayaran)->update([
            "status_pembayaran" => "Sudah Dikonfirmasi"
        ]);
        $pendaftaran = DB::table('t_pendaftaran')->where('id_pendaftaran', '=', $request->id_pendaftaran)->update([
            "status_pendaftaran" => "Berhasil"
        ]);
        $pendaftaran=Pendaftaran::where('id_pendaftaran',$request->id_pendaftaran)->first();
        $tim=Tim::where('id_tim',$request->id_tim)->first();
        $turnamen=Turnamen::where('id_turnamen',$pendaftaran->id_turnamen)->first();
        $user=User::where('id_user',$tim->id_user)->first();
        $email=$user->email;
        $data_email = [
            "nama_tim" => $tim->nama_tim,
            "nama_turnamen"  => $turnamen->nama_turnamen
            ];
        
        
        Mail::send('admin.pembayaran.emailnotifikasi', $data_email, function ($message) use ($email) {
            $message->subject('Notifikasi Pendaftaran');
                $message->from('pinkycindy.ap@gmail.com');
                $message->to($email);
            });
         return redirect('/admin/pembayaran/')->with('success', 'Pembayaran Sudah dikonfirmasi!');

    }
}
