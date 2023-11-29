<?php

namespace App\Http\Controllers;

use App\Models\KHS;
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
        $khs = KHS::where('id_mahasiswa', auth()->user()->id)->get();
        $data = [
            'active_side' => 'active',
            'title' => 'Data KHS',
            'active_user' => 'active',
            'khs' => $khs,
        ];

        return view('mahasiswa/DataKHS', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semester = KHS::where('id_mahasiswa', auth()->user()->id)->pluck('semester_aktif')->toArray();
        sort($semester);
        //dd($semester);
        $avail_semester = array_diff_assoc([1, 2, 3, 4, 5, 6, 7, 8], $semester);
        $data = array(
            'active_side' => 'active',
            'active_user' => 'active',
            'title' => 'Isi KHS',
            'avail_semester' => $avail_semester,
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
            $data = [
                'active_side' => 'active',
                'title' => 'Data KHS',
                'active_user' => 'active',
            ];
            return view('mahasiswa/DataKHS', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $khs = KHS::find($id);
        $semester = KHS::where('id_mahasiswa', auth()->user()->id)->pluck('semester_aktif')->toArray();
        $avail_semester = array_diff_assoc(['1', '2', '3', '4', '5', '6', '7', '8'], $semester);
        $data = [
            'active_side' => 'active',
            'title' => 'Edit KHS',
            'active_user' => 'active',
            'khs' => $khs,
            'avail_semester' => $avail_semester,
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

        return redirect()->route('KHS.index')->with('success', 'Data deleted successfully.'); // Ganti 'route_name' dengan nama rute yang ingin Anda tuju setelah penghapusan data.
    }

    public function download(string $id)
    {
        $khs = KHS::find($id);

        // Perform a check if the authenticated user has access to this file
        if (auth()->user()->id != $khs->id_mahasiswa) {
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
