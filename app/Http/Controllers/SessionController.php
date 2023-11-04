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
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]
    );

    $infologin = [
        'email'=>$request->email,
        'password'=>$request->password,
    ];

    if(Auth::attempt($infologin)){
        if(Auth::user()->role == 'mahasiswa'){
            return redirect('user/mahasiswa');
        }
        elseif(Auth::user()->role == 'operator'){
            return redirect('user/operator');
        }
        elseif(Auth::user()->role == 'dosenWali'){
            return redirect('user/dosenWali');
        }
        elseif(Auth::user()->role == 'departemen'){
            return redirect('user/departemen');
        }
    }
    else{
        return redirect('admin');
    }
}
    function logout(){
        Auth::logout();
        return redirect('');
    }
}