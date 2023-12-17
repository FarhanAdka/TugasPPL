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
use Illuminate\Support\Facades\Redirect;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function DataMHS()
    {
        $mahasiswa = User::where('role', 'mahasiswa')->get();
        //dd($mahasiswa[0]);
        foreach ($mahasiswa as $mhs){
            $mhs->mahasiswa = Mahasiswa::where('user_id', $mhs->id)->first();
            $mhs->doswal = User::where('id', $mhs->mahasiswa->doswal)->first()->name;
            //var_dump($mhs->doswal);
            //dd($mhs->doswal);
        }
        //dd($mahasiswa);
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
        $pkl = PKL::where('status', true)->get();
        foreach ($pkl as $p) {
            $p->mahasiswa = Mahasiswa::where('id', $p->id_mahasiswa)->get()->first();
            $p->mahasiswa->nim = User::where('id', $p->mahasiswa->user_id)->get()->first()->username;
            $p->mahasiswa->doswal = User::where('id', $p->mahasiswa->doswal)->get()->first()->name;
            $p->mahasiswa->nama = User::where('id', $p->mahasiswa->user_id)->get()->first()->name;
        }
        //dd($pkl);
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => '\\\UserName///',
            'Title' => 'Progres PKL',
            'pkl' => $pkl,
        );
         return view('Departemen/ProgresPKL', $data);
    }

    public function ProgresSkripsi()
    {
        $skripsi = Skripsi::where('status', true)->get();
        foreach ($skripsi as $s) {
            $s->mahasiswa = Mahasiswa::where('id', $s->id_mahasiswa)->get()->first();
            $s->mahasiswa->nim = User::where('id', $s->mahasiswa->user_id)->get()->first()->username;
            $s->mahasiswa->doswal = User::where('id', $s->mahasiswa->doswal)->get()->first()->name;
            $s->mahasiswa->nama = User::where('id', $s->mahasiswa->user_id)->get()->first()->name;
        }
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => '\\\UserName///',
            'Title' => 'Progres Skripsi',
            'skripsi' => $skripsi,
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
        if (PKL::where('id_mahasiswa', $mahasiswa->user_id)->first() != null){
            $smt_pkl = PKL::where('id_mahasiswa', $mahasiswa->user_id)->first()->semester;
        }
        else{
            $smt_pkl = 0;
        }
        // dd(Skripsi::where('id_mahasiswa', $mahasiswa->user_id)->first()->status);
        if (Skripsi::where('id_mahasiswa', $mahasiswa->user_id)->first()->status == true){
            $smt_skripsi = Skripsi::where('id_mahasiswa', $mahasiswa->user_id)->first()->semester;
        }
        else{
            $smt_skripsi = 0;
        }
        // dd($smt_skripsi);
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
            'smt_pkl' => $smt_pkl,
            'smt_skripsi' => $smt_skripsi,
        );
        return view('Departemen/detilMahasiswa', $data);
        //dd($khs);
    }

    public function IRS(string $id){
        $irs = IRS::find($id);

        // Perform a check if the authenticated user has access to this file
        if (auth()->user()->role != 'departemen') {
            return Redirect::back()->with('error', 'Unauthorized access');
        }

        // Get the file path
        $filePath = storage_path('app/' . $irs->scan_irs);

        // Check if the file exists
        if (!file_exists($filePath)) {
            return Redirect::back()->with('error', 'File not found');
        }

        // Set the appropriate headers to force download
        $headers = [
            'Content-Type' => 'application/octet-stream',
        ];

        // Return the file as a response with headers to force download
        return response()->file($filePath);
    }

    public function KHS(string $id)
    {
        $khs = KHS::find($id);

        // Perform a check if the authenticated user has access to this file
        if (auth()->user()->role != 'departemen') {
            return Redirect::back()->with('error', 'Unauthorized access');
        }

        // Get the file path
        $filePath = storage_path('app/' . $khs->scan_khs);

        // Check if the file exists
        if (!file_exists($filePath)) {
            return Redirect::back()->with('error', 'File not found');
        }

        // Set the appropriate headers to force download
        $headers = [
            'Content-Type' => 'application/octet-stream',
        ];

        // Return the file as a response with headers to force download
        return response()->file($filePath);
    }

}
