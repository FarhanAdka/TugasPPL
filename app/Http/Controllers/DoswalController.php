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
            $irsMahasiswa = IRS::where('id_mahasiswa', $mhs->id)->where('status', true)->get();
            $irs = $irs->merge($irsMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Data IRS',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'irs' => $irs
        ];

        return view('DosenWali.IRSindex', $data);
    }

    public function indexVerifIRS()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $irs = collect();
        foreach ($mahasiswa as $mhs) {
            $irsMahasiswa = IRS::where('id_mahasiswa', $mhs->id)->where('status', false)->get();
            $irs = $irs->merge($irsMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi IRS',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'irs' => $irs
        ];

        return view('DosenWali.verifIRSindex', $data);
    }

    public function approveIRS($id)
    {
        $irs = IRS::find($id);
        if ($irs) {
            $irs->status = true; // Mengubah status dari 'false' menjadi 'true'
            $irs->save(); // Menyimpan perubahan pada IRS
        }

        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('Doswal.verifIRSindex')->with('success', 'IRS Berhasil Disetujui.');
    }

    public function deleteSingleIRS($id)
    {
        $irs = IRS::find($id);
        if ($irs) {
            $irs->delete();
            return redirect()->route('Doswal.verifIRSindex')->with('success', 'IRS berhasil dihapus.');
        } else {
            return redirect()->route('Doswal.verifIRSindex')->with('error', 'IRS tidak ditemukan.');
        }
    }

    public function indexKHS()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $khs = collect();
        foreach ($mahasiswa as $mhs) {
            $khsMahasiswa = KHS::where('id_mahasiswa', $mhs->id)->where('status', true)->get();
            $khs = $khs->merge($khsMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Data KHS',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'khs' => $khs
        ];
        return view('DosenWali.KHSindex', $data);
    }

    public function indexVerifKHS()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $khs = collect();
        foreach ($mahasiswa as $mhs) {
            $khsMahasiswa = KHS::where('id_mahasiswa', $mhs->id)->where('status', false)->get();
            $khs = $khs->merge($khsMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi KHS',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'khs' => $khs
        ];

        return view('DosenWali.verifKHSindex', $data);
    }

    public function approveKHS($id)
    {
        $khs = KHS::find($id);
        if ($khs) {
            $khs->status = true; // Mengubah status dari 'false' menjadi 'true'
            $khs->save(); // Menyimpan perubahan pada KHS
        }

        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('Doswal.verifKHSindex')->with('success', 'KHS Berhasil Disetujui.');
    }

    public function deleteSingleKHS($id)
    {
        $khs = KHS::find($id);
        if ($khs) {
            $khs->delete();
            return redirect()->route('Doswal.verifKHSindex')->with('success', 'KHS berhasil dihapus.');
        } else {
            return redirect()->route('Doswal.verifKHSindex')->with('error', 'KHS tidak ditemukan.');
        }
    }

    public function indexPKL()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $pkl = collect();
        foreach ($mahasiswa as $mhs) {
            $pklMahasiswa = PKL::where('id_mahasiswa', $mhs->id)->where('status', true)->get();
            $pkl = $pkl->merge($pklMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Data PKL',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'pkl' => $pkl
        ];
        return view('DosenWali.PKLindex', $data);
    }

    
    public function indexVerifPKL()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $pkl = collect();
        foreach ($mahasiswa as $mhs) {
            $pklMahasiswa = PKL::where('id_mahasiswa', $mhs->id)->where('status', false)->get();
            $pkl = $pkl->merge($pklMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi PKL',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'pkl' => $pkl
        ];
        return view('DosenWali.VerifPKLindex', $data);
    }

    public function approvePKL($id)
    {
        $pkl = PKL::find($id);
        if ($pkl) {
            $pkl->status = true; // Mengubah status dari 'false' menjadi 'true'
            $pkl->save(); // Menyimpan perubahan pada pkl
        }
        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('Doswal.indexVerifPKL')->with('success', 'PKL Berhasil Disetujui.');
    }

    public function deleteSinglePKL($id)
    {
        $pkl = PKL::find($id); // Temukan entitas PKL berdasarkan ID
        if ($pkl) {
            $pkl->delete(); // Hapus entitas PKL jika ditemukan
            return redirect()->route('Doswal.verifPKLindex')->with('success', 'PKL berhasil dihapus.');
        } else {
            return redirect()->route('Doswal.verifPKLindex')->with('error', 'PKL tidak ditemukan.');
        }
    }

    public function indexSkripsi()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $skripsi = collect();
        foreach ($mahasiswa as $mhs) {
            $skripsiMahasiswa = Skripsi::where('id_mahasiswa', $mhs->id)->where('status', true)->get();
            $skripsi = $skripsi->merge($skripsiMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Data Skripsi',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'skripsi' => $skripsi
        ];
        return view('DosenWali.Skripsiindex', $data);
    }

    public function indexVerifSkripsi()
    {
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        $skripsi = collect();
        foreach ($mahasiswa as $mhs) {
            $skripsiMahasiswa = Skripsi::where('id_mahasiswa', $mhs->id)->where('status', false)->get();
            $skripsi = $skripsi->merge($skripsiMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi Skripsi',
            'active_user' => 'active',
            'mahasiswa'=>$mahasiswa,
            'skripsi' => $skripsi
        ];

        return view('DosenWali.verifSkripsiindex', $data);
    }

    public function approveSkripsi($id)
    {
        $skripsi = Skripsi::find($id);
        if ($skripsi) {
            $skripsi->status = true; // Mengubah status dari 'false' menjadi 'true'
            $skripsi->save(); // Menyimpan perubahan pada Skripsi
        }

        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('Doswal.verifSkripsiindex')->with('success', 'Skripsi Berhasil Disetujui.');
    }

    public function deleteSingleSkripsi($id)
    {
        $skripsi = Skripsi::find($id);
        if ($skripsi) {
            $skripsi->delete();
            return redirect()->route('Doswal.verifSkripsiindex')->with('success', 'Skripsi berhasil dihapus.');
        } else {
            return redirect()->route('Doswal.verifSkripsiindex')->with('error', 'Skripsi tidak ditemukan.');
        }
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
