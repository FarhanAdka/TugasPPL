<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperatorController extends Controller
{
    //Profile
    function profile(){
        $data = array (
            'active_home' => 'active',
            'title' => 'Profile Operator',
        );
        return view('operator/profileOperator');
    }

    //Create Akun
    function createMahasiswa(){
        $data = array (
            'active_home' => 'active',
            'title' => 'Tambah Akun Mahasiswa',
        );
        return view('operator/createAkun/createMahasiswa');
    }
    function createdosenWali(){
        $data = array (
            'active_home' => 'active',
            'title' => 'Tambah Akun Dosen Wali',
        );
        return view('operator/createAkun/createdosenWali');
    }
    function createOperator(){
        $data = array (
            'active_home' => 'active',
            'title' => 'Tambah Akun Operator',
        );
        return view('operator/createAkun/createOperator');
    }

    //Kelola akun akun
    function kelolaMahasiswa(){
        $data = array (
            'active_home' => 'active',
            'title' => 'Kelola Akun Mahasiswa',
        );
        return view('operator/kelolaAkun/kelolaMahasiswa');
    }
    function keloladosenWali(){
        $data = array (
            'active_home' => 'active',
            'title' => 'Kelola Akun Dosen Wali',
        );
        return view('operator/kelolaAkun/keloladosenWali');
    }
}