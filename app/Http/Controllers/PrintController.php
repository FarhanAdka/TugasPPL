<?php

namespace App\Http\Controllers;

use App\Models\IRS;
use App\Models\KHS;
use App\Models\Mahasiswa;
use App\Models\PKL;
use App\Models\Skripsi;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function printBelumPKL(string $tahun)
    {
        $daftarmhs = Mahasiswa::where('angkatan', $tahun)->pluck('user_id')->toArray();

        $daftarpkl = [];
        foreach ($daftarmhs as $mhs) {
            $pkl = PKL::where('id_mahasiswa', $mhs)->first();
            if ($pkl && $pkl->status == false) {
                $mahasiswa = Mahasiswa::where('user_id', $mhs)->first();
                $mahasiswa->nim = User::where('id', $mhs)->first()->username;
                $mahasiswa->nama = User::where('id', $mhs)->first()->name;
                $mahasiswa->nilai = $pkl->nilai;
                $daftarpkl[] = $mahasiswa;
            }
        }
        // dd($daftarpkl)
        $pdf = PDF::loadView('Prints/BelumPKL', ['pkl' => $daftarpkl, 'tahun' => $tahun]);
        $date = date('d-m-Y');

        return $pdf->stream($tahun.'-belum-pkl-' . $date . '.pdf');
    }

    public function printLulusPKL(string $tahun){
        $daftarmhs = Mahasiswa::where('angkatan', $tahun)->pluck('user_id')->toArray();

        $daftarpkl = [];
        foreach ($daftarmhs as $mhs) {
            $pkl = PKL::where('id_mahasiswa', $mhs)->first();
            if ($pkl && $pkl->status == true) {
                $mahasiswa = Mahasiswa::where('user_id', $mhs)->first();
                $mahasiswa->nim = User::where('id', $mhs)->first()->username;
                $mahasiswa->nama = User::where('id', $mhs)->first()->name;
                $mahasiswa->nilai = $pkl->nilai;
                $daftarpkl[] = $mahasiswa;
            }
        }
        // dd($daftarpkl)
        $pdf = PDF::loadView('Prints/LulusPKL', ['pkl' => $daftarpkl, 'tahun' => $tahun]);
        $date = date('d-m-Y');

        return $pdf->stream($tahun . '-lulus-pkl-' . $date . '.pdf');
    }

    public function PrintRekapPKL(){
        $current_year = date('Y');
        //dd($current_year);
        $tahun_shown = array();
        for ($i = intval($current_year); $i >= intval($current_year) - 6; $i--) {
            $tahun_shown[] = $i;
        }
        // dd($tahun_shown);
        $pkl = array();
        foreach ($tahun_shown as $key => $tahun) {
            $mhsperang = Mahasiswa::where('angkatan', $tahun)->pluck('user_id')->toArray();
            $pkl[$tahun]['sudah'] = PKL::whereIn('id_mahasiswa', $mhsperang)->where('status', true)->count();
            $pkl[$tahun]['belum'] = PKL::whereIn('id_mahasiswa', $mhsperang)->where('status', false)->count();
        }
        // dd($pkl);
        $pdf = PDF::loadView('Prints/RekapPKL', ['pkl' => $pkl, 'tahun' => $tahun_shown])->setPaper('a4', 'landscape');;
        $date = date('d-m-Y');

        return $pdf->stream('rekap-pkl-' . $date . '.pdf');
    }

    public function printProgresStudi(string $mahasiswa){
        $data = array();
        $data['nama'] = User::where('id', $mahasiswa)->first()->name;
        $data['nim'] = User::where('id', $mahasiswa)->first()->username;
        $data['angkatan'] = Mahasiswa::where('user_id', $mahasiswa)->first()->angkatan;
        $data['dosen_wali'] = User::where('id', Mahasiswa::where('user_id', $mahasiswa)->first()->doswal)->first()->name;
        $semester = array();
        for ($i = 1; $i <= 14; $i++) {
            $semester[$i]['irs']= IRS::where('id_mahasiswa', $mahasiswa)->where('semester_aktif', $i)->where('status', true)->exists();
            $semester[$i]['khs']= KHS::where('id_mahasiswa', $mahasiswa)->where('semester_aktif', $i)->where('status', true)->exists();
            $semester[$i]['skripsi']= Skripsi::where('id_mahasiswa', $mahasiswa)->where('semester', $i)->where('status', true)->exists();
            $semester[$i]['pkl'] = PKL::where('id_mahasiswa', $mahasiswa)->where('semester', $i)->where('status', true)->exists();
        }
        $data['semester'] = $semester;
        // dd($data);
        // return view('Prints/ProgresStudi', ['data' => $data]);

        $pdf = PDF::loadView('Prints/ProgresStudi', ['data' => $data])->setPaper('a4', 'portrait');;
        $date = date('d-m-Y');
        return $pdf->stream($data['nim'] . '-progres-studi-' . $date . '.pdf');
    }
}
