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
        $data = array (
            'active_home' => 'active',
            'title' => 'Mahasiswa',
        );
        return view('Mahasiswa/homeMahasiswa', $data);
    }

    function operator(){
        $data = array (
            'active_side' => 'active',
            'active_sub' => 'active',
            'active_user' => 'active',
            'title' => 'Operator',
        );
        return view('Operator/homeOperator', $data);
    }

    function dosenWali(){
        $data = array (
            'active_home' => 'active',
            'title' => 'Dosen Wali',
        );
        return view('DosenWali/homedosenWali', $data);
    }

    function departemen(){
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => '\\\UserName///',
            'Title' => 'Dashboard',
        );
        return view('Departemen/homeDepartemen', $data);
    }
}
