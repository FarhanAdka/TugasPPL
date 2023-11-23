<?php

namespace App\Http\Controllers;
use App\Models\IRS;
use App\Models\KHS;
use App\Models\PKL;
use App\Models\Skripsi;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class DoswalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexIRS()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $irs = collect();
        foreach ($mahasiswa as $mhs) {
            $irsMahasiswa = $mhs->irs; // Mendapatkan PKL dari setiap mahasiswa
            $irs = $irs->merge($irsMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Data IRS',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'irs' => $irs
        ];
    }

    public function indexVerifIRS()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $irs = collect();
        foreach ($mahasiswa as $mhs) {
            $irsMahasiswa = $mhs->irs->where('status', 'false')->get(); // Mendapatkan PKL dari setiap mahasiswa
            $irs = $irs->merge($irsMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi IRS',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'irs' => $irs
        ];

        return view('Dosen.IRSVerifindex', $data);
    }

    public function indexKHS()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $khs = collect();
        foreach ($mahasiswa as $mhs) {
            $khsMahasiswa = $mhs->khs; // Mendapatkan PKL dari setiap mahasiswa
            $khs = $khs->merge($khsMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Data KHS',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'khs' => $khs
        ];
        return view('Dosen.KHSindex', $data);
    }

    public function indexVerifKHS()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $khs = collect();
        foreach ($mahasiswa as $mhs) {
            $khsMahasiswa = $mhs->khs->where('status', 'false')->get(); // Mendapatkan PKL dari setiap mahasiswa
            $khs = $khs->merge($khsMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi KHS',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'khs' => $khs
        ];

        return view('Dosen.KHSVerifindex', $data);
    }

    public function indexPKL()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $pkl = collect();
        foreach ($mahasiswa as $mhs) {
            $pklMahasiswa = $mhs->pkl; // Mendapatkan PKL dari setiap mahasiswa
            $pkl = $pkl->merge($pklMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Data PKL',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'pkl' => $pkl
        ];
        return view('Dosen.PKLindex', $data);
    }

    
    public function indexVerifPKL()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $pkl = collect();
        foreach ($mahasiswa as $mhs) {
            $pklMahasiswa = $mhs->pkl->where('status', 'false')->get(); // Mendapatkan PKL dari setiap mahasiswa
            $pkl = $pkl->merge($pklMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi PKL',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'pkl' => $pkl
        ];
        return view('Dosen.VerifPKLindex', $data);
    }
    public function indexSkripsi()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $skripsi = collect();
        foreach ($mahasiswa as $mhs) {
            $skripsiMahasiswa = $mhs->skripsi; // Mendapatkan PKL dari setiap mahasiswa
            $skripsi = $skripsi->merge($skripsiMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Data Skripsi',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'skripsi' => $skripsi
        ];
        return view('Dosen.Skripsiindex', $data);
    }

    public function indexVerifSkripsi()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $skripsi = collect();
        foreach ($mahasiswa as $mhs) {
            $skripsiMahasiswa = $mhs->skripsi->where('status', 'false')->get(); // Mendapatkan PKL dari setiap mahasiswa
            $skripsi = $skripsi->merge($skripsiMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi Skripsi',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'skripsi' => $skripsi
        ];

        return view('Dosen.SkripsiVerifindex', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyIRS(string $id)
    {
        //
    }

    public function destroyKHS(string $id)
    {
        //
    }

    public function destroyPKL(string $id)
    {
        //
    }

    public function destroySkripsi(string $id)
    {
        //
    }
}
