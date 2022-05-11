<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class loginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('LogOut');
    }

    public function halamanLogin(){
        return view('layouts.Auth.login');
    }

    public function Login(Request $request){
        if (Auth::attempt($request->only('name', 'email', 'password'))){
            return redirect('/dashboard');
    }
    return redirect('/')->with('message','login gagal: NIK dan nama tidak ditemukan');
    }

    public function LogOut(){
        Auth::logout();
        return redirect('/');
    }
}

