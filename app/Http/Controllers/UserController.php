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
        $userMhs = User::where('id', auth()->user()->id)->get()->first();
        $data = array
         (
            'active_home' => 'active',
            'title' => 'Mahasiswa',
            'UserName' => $userMhs->name
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

        // dd($mahasiswa);
        $lulus_pkl = 0;
        $lulus_skripsi = 0;
        foreach ($mahasiswa as $key => $value) {
            //$mahasiswa[$key]->name = User::where('id', $value[0]->user_id)->first()->name;
            $pkl[$key]['sudah'] = array();
            $pkl[$key]['belum'] = array();
            //$pkl[$key]['belum'] = array();
            $skripsi[$key]['sudah'] = array();
            $skripsi[$key]['belum'] = array();
            foreach ($value as $key2 => $value2) {
                //dd($key2);
                $data_pkl = PKL::where('id_mahasiswa', $value2->user_id)->get()->first();
                // dd($value2->user_id);
                $data_pkl->nama = User::where('id', $value2->user_id)->first()->name;
                $data_pkl->nim = User::where('id', $value2->user_id)->first()->username;
                $data_pkl->angkatan = $value2->angkatan;
                // dd($data_pkl);
                if ($data_pkl != null) {
                    if ($data_pkl->status) {
                        $pkl[$key]['sudah'][] = $data_pkl;
                        $lulus_pkl++;
                    } else {
                        $pkl[$key]['belum'][] = $data_pkl;
                    }
                }

                $data_skripsi = Skripsi::where('id_mahasiswa', $value2->user_id)->get()->first();
                // dd($data_skripsi);
                $data_skripsi->nama = User::where('id', $value2->user_id)->first()->name;
                $data_skripsi->nim = User::where('id', $value2->user_id)->first()->username;
                $data_skripsi->angkatan = $value2->angkatan;
                if ($data_skripsi != null) {
                    if ($data_skripsi->status) {
                        $skripsi[$key]['sudah'][] = $data_skripsi;
                        $lulus_skripsi++;
                    } else {
                        $skripsi[$key]['belum'][] = $data_skripsi;
                    }
                }

            }
        }
        
        // dd($pkl[2021]['sudah'][0]);
        // dd($skripsi);
        // dd($tahun_shown);
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => 'INFORMATIKA',
            'Title' => 'Dashboard',
            'pkl' => $pkl,
            'skripsi' => $skripsi,
            'tahun_shown' => $tahun_shown,
            'mahasiswa' => $mahasiswa,
            'lulus_pkl' => $lulus_pkl,
            'lulus_skripsi' => $lulus_skripsi,
        );
        return view('Departemen/homeDepartemen', $data);
    }
}
