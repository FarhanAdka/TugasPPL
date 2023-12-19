<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    //Profile
    function Profile(){
        $userMhs = User::where('id', auth()->user()->id)->get()->first();
        $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        
        $doswal = User::where('id', $mahasiswa->first()->doswal)->get()->first();
        //dd($mahasiswa);
        $data = array (
            // dd($mahasiswa->foto);
            'active_home' => 'active',
            'title' => 'Profile',
            'mahasiswa' => $mahasiswa,
            'userMhs' => $userMhs,
            'nama_doswal' => $doswal->name,
            'UserName' => $userMhs->name,
            'foto' => $mahasiswa->foto,
            
        );
        //dd($doswal);

        
        return view('Mahasiswa/ProfileMahasiswa', $data);
    }

    function update(Request $request){
        $data = $request->all();
        // dd($data);
        $user = User::where('id', auth()->user()->id)->get()->first();
        $mhs = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $user->has_setup = true;
        $user->name = $data['nama'];
        $user->save();
        //dd($mhs);
        $mhs->update($data);
        $mhs->save();

        return redirect()->route('mahasiswa.profile');
        //dd($request->all());
    }
    //IRS
    function IsiIRS(){
        $foto = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $data = array (
            'active_side' => 'active', 
            'active_user' => 'active',
            'title' => 'Isi IRS',
            'foto' => $foto->foto,
            
        );
        return view('Mahasiswa/IsiIRS', $data);
    }
    function DataIRS(){
        $foto = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $data = array (
            'active_side' => 'active',
            'active_user' => 'active',
            'title' => 'Data IRS',
            'foto' => $foto->foto,
        );
        return view('Mahasiswa/DataIRS', $data);
    }
    //KHS
    function IsiKHS(){
        $foto = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $data = array (
            'active_side' => 'active',
            'active_user' => 'active',
            'foto' => $foto->foto,
            'title' => 'Isi KHS',
        );
        return view('Mahasiswa/IsiKHS', $data);
    }
    function DataKHS(){
        $foto = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $data = array (
            'active_side' => 'active',
            'title' => 'Data KHS',
            'foto' => $foto->foto,
        );
        return view('Mahasiswa/DataKHS', $data);
    }

    function PKL(){
        $foto = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $data = array (
            'active_home' => 'active',
            'title' => 'Data PKL',
            'foto' => $foto->foto,
        );
        return view('Mahasiswa/PKL', $data);
    }

    function Skripsi(){
        $foto = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $data = array (
            'active_home' => 'active',
            'title' => 'Data Skripsi',
            'foto' => $foto->foto,
        );
        return view('Mahasiswa/Skripsi', $data);
    }

    function uploadFoto(Request $request)
    {
        
        $mhs = Mahasiswa::where('user_id', auth()->user()->id)->first(); // Using first() directly fetches the first record, no need for get().
        // dd($request->all());
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/photos'); // Store the file in storage/app/public/photos
            // dd($fotoPath);
            $fotoPath = str_replace('public/', '/storage/', $fotoPath); // Remove 'public/' from the path to store it properly in the database
            if ($mhs->foto != null && $mhs->foto != '/assets/compiled/jpg/1.jpg') {
                Storage::delete($mhs->foto);
            }
            $mhs->foto = $fotoPath; // Assign the path to the database field
        }

        $mhs->save();
        return redirect()->route('mahasiswa.profile');
    }
}
