<?php

namespace App\Http\Controllers;

use App\Models\PKL;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\DosenWali;
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
        $doswal = User::where('role', 'dosen_wali')->get();
        $data = array (
            'active_home' => 'active',
            'title' => 'Tambah Akun Mahasiswa',
            'doswal' => $doswal,
        );
        return view('operator/createAkun/createMahasiswa', $data);
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
        $mahasiswa = User::where('role', 'mahasiswa')->paginate(10);
        $data = array (
            'active_home' => 'active',
            'title' => 'Kelola Akun Mahasiswa',
            'mahasiswa' => $mahasiswa,
        );
        return view('operator/kelolaAkun/kelolaMahasiswa', $data);
    }
    function keloladosenWali(){
        $doswal = User::where('role', 'dosen_wali')->paginate(10);
        $data = array (
            'active_home' => 'active',
            'title' => 'Kelola Akun Dosen Wali',
            'doswal' => $doswal,
        );
        return view('operator/kelolaAkun/keloladosenWali', $data);
    }

    function storemhs(Request $request){
        $data = $request->all();
        $data['role'] = 'mahasiswa';
        $data['password'] = bcrypt($data['password']);

        // Step 1: Create a new User record
        $user = User::create($data);
        
        // Step 2: Retrieve the User's ID
        $user_id = $user->id;

        $doswal_id = User::where('id', $data['doswal'])->first()->id;

        // Step 3: Create a Mahasiswa record and associate it with the User's ID
        Mahasiswa::create([
            'angkatan'=> $data['angkatan'],
            'user_id' => $user_id,
            'doswal' => $doswal_id,
            'jalur_masuk' => null,
            'email' => null,
            'no_hp' => null,
            'provinsi' => null,
            'kab_kota' => null,
            'alamat' => null,
        ]);
        PKL::create([
            'id_mahasiswa' => $user_id,
            'nilai' => null,
            'tanggal_lulus' => null,
            'status' => false,
            'scan_pkl' => null,

        ]);
        Skripsi::create([
            'id_mahasiswa' => $user_id,
            'nilai' => null,
            'tanggal_lulus' => null,
            'lama_studi' => null,
            'status' => false,
            'scan_skripsi' => null,
        ]);
        return redirect('/user/operator/kelolaMahasiswa');
    }

    function storedoswal(Request $request){
        $data = $request->all();
        $data['role'] = 'dosen_wali';
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('/user/operator/keloladosenWali');
    }
}