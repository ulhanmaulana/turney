<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.berita.index');
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
        if($request->hasFile('file_gambar')){
            $resorce       = $request->file('file_gambar');
            $name   = 'esport-'.time().'.'.$resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/images", $name);
            $save = DB::table('beritas')->insert([
                'title' => $request->judul_berita,
                'content' => $request->isi_berita,
                'gambar' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect('admin/berita');
        }else{
            echo "Gagal upload gambar";
        }
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
