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
        //$pkl = PKL::all();
        $current_year = date('Y');
        //dd($current_year);
        $tahun_shown = array();
        for ($i = intval($current_year); $i >= intval($current_year) - 6; $i--) {
            $mahasiswa[$i] = Mahasiswa::where('angkatan', strval($i))->get();
            $tahun_shown[] = $i;
        }

        // dd($mahasiswa);
        $mhs_Aktif = 0;
        $mhs_Cuti = 0;
        $mhs_Mangkir = 0;
        $mhs_DO = 0;
        $mhs_UndurDiri = 0;
        $mhs_Lulus = 0;
        $mhs_Meninggal = 0;
        $lulus_pkl = 0;
        $lulus_skripsi = 0;
        foreach ($mahasiswa as $key => $value) {
            //$mahasiswa[$key]->name = User::where('id', $value[0]->user_id)->first()->name;
            $pkl[$key]['sudah'] = array();
            $pkl[$key]['belum'] = array();
            $status[$key]['Aktif'] = array();
            $status[$key]['Cuti'] = array();
            $status[$key]['Mangkir'] = array();
            $status[$key]['Do'] = array();
            $status[$key]['Undur_diri'] = array();
            $status[$key]['Lulus'] = array();
            $status[$key]['Meninggal_dunia'] = array();
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


                $data_status = Mahasiswa::where('user_id', $value2->user_id)->get()->first();
                // dd($data_skripsi);
                $data_status->nama = User::where('id', $value2->user_id)->first()->name;
                $data_status->nim = User::where('id', $value2->user_id)->first()->username;
                $data_status->angkatan = $value2->angkatan;
                // if ($data_status != null) {
                //     if ($data_status->status) {
                //         $status[$key]['Aktif'][] = $data_status;
                //         $mhs_Aktif++;
                //     } else {
                //         $skripsi[$key]['belum'][] = $data_skripsi;
                //     }
                // }
                if ($data_status != null) {
                    if ($data_status->status == "Aktif") {
                        $status[$key]['Aktif'][] = $data_status;
                        $mhs_Aktif++;
                    } elseif ($data_status->status == "Cuti") {
                        $status[$key]['Cuti'][] = $data_status;
                        $mhs_Cuti++;
                    } elseif ($data_status->status == "Mangkir") {
                        $status[$key]['Mangkir'][] = $data_status;
                        $mhs_Mangkir++;
                    } elseif ($data_status->status == "Do") {
                        $status[$key]['Do'][] = $data_status;
                        $mhs_DO++;
                    } elseif ($data_status->status == "Undur_diri") {
                        $status[$key]['Undur_diri'][] = $data_status;
                        $mhs_UndurDiri++;
                    } elseif ($data_status->status == "Lulus") {
                        $status[$key]['Lulus'][] = $data_status;
                        $mhs_Lulus++;
                    } else {
                        $skripsi[$key]['Meninggal_dunia'][] = $data_skripsi;
                        $mhs_Meninggal++;
                    }
                }
                
                

            }
        }


        $mahasiswaa = User::where('role', 'mahasiswa')->get();
        //dd($mahasiswa[0]);
        foreach ($mahasiswaa as $mhs){
            $mhs->mahasiswaa = Mahasiswa::where('user_id', $mhs->id)->first();
            $mhs->doswal = User::where('id', $mhs->mahasiswaa->doswal)->first()->name;
            $mhs->user_id = User::where('id', $mhs->mahasiswaa->user_id)->first()->username;
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
            'UserName' => 'INFORMATIKA',
            'Title' => 'Data Mahasiswa',
            'mahasiswaa' => $mahasiswaa,
            'mahasiswa' => $mahasiswa,
            'pkl' => $pkl,
            'skripsi' => $skripsi,
            'status' => $status,
            'mhs_Aktif' => $mhs_Aktif,
            'mhs_Cuti' => $mhs_Cuti,
            'mhs_Mangkir' => $mhs_Mangkir,
            'mhs_DO' => $mhs_DO,
            'mhs_Undur_diri' => $mhs_UndurDiri,
            'mhs_Lulus' => $mhs_Lulus,
            'mhs_Meninggal' => $mhs_Meninggal,
            'tahun_shown' => $tahun_shown,
            'lulus_pkl' => $lulus_pkl,
            'lulus_skripsi' => $lulus_skripsi,
        );
        //
        return view('Departemen/DataMahasiswa', $data);
    }

    public function ProfilDepartemen()
    {
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => 'INFORMATIKA',
            'Title' => 'Profil Departemen',
        );
         return view('Departemen/ProfilDepartemen', $data);
    }


    public function ProgresPKL()
    {
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
        $pkll = PKL::where('status', true)->get();
        // dd($pkll);
        foreach ($pkll as $p) {
            // dd($p->id_mahasiswa);
            $p->mahasiswa = Mahasiswa::where('user_id', $p->id_mahasiswa)->get()->first();
            // dd($p->mahasiswa);
            $p->mahasiswa->nim = User::where('id', $p->mahasiswa->user_id)->get()->first()->username;
            $p->mahasiswa->doswal = User::where('id', $p->mahasiswa->doswal)->get()->first()->name;
            $p->mahasiswa->nama = User::where('id', $p->mahasiswa->user_id)->get()->first()->name;
        }
        // dd($pkl[2021]['sudah'][0]);
        // dd($skripsi);
        // dd($tahun_shown);
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => 'INFORMATIKA',
            'Title' => 'Lulus Belum PKL',
            'pkl' => $pkl,
            'skripsi' => $skripsi,
            'tahun_shown' => $tahun_shown,
            'mahasiswa' => $mahasiswa,
            'lulus_pkl' => $lulus_pkl,
            'lulus_skripsi' => $lulus_skripsi,
            'pkll' => $pkll,
        );
         return view('Departemen/ProgresPKL', $data);
    }

    public function ProgresSkripsi()
    {
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
        $pkll = PKL::where('status', true)->get();
        foreach ($pkll as $p) {
            $p->mahasiswa = Mahasiswa::where('user_id', $p->id_mahasiswa)->get()->first();
            $p->mahasiswa->nim = User::where('id', $p->mahasiswa->user_id)->get()->first()->username;
            $p->mahasiswa->doswal = User::where('id', $p->mahasiswa->doswal)->get()->first()->name;
            $p->mahasiswa->nama = User::where('id', $p->mahasiswa->user_id)->get()->first()->name;
        }
        $skripsii = Skripsi::where('status', true)->get();
        foreach ($skripsii as $s) {
            $s->mahasiswa = Mahasiswa::where('user_id', $s->id_mahasiswa)->get()->first();
            $s->mahasiswa->nim = User::where('id', $s->mahasiswa->user_id)->get()->first()->username;
            $s->mahasiswa->doswal = User::where('id', $s->mahasiswa->doswal)->get()->first()->name;
            $s->mahasiswa->nama = User::where('id', $s->mahasiswa->user_id)->get()->first()->name;
        }

      
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => 'INFORMATIKA',
            'Title' => 'Lulus Belum Skripsi',
            'skripsii' => $skripsii,
            'pkl' => $pkl,
            'skripsi' => $skripsi,
            'tahun_shown' => $tahun_shown,
            'mahasiswa' => $mahasiswa,
            'lulus_pkl' => $lulus_pkl,
            'lulus_skripsi' => $lulus_skripsi,
            'pkll' => $pkll,
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
        $skripsi = Skripsi::where('id_mahasiswa', $mahasiswa->user_id)->first();
        $pkl = PKL::where('id_mahasiswa', $mahasiswa->user_id)->first();
        // dd($smt_skripsi);
        //dd($smt_skripsi[0]);
        $doswal = User::where('id', $mahasiswa->doswal)->first();
        //dd(isset($khs[]));
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => 'INFORMATIKA',
            'Title' => 'Progres Studi',
            'user' => $user,
            'mahasiswa' => $mahasiswa,
            'khs' => $khs,
            'irs' => $irs,
            'nama_doswal'=>$doswal->name,
            'smt' => $smt,
            'smt_pkl' => $smt_pkl,
            'smt_skripsi' => $smt_skripsi,
            'skripsi' => $skripsi,
            'pkl' => $pkl,
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

    public function PKL(string $id)
    {
        $pkl = PKL::find($id);

        // Perform a check if the authenticated user has access to this file
        if (auth()->user()->role != 'departemen') {
            return Redirect::back()->with('error', 'Unauthorized access');
        }

        // Get the file path
        $filePath = storage_path('app/' . $pkl->scan_pkl);

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

    public function Skripsi(string $id){
        $skripsi = Skripsi::find($id);

        // Perform a check if the authenticated user has access to this file
        if (auth()->user()->role != 'departemen') {
            return Redirect::back()->with('error', 'Unauthorized access');
        }

        // Get the file path
        $filePath = storage_path('app/' . $skripsi->scan_skripsi);

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
