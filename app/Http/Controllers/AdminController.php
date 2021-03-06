<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Berita;
use Carbon\Carbon;
use File;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $berita = Berita::latest()->get();
        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validation = $request->validate([
        'file_gambar' => 'required|file|image|mimes:jpeg,png,gif,webp'
        // multiple file uploads
        // 'photo.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        $gmbr = $request->file_gambar;
        $namafile = time()."_".rand(100,999).".".$gmbr->getClientOriginalExtension();

            $beritaupload = new Berita;
            $beritaupload->title = $request->judul_berita;
            $beritaupload->content = $request->isi_berita;
            $beritaupload->gambar = $namafile;

            $gmbr->move(public_path().'/images',$namafile);
            $beritaupload->save();

            return redirect('admin/berita')->with('success', 'Berhasil menambah berita!');


        // if($request->hasFile('file_gambar')){
        //     $resorce       = $request->file('file_gambar');
        //     $name   = 'esport-'.time().'.'.$resorce->getClientOriginalName();
        //     $resorce->move(\base_path() ."/public/images", $name);
        //     $save = DB::table('beritas')->insert([
        //         'title' => $request->judul_berita,
        //         'content' => $request->isi_berita,
        //         'gambar' => $name,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        //     return redirect('admin/berita');
        // }else{
        //     echo "Gagal upload gambar";
        // }
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
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));    
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

        $ubah = Berita::findOrFail($id);
        $awal = $ubah->gambar;

        $dataubah = [
            'title' => $request['judul_berita'],
            'content' => $request['isi_berita'],
            'gambar' => $awal,
        ];
        if ($request->hasFile('file_gambar')) {
            $request->file_gambar->move(public_path().'/images',$awal);
        }
        
        
        $ubah->update($dataubah);

        return redirect('admin/berita')->with('success', 'Berhasil mengubah berita!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Berita::findOrFail($id);

        $file = public_path('/images/').$hapus->gambar;

        if (file_exists($file)) {
            @unlink($file);
        }
        $hapus->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus berita!');
     }
}
