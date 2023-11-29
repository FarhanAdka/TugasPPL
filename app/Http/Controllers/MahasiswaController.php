<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //Profile
    function Profile(){
        $userMhs = User::where('id', auth()->user()->id)->get()->first();
        $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $doswal = User::where('id', $mahasiswa->first()->doswal)->get()->first();
        //dd($mahasiswa);
        $data = array (
            'active_home' => 'active',
            'title' => 'Profile',
            'mahasiswa' => $mahasiswa,
            'userMhs' => $userMhs,
            'nama_doswal' => $doswal->name,
            'UserName' => $userMhs->name,
            
        );
        //dd($doswal);

        
        return view('Mahasiswa/ProfileMahasiswa', $data);
    }

    function update(Request $request){
        $data = $request->all();
        $user = User::where('id', auth()->user()->id)->get()->first();
        $mhs = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $user->has_setup = true;
        $user->save();
        //dd($mhs);
        $mhs->update($data);
        $mhs->save();

        return redirect()->route('mahasiswa.profile');
        //dd($request->all());
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
