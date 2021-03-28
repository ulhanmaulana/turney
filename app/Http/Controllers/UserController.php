<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('user.profile');
    }
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
