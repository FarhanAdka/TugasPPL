<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //Profile
    function Profile(){
        $userMhs = User::where('id', auth()->user()->id)->get();
        $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->get();
        $data = array (
            'active_home' => 'active',
            'title' => 'Kelola Akun Mahasiswa',
            'title' => 'Profile',
            'mahasiswa' => $mahasiswa,
            'userMhs' => $userMhs,
            
        );


        
        return view('Mahasiswa/ProfileMahasiswa', $data);
    }
    //IRS
    function IsiIRS(){
        $data = array (
            'active_side' => 'active', 
            'active_user' => 'active',
            'title' => 'Isi IRS',
        );
        return view('Mahasiswa/IsiIRS', $data);
    }
    function DataIRS(){
        $data = array (
            'active_side' => 'active',
            'active_user' => 'active',
            'title' => 'Data IRS',
        );
        return view('Mahasiswa/DataIRS', $data);
    }
    //KHS
    function IsiKHS(){
        $data = array (
            'active_side' => 'active',
            'active_user' => 'active',
                       
            'title' => 'Isi KHS',
        );
        return view('Mahasiswa/IsiKHS', $data);
    }
    function DataKHS(){
        $data = array (
            'active_side' => 'active',
            'title' => 'Data KHS',
        );
        return view('Mahasiswa/DataKHS', $data);
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
