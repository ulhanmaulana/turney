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
    
    public function index()
    {
        $berita = Berita::latest()->get();
        return view('admin.berita.index', compact('berita'));
    }
    public function create()
    {
        return view('admin.berita.tambah');
    }
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
    }
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));    
    }
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

     // =============================== controller for tournament =====================================

     public function index_turnament()
    {
     
        return view('admin.tournament.index');
    }
    public function create_turnament()
    {
        return view('admin.tournament.tambah');
    }
    public function edit_turnament()
    {
        return view('admin.tournament.edit');
    }


}
