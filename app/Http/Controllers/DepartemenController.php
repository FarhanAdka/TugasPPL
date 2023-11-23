<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\IRS;
use App\Models\KHS;
use App\Models\Mahasiswa;
use App\Models\PKL;
use App\Models\Skripsi;
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
        //dd($mahasiswa[0]->id);
        foreach ($mahasiswa as $mhs){
            $mhs->mahasiswa = Mahasiswa::where('user_id', $mhs->id)->first();
            $mhs->doswal = User::where('id', $mhs->mahasiswa->doswal)->first()->name;
        }
        //dd($mahasiswa[0]->mahasiswa->angkatan);
        // $mhs = Mahasiswa::where('user_id', $mahasiswa->id)->first();
        // $doswal = User::where('id', $mhs->doswal)->first()->name;
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
        $smt_irs = $irs->pluck('semester_aktif')->toArray();
        $smt_khs = $khs->pluck('semester_aktif')->toArray();
        $smt = array_unique(array_intersect($smt_irs, $smt_khs));
        $smt_pkl = PKL::where('id_mahasiswa', $mahasiswa->user_id)->pluck('semester')->toArray();
        $smt_skripsi = Skripsi::where('id_mahasiswa', $mahasiswa->user_id)->pluck('lama_studi')->toArray();
        //dd($smt_skripsi[0]);
        $doswal = User::where('id', $mahasiswa->doswal)->first();
        //dd(isset($khs[]));
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
            'smt' => $smt,
            'smt_pkl' => $smt_pkl[0],
            'smt_skripsi' => $smt_skripsi[0],
        );
        return view('Departemen/detilMahasiswa', $data);
        //dd($khs);
    }

}
