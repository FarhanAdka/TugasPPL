<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\User;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function DataMHS()
    {
        $mahasiswa = User::where('role', 'mahasiswa')->paginate(10);
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
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => '\\\UserName///',
            'Title' => 'Progres PKL',
        );
         return view('Departemen/ProgresPKL', $data);
    }

    public function ProgresSkripsi()
    {
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => '\\\UserName///',
            'Title' => 'Pregres Skripsi',
        );
         return view('Departemen/ProgresSkripsi', $data);
    }

    public function index()
    {
 
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
    public function show(Departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departemen $departemen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departemen $departemen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departemen $departemen)
    {
        //
    }
}
