<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }
        // Message salah
        return redirect('/login')->with('errors', 'Username atau Password anda Salah!');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
