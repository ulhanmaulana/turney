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
