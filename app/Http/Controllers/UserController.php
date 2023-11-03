<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Supprt\Facades\Auth;

class UserController extends Controller
{
    function index(){
        echo "selamat datang";
        echo "<a href='/logout'>Logout >></a>";
    }
    function mahasiswa(){
        return view('mahasiswa.dashboard');
    }
    function operator(){
        return view('operator.dashboard');
    }
    function dosenWali(){
        return view('dosenWali.dashboard');
    }
    function departemen(){
        return view('departemen.dashboard');
    }
}
