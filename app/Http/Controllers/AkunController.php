<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
class AkunController extends Controller
{
    public function setting_peserta(){
        return view('peserta.setting.index');
        
    }
    public function change_pass(Request $request){
        $data_user=array(
            "password" =>bcrypt($request->pass_new)
        );
        $user = DB::table('t_user')
        ->where('id_user', Auth::user()->id_user)
        ->update($data_user);

        return redirect('/peserta/setting')->with('success', 'Password berhasil diganti!');

    }
}
