<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\IRS;
use App\Models\KHS;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function DataMHS()
    {
        $mahasiswa = User::where('role', 'mahasiswa')->paginate(10);
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => '\\\UserName///',
            'Title' => 'Data Mahasiswa',
            'mahasiswa' => $mahasiswa,
        );
        //
        return view('Departemen/DataMahasiswa', $data);
    }

    public function ProfilDepartemen()
    {
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => '\\\UserName///',
            'Title' => 'Profil Departemen',
        );
         return view('Departemen/ProfilDepartemen', $data);
    }


    public function ProgresPKL()
    {
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => '\\\UserName///',
            'Title' => 'Progres PKL',
        );
         return view('Departemen/ProgresPKL', $data);
    }

    public function ProgresSkripsi()
    {
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => '\\\UserName///',
            'Title' => 'Pregres Skripsi',
        );
         return view('Departemen/ProgresSkripsi', $data);
    }

    public function ProgresStudi(string $mahasiswa){
        //dd($mahasiswa);
        $user = User::where('id', $mahasiswa)->first();
        $mahasiswa = Mahasiswa::where('user_id', $mahasiswa)->first();
        $khs = KHS::where('id_mahasiswa', $mahasiswa->user_id)->get();
        $irs = IRS::where('id_mahasiswa', $mahasiswa->user_id)->get();
        $doswal = User::where('id', $mahasiswa->doswal)->first();
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => '\\\UserName///',
            'Title' => 'Progres Studi',
            'user' => $user,
            'mahasiswa' => $mahasiswa,
            'khs' => $khs,
            'irs' => $irs,
            'nama_doswal'=>$doswal->name,
        );
        return view('Departemen/detilMahasiswa', $data);
        //dd($khs);
    }

}
