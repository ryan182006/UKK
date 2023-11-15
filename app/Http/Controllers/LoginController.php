<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.login');
    }

    public function prosesLogin(Request $request){
        $request -> validate([
            'email'=>'required',
            'password' => 'required'

        ]);
        $data =[
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }else{
            return redirect()->route('login')->with('error','email dan password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    

}
