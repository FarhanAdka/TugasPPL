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
        $mahhasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $irs = IRS::where('id_mahasiswa', auth()->user()->id)->get();
        $data = [
                'active_side' => 'active',
                'title' => 'Data IRS',
                'active_user' => 'active',
                'irs' => $irs,
            ];
        return view('Dosen.IRSindex', $data);
    }

    public function indexVerifIRS()
    {
        $irs = IRS::where('status', false)->get(); // Menggunakan '->get()' untuk mengambil hasil query

        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi IRS',
            'active_user' => 'active',
            'irs' => $irs,
        ];

        return view('Dosen.IRSVerifindex', $data);
    }

    public function indexKHS()
    {
        $mahhasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $khs = KHS::where('id_mahasiswa', auth()->user()->id)->get();
        $data = [
            'active_side' => 'active',
            'title' => 'Data KHS',
            'active_user' => 'active',
            'mahasiswa'=>$mahhasiswa,
            'khs' => $khs
        ];
        return view('Dosen.KHSindex', $data);
    }

    public function indexVerifKHS()
    {
        $khs = KHS::where('status', false)->get(); // Menggunakan '->get()' untuk mengambil hasil query

        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi KHS',
            'active_user' => 'active',
            'khs' => $khs,
        ];

        return view('Dosen.KHSVerifindex', $data);
    }

    public function indexPKL()
    {
        $mahhasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $pkl = PKL::where('id_mahasiswa', auth()->user()->id)->get();
        $data = [
            'active_side' => 'active',
            'title' => 'Data PKL',
            'active_user' => 'active',
            'mahasiswa'=>$mahhasiswa,
            'pkl' => $pkl
        ];
        return view('Dosen.PKLindex', $data);
    }

    public function indexVerifPKL()
    {
        $pkl = PKL::where('status', false)->get(); // Menggunakan '->get()' untuk mengambil hasil query

        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi PKL',
            'active_user' => 'active',
            'pkl' => $pkl,
        ];

        return view('Dosen.PKLVerifindex', $data);
    }
    public function indexSkripsi()
    {
        $mahhasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $skripsi = Skripsi::where('id_mahasiswa', auth()->user()->id)->get();
        $data = [
            'active_side' => 'active',
            'title' => 'Data Skripsi',
            'active_user' => 'active',
            'mahasiswa'=>$mahhasiswa,
            'skripsi' => $skripsi
        ];
        return view('Dosen.Skripsiindex', $data);
    }

    public function indexVerifSkripsi()
    {
        $skripsi = Skripsi::where('status', false)->get(); // Menggunakan '->get()' untuk mengambil hasil query

        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi Skripsi',
            'active_user' => 'active',
            'skripsi' => $skripsi,
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
