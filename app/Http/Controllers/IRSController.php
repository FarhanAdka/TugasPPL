<?php

namespace App\Http\Controllers;

use App\Models\IRS;
use Illuminate\Http\Request;

class IRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $irs = IRS::where('id_mahasiswa', auth()->user()->id)->get();
        $data = [
                'active_side' => 'active',
                'title' => 'Data IRS',
                'active_user' => 'active',
                'irs' => $irs,
            ];
        //dd($irs);
        return view('mahasiswa/DataIRS', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semester = IRS::where('id_mahasiswa', auth()->user()->id)->pluck('semester_aktif')->toArray();
        $avail_semester = array_diff_assoc(['1', '2', '3', '4', '5', '6', '7', '8'], $semester);
        $data = array (
            'active_side' => 'active', 
            'active_user' => 'active',
            'title' => 'Isi IRS',
            'avail_semester' => $avail_semester,
        );
        //dd($avail_semester);
        return view('Mahasiswa/IsiIRS', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $irs = new IRS();
        $irs->id_mahasiswa = auth()->user()->id;
        $irs->jumlah_sks = $request->jumlah_sks;
        $irs->semester_aktif = $request->semester_aktif;
        $irs->save();
        return redirect()->route('IRS.index');
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
        //
    }
}
