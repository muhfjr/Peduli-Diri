<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class userController extends Controller
{
    Public function halamanRegister(){
        return view('layouts.register');
    }

    Public function simpanRegister(Request $request){
        
                $request->validate([
            'nik'=>'required|unique:users,email',
            'name'=>'required'
        ],
        [
            'nik.unique'=>'NIK sudah terdaftar',
           'name.required'=>'nama tidak boleh kosong'
         ]
    );

        $data=[
            'name'=>$request->name,
            'email'=>$request->nik,
            'password'=>bcrypt($request->nik)
        ];
        
        User::create($data);
        
        return redirect('/register');//->with('message','Register berhasil');
    }
}
