<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use Hash;
use DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function proses(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
            if ($validator->fails()) {
                return \Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
        
                ), 400); // 400 being the HTTP code for an invalid request.
            }

        $data = User::where('email', $request->email)
        ->where('verifikasi_status', 1)
        ->first();
       
        if($data === NULL){
           
           // return redirect('login')->with('email', 'Email or Phone does not exists');
        }elseif(Hash::check($request->password, $data->password)){
            
            Auth::login($data);
           // var_dump(Auth::login());
           
            if(Auth::user()->level_user == 1){
               // echo 'admin';
              return redirect('/admin/berita/');
            }elseif(Auth::user()->level_user === 2){
              //  echo 'operator';
                return redirect('/operator');
            }elseif(Auth::user()->level_user === 3){
                $tim=DB::table('t_tim')->where('id_user', '=', Auth::user()->id_user)->first();
                Session::put('id_tim',$tim->id_tim);
                return redirect('/peserta/profile');
            }
            else{
                return redirect('/login');

            }

        }else{
            echo"Incorrect password";
            //return redirect('login')->with('password', 'Incorrect password');

        }
    

    }

    public function logout(Request $request)
    {
        
      Session::flush();
      Auth::logout();
      return redirect('/login');
    }
}
