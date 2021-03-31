<?php

namespace App\Http\Controllers;

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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $berita = Berita::orderBy('id', 'desc')->take(3)->get();
        return view('user.index', compact('berita'));
    }
    public function detailberita($id)
    {
        $berita = Berita::findOrFail($id);
        return view('user.detailberita', compact('berita')); 
    }
    public function news()
    {

        $berita = Berita::latest()->get();
        return view('user.news', compact('berita'));
    }
    public function upcoming()
    {
        return view('user.upcomingTurnamen');
    }
    public function detailupcoming()
    {
        return view('user.detailUpcoming');
    }
    public function profile()
    {
        $tim=DB::table('t_tim')->where('id_user', '=', Auth::user()->id_user)->first();
        $anggota=DB::table('t_anggota')->where('id_tim', '=', $tim->id_tim)->get();
        $pendaftaran=DB::table('t_pendaftaran')
        ->select('t_pendaftaran.*', 't_pembayaran.id_pembayaran', 't_pembayaran.bukti_bayar')
        ->leftjoin('t_pembayaran', 't_pembayaran.no_invoice', '=', 't_pendaftaran.no_invoice')
        ->where('t_pendaftaran.id_tim', '=', Session::get('id_tim'))
        ->where('t_pendaftaran.status_pendaftaran', '!=', 'Berhasil')->first();
        //dd($pendaftaran);
        return view('user.profile', ['tim'=> $tim, 'anggota'=> $anggota, 'pendaftaran' => $pendaftaran]);
    }

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
                $message->from('pinkycindy.ap@gmail.com');
                $message->to($email);
            });

    return redirect()->back()->with('success', 'Berhasil melakukan pendaftaran, silakan cek email anda!');


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

        return redirect('/profile')->with('success', 'Pembayaran Berhasil dilakukan!');

    }












    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
