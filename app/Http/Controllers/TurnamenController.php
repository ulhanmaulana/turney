<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Turnamen;
use DB;

class TurnamenController extends Controller
{
    public function index(){
        $data=DB::table('t_turnamen')
        ->select( DB::raw('t_turnamen.*, count(t_pendaftaran.id_pendaftaran) as jml_peserta'))
        ->leftjoin('t_pendaftaran', 't_pendaftaran.id_turnamen', '=', 't_turnamen.id_turnamen')
        ->groupBy('t_turnamen.id_turnamen','t_pendaftaran.id_turnamen')
        ->get();
       // dd($data);
        return view('admin.tournament.index', ['data'=> $data]);

    }
    public function formTambah(){
        return view('admin.turnamen.tambah');
    }
    public function simpan(Request $request){

        $gmbr = $request->file_gambar;
        $namafile = time()."_".rand(100,999).".".$gmbr->getClientOriginalExtension();
            $turnamen = new Turnamen;
            $turnamen->nama_turnamen = $request->nama_turnamen;
            $turnamen->deskripsi = $request->deskripsi;
            $turnamen->kategori = $request->kategori;
            $turnamen->maksimum_slot = $request->maksimum_slot;
            $turnamen->penyelenggara = $request->penyelenggara;
            $turnamen->file_gambar = $namafile;
            $turnamen->hadiah = $request->hadiah;
            $turnamen->tempat = $request->tempat;
            $turnamen->waktu = date("Y-m-d H:i:s", strtotime($request->waktu));
            $turnamen->peraturan = $request->peraturan;
            $turnamen->biaya_turnamen = $request->biaya_turnamen;
            $turnamen->sistem_turnamen = $request->sistem_turnamen;

            $gmbr->move(public_path().'/images/tournament',$namafile);
            $turnamen->save();
        return redirect('/admin/turnamen/')->with('success', 'Berhasil menambah turnamen!');

    }
    public function formEdit($id){
        $data=Turnamen::find($id);
       // dd($data);
        return view('admin.tournament.edit', ['data'=> $data]);
    }
    public function update(Request $request){
      
       
        $turnamen = Turnamen::find($request->id_turnamen);

        $gmbr_lama = $turnamen->file_gambar;

        $data = [
            'nama_turnamen' => $request->nama_turnamen,
            'nama_turnamen' => $request->nama_turnamen,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'maksimum_slot' => $request->maksimum_slot,
            'penyelenggara' => $request->penyelenggara,
            'poster' => $gmbr_lama,
            'hadiah' => $request->hadiah,
            'tempat' => $request->tempat,
            'waktu' =>  date("Y-m-d H:i:s", strtotime($request->waktu)),
            'peraturan' => $request->peraturan,
            'biaya_turnamen' => $request->biaya_turnamen,
            'sistem_turnamen' => $request->sistem_turnamen,

        ];
        if ($request->hasFile('file_gambar')) {
            $request->file_gambar->move(public_path().'/images/tournament/',$gmbr_lama);
        }
        
        
        $turnamen->update($data);

        return redirect('/admin/turnamen/')->with('success', 'Berhasil mengubah data turnamen!');

    }

    public function destroy($id)
    {
        $turnamen = Turnamen::findOrFail($id);

        $file = public_path('/images/turnamen/').$turnamen->file_gambar;

        if (file_exists($file)) {
            @unlink($file);
        }
        $turnamen->delete();
        return redirect('/admin/turnamen/')->with('success', 'Berhasil menghapus data turnamen!');
     }

     public function upcoming(){
        $data=Turnamen::where('turnamen_status','=','Open')->get();
       // dd($data);
        return view('user.upcomingTurnamen', ['data'=> $data]);
     }

     public function detailUpcoming($id){
         $turnamen=DB::table('t_turnamen')
         ->select( DB::raw('t_turnamen.*, count(t_pendaftaran.id_pendaftaran) as jml_peserta'))
         ->leftjoin('t_pendaftaran', 't_pendaftaran.id_turnamen', '=', 't_turnamen.id_turnamen')
         ->where('t_turnamen.id_turnamen', '=', $id)
         ->groupBy('t_turnamen.id_turnamen','t_pendaftaran.id_turnamen')
         ->first();
         //dd($turnamen);
         return view('user.detailUpcoming', ['turnamen'=> $turnamen]);

     }
}
