<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    function Profile(){
        $data = array (
            'active_home' => 'active',
            'title' => 'Mahasiswa',
        );
        return view('Mahasiswa/ProfileMahasiswa', $data);
    }
    function IRS(){
        $data = array (
            'active_home' => 'active',
            'title' => 'Mahasiswa',
        );
        return view('Mahasiswa/IRS', $data);
    }

    function KHS(){
        $data = array (
            'active_home' => 'active',
            'title' => 'Mahasiswa',
        );
        return view('Mahasiswa/KHS', $data);
    }

    function PKL(){
        $data = array (
            'active_home' => 'active',
            'title' => 'Mahasiswa',
        );
        return view('Mahasiswa/PKL', $data);
    }

    function Skripsi(){
        $data = array (
            'active_home' => 'active',
            'title' => 'Mahasiswa',
        );
        return view('Mahasiswa/Skripsi', $data);
    }
}
