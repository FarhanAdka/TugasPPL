<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\PKL;
use App\Models\Skripsi;
use App\Models\User;
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
        //$pkl = PKL::all();
        $current_year = date('Y');
        //dd($current_year);
        $tahun_shown = array();
        for ($i = intval($current_year); $i >= intval($current_year) - 6; $i--) {
            $mahasiswa[$i] = Mahasiswa::where('angkatan', strval($i))->get();
            $tahun_shown[] = $i;
        }

        //dd($mahasiswa);
        foreach ($mahasiswa as $key => $value) {
            //$mahasiswa[$key]->name = User::where('id', $value[0]->user_id)->first()->name;
            $pkl[$key]['sudah'] = array();
            $pkl[$key]['belum'] = array();
            //$pkl[$key]['belum'] = array();
            $skripsi[$key]['sudah'] = array();
            $skripsi[$key]['belum'] = array();
            foreach ($value as $key2 => $value2) {
                //dd($key2);
                $pkl[$key]['sudah'] = PKL::where('id_mahasiswa', $value2->user_id)->where('status', true)->get();
                $pkl[$key]['belum'] = PKL::where('id_mahasiswa', $value2->user_id)->where('status', false)->get();
                $skripsi[$key]['sudah'] = Skripsi::where('id_mahasiswa', $value2->user_id)->where('status', true)->get();
                $skripsi[$key]['belum'] = Skripsi::where('id_mahasiswa', $value2->user_id)->where('status', false)->get();
            }
        }

        foreach ($pkl as $key => $value) {
            foreach ($value as $key2 => $value2) {
                //dd($value2);
                foreach ($value2 as $key3 => $value3) {
                    $pkl[$key][$key2][$key3]->name = User::where('id', $value3->id_mahasiswa)->first()->name;
                    $pkl[$key][$key2][$key3]->nim = User::where('id', $value3->id_mahasiswa)->first()->username;
                    $skripsi[$key][$key2][$key3]->name = User::where('id', $value3->id_mahasiswa)->first()->name;
                    $skripsi[$key][$key2][$key3]->nim = User::where('id', $value3->id_mahasiswa)->first()->username;
                }
            }
        }

        // dd($pkl);
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => '\\\UserName///',
            'Title' => 'Dashboard',
            'pkl' => $pkl,
            'skripsi' => $skripsi,
            'tahun_shown' => $tahun_shown,
            'mahasiswa' => $mahasiswa,
        );
        return view('Departemen/homeDepartemen', $data);
    }
}
