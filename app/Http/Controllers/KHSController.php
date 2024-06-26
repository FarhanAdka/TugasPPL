<?php

namespace App\Http\Controllers;

use App\Models\KHS;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Redirect;

class KHSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userMhs = User::where('id', auth()->user()->id)->get()->first();
        
        $khs = KHS::where('id_mahasiswa', auth()->user()->id)->get();
        $foto = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $data = [
            'active_side' => 'active',
            'title' => 'Data KHS',
            'active_user' => 'active',
            'khs' => $khs,
            'UserName' => $userMhs->name,
            'foto' => $foto->foto,
        ];

        return view('mahasiswa/DataKHS', $data);
    }

    public function indexVerif()
    {
        $userDoswal = User::where('id', auth()->user()->id)->get()->first();
        
        $khs = KHS::where('status', false)->get();
        foreach ($khs as $k) {
            $k->mahasiswa = Mahasiswa::where('user_id', $k->id_mahasiswa)->get()->first();
            $k->mahasiswa->nim = User::where('id', $k->mahasiswa->user_id)->get()->first()->username;
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Verifikasi KHS',
            'active_user' => 'active',
            'UserName' => $userDoswal->name,
            // 'mahasiswa'=>$mahasiswa,
            // 'irs' => $irs
            // 'nim' => $nim
        ];
        return view('DosenWali.verifKHSindex', compact('khs'), $data); // Menampilkan view dengan data IRS yang sudah diambil
    }

    public function indexDosen()
    {
        $userDoswal = User::where('id', auth()->user()->id)->get()->first();
        
        $khs = KHS::where('status', true)->get();
        foreach ($khs as $k) {
            $k->mahasiswa = Mahasiswa::where('user_id', $k->id_mahasiswa)->get()->first();
            $k->mahasiswa->nim = User::where('id', $k->mahasiswa->user_id)->get()->first()->username;
        }   
        $data = [
            'active_side' => 'active',
            'title' => 'List KHS',
            'active_user' => 'active',
            'UserName' => $userDoswal->name,
            // 'mahasiswa'=>$mahasiswa,
            // 'irs' => $irs
            // 'nim' => $nim
        ];

        return view('DosenWali.KHSindex', compact('khs'), $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userMhs = User::where('id', auth()->user()->id)->get()->first();
        
        $semester = KHS::where('id_mahasiswa', auth()->user()->id)->pluck('semester_aktif')->toArray();
        sort($semester);
        //dd($semester);
        $avail_semester = array_diff_assoc([1, 2, 3, 4, 5, 6, 7, 8,9, 10, 11, 12, 13, 14], $semester);
        $foto = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $data = array(
            'active_side' => 'active',
            'active_user' => 'active',
            'title' => 'Isi KHS',
            'avail_semester' => $avail_semester,
            'UserName' => $userMhs->name,
            'foto' => $foto->foto,
        );
        return view('Mahasiswa/IsiKHS', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $khs = new KHS();
        $khs->id_mahasiswa = auth()->user()->id;
        $khs->jumlah_sks = $request->jumlah_sks;
        $khs->ip = $request->ip;
        $khs->ipk = $request->ipk;
        $khs->semester_aktif = $request->semester_aktif;
        $khs->sks_kumulatif = $request->sksk;
        //dd($request->hasFile('scan_khs'));
        if ($request->hasFile('scan_khs')) {
            $file = $request->file('scan_khs');
            $path = $file->store('khs_files'); // 'irs_files' is the directory within the storage folder where the file will be stored
            $khs->scan_khs = $path; // Assuming 'file_path' is the column in your IRS model to store the file path
        }
        $khs->save();
        return redirect()->route('KHS.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { {
        $userMhs = User::where('id', auth()->user()->id)->get()->first();
        
            $data = [
                'active_side' => 'active',
                'title' => 'Data KHS',
                'active_user' => 'active',
                'UserName' => $userMhs->name,
            ];
            return view('mahasiswa/DataKHS', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userMhs = User::where('id', auth()->user()->id)->get()->first();
        
        $khs = KHS::find($id);
        $semester = KHS::where('id_mahasiswa', auth()->user()->id)->pluck('semester_aktif')->toArray();
        $avail_semester = array_diff_assoc(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14' ], $semester);
        $foto = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $data = [
            'active_side' => 'active',
            'title' => 'Edit KHS',
            'active_user' => 'active',
            'khs' => $khs,
            'avail_semester' => $avail_semester,
            'UserName' => $userMhs->name,
            'foto' => $foto->foto,
        ];
        return view('mahasiswa/EditKHS', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $khs = KHS::findOrFail($id);
        $khs->fill($request->post())->save();

        // Fetch the updated KHS data
        //$updatedIRS = KHS::where('id_mahasiswa', auth()->user()->id)->get();
        return redirect()->route('KHS.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $khs = khs::find($id); // Ganti Mahasiswa dengan model yang Anda gunakan

        if (!$khs) {
            return redirect()->back()->with('error', 'Data not found.');
        }

        $khs->delete();

        return redirect()->back()->with('success', 'Data deleted successfully.'); // Ganti 'route_name' dengan nama rute yang ingin Anda tuju setelah penghapusan data.
    }

    public function download(string $id)
    {
        $khs = KHS::find($id);

        // Perform a check if the authenticated user has access to this file
        if (auth()->user()->id != $khs->id_mahasiswa && auth()->user()->role != 'dosen_wali' && auth()->user()->role != 'departemen') {
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

    public function approve($id){
        $khs = KHS::find($id);

        $khs->status = true;
        $khs->save();

        return redirect()->back()->with('success', 'KHS telah disetujui');
    }
    public function delete($id){
        $khs=KHS::find($id);
        if ($khs) {
            $khs->delete();
            return redirect()->back()->with('success', 'KHS berhasil dihapus.');
        }
    }
}
