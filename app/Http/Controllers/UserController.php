<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index(){
        return view('admin');
    }

    function mahasiswa(){
        return view('admin');;
    }
    function operator(){
        return view('admin');
    }
    function dosenWali(){
        return view('admin');
    }
    function departemen(){
        return view('admin');
    }
}
