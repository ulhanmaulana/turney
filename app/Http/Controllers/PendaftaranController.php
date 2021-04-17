<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Berita;
use App\User;
use App\Tim;
use App\Anggota;
use App\Pendaftaran;
use App\Turnamen;
use DB;
use Validator;
use Mail;
use Auth;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Session;
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

    //user
    public function pendaftaran(Request $request){

		$validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:t_user',
            ]);
            if ($validator->fails()) {
                return \Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
        
                ), 400); // 400 being the HTTP code for an invalid request.
            }

        //input user
        $pass=$this->randomPassword();
        $data_user=array(
            "email" => $request->email,
            "username" => $request->email,
            "password" =>bcrypt($pass),
            "level_user" => 3
        );
        $user = DB::table('t_user')->insert($data_user);
        $user=User::where('email', $request->email)->first();

        //input tim
        $jml_anggota=count($request->nama);
        if($request->hasFile('logo')){
            $logo = $request->logo;
            $namafile_logo = time()."_".rand(100,999).".".$logo->getClientOriginalExtension();
            $logo->move(public_path().'/images/tim',$namafile_logo);
        }
        else{
            $namafile_logo="-";

        }
       
        
        $data_tim=array(
            "nama_tim" => $request->nama_tim,
            "logo_tim" => $namafile_logo,
            "jml_anggota" => $jml_anggota,
            "id_user" => $user->id_user
        );
       
        $tim=DB::table('t_tim')->insert($data_tim);
        
        //input peserta
        $tim=Tim::where('id_user', $user->id_user)->first();
        for($i=0; $i<$jml_anggota; $i++){
            if (is_array($request->foto) && array_key_exists($i, $request->foto)) { 
                $foto = $request->foto[$i];
                $namafile_foto = time()."_".rand(100,999).".".$foto->getClientOriginalExtension();
                $foto->move(public_path().'/images/anggota',$namafile_foto);
            }
            else{
                $namafile_foto= "-";
            }  
            if (is_array($request->additional) && array_key_exists($i, $request->additional)) { 
                $additional = $request->additional[$i];
                $namafile_add = time()."_".rand(100,999).".".$additional->getClientOriginalExtension();
                $additional->move(public_path().'/images/anggota',$namafile_add);
            }
            else{
                $namafile_add="-";
            } 

            $data_anggota=array(
                "nama_peserta" => $request->nama[$i],
                "nick_name" => $request->nickname[$i],
                "id_game" => $request->idgame[$i],
                "keterangan" => $namafile_add,
                "foto" =>  $namafile_foto,
                "id_tim" =>$tim->id_tim
            );

            $anggota=DB::table('t_anggota')->insert($data_anggota);
        }
     
       // input pendaftaran
       $turnamen=Turnamen::where('id_turnamen', $request->id_turnamen)->first();
        $data_pendaftaran=array(
            "id_turnamen" => $request->id_turnamen,
            "id_tim" => $tim->id_tim,
            "no_invoice" => "INVC-".date('Ym').$request->id_turnamen.$tim->id_tim,
            "biaya_pendaftaran" => $turnamen->biaya_turnamen
        );
        $pendaftaran=DB::table('t_pendaftaran')->insert($data_pendaftaran);

        //send notifikasi email
        $link = "http://localhost:8000/login/";

        $email=$request->email;
        $data_email = [
            "title" => "Berikut adalah link verifikasi anda",
            "link"  => $link,
            "email" => $request->email,
            "password" => $pass
            ];
        
        
        Mail::send('user.emailverifikasi', $data_email, function ($message) use ($email) {
            $message->subject('Email Verification');
                $message->from(env('MAIL_USERNAME'));
                $message->to($email);
            });

   // return redirect()->back()->with('success', 'Berhasil melakukan pendaftaran, silakan cek email anda!');


    }

    public function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function checkEmailEksist(Request $request){
        $akun=DB::table('t_user')->where('email', $request->email)->count();
       // var_dump($akun);
        if($akun > 0){
            echo "eksist";
        }else{
            echo "valid";
        }
    }

}
