<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ],[
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]
    );

    $infologin = [
        'username'=>$request->username,
        'password'=>$request->password,
    ];

    if(Auth::attempt($infologin)){
        if(Auth::user()->role == 'mahasiswa'){
            return redirect('user/mahasiswa/');
        }
        elseif(Auth::user()->role == 'operator'){
            return redirect('user/operator');
        }
        elseif(Auth::user()->role == 'dosen_wali'){
            return redirect('user/dosenWali');
        }
        elseif(Auth::user()->role == 'departemen'){
            return redirect('user/departemen');
        }
    }
    
    else{
        return redirect('')->withErrors('Username atau pasword tidak sesuai')->withInput();
    }
}
    function logout(){
        Auth::logout();
        return redirect('');
    }
}