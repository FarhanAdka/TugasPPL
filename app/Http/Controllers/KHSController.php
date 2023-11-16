<?php

namespace App\Http\Controllers;

use App\Models\KHS;
use Illuminate\Http\Request;

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
        $avail_semester = KHS::where('id_mahasiswa', auth()->user()->id)->pluck('semester_aktif')->toArray();
        $data = array (
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
        $khs->save();
        return redirect()->route('KHS.index');
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
    public function destroy(string $id)
    {
        $khs = khs::find($id); // Ganti Mahasiswa dengan model yang Anda gunakan

    if (!$khs) {
        return redirect()->back()->with('error', 'Data not found.');
    }

    $khs->delete();

    return redirect()->route('KHS.index')->with('success', 'Data deleted successfully.'); // Ganti 'route_name' dengan nama rute yang ingin Anda tuju setelah penghapusan data.
    }
}
