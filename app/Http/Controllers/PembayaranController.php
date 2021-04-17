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
use Auth;
use Illuminate\Support\Facades\Session;
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

    public function pembayaran_peserta(){
        $pendaftaran=DB::table('t_pendaftaran')
        ->select('t_pendaftaran.*', 't_pembayaran.id_pembayaran', 't_pembayaran.bukti_bayar', 't_pembayaran.no_invoice', 't_pembayaran.bank_asal', 't_pembayaran.atas_nama_asal','t_pembayaran.tgl_bayar')
        ->leftjoin('t_pembayaran', 't_pembayaran.no_invoice', '=', 't_pendaftaran.no_invoice')
        ->where('t_pendaftaran.id_tim', '=', Session::get('id_tim'))->first();
        return view('peserta.pembayaran.index', ['pendaftaran' => $pendaftaran]);
    }

    public function pembayaran(Request $request){
        //input data pembayaran

        $bukti_bayar = $request->bukti_bayar;
        $namafile = $request->no_invoice.".".$bukti_bayar->getClientOriginalExtension();
        $bukti_bayar->move(public_path().'/images/bukti_pembayaran',$namafile);

        $data=array(
            "no_invoice" => $request->no_invoice,
            "bank_asal" => $request->bank_asal,
            "atas_nama_asal" => $request->atas_nama,
            "tgl_bayar" => $request->tgl_bayar,
            "bukti_bayar" =>$namafile,
            "nominal" => $request->nominal,

        );
        $pembayaran=DB::table('t_pembayaran')->insert($data);

        $pendaftaran=DB::table('t_pendaftaran')->where('id_pendaftaran', '=', $request->id_pendaftaran)->update([
            "status_pendaftaran" => "Menunggu Konfirmasi"
        ]);

        return redirect('/peserta/pembayaran')->with('success', 'Pembayaran Berhasil dilakukan!');

    }
}
