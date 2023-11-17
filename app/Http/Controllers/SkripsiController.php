<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Redirect;

class SkripsiController extends Controller
{
    function index(){
        $skripsi = Skripsi::where('id_mahasiswa', auth()->user()->id)->get();
        $data = [
            'active_side' => 'active',
            'title' => 'Data Skripsi',
            'active_user' => 'active',
            'skripsi' => $skripsi
        ];
    }

    public function create()
    {
        $data = array (
            'active_side' => 'active', 
            'active_user' => 'active',
            'title' => 'Isi Skripsi'
        );
        return view('Mahasiswa/IsiSkripsi', $data);
    }
    public function show(string $id)
    {
        {
            $data = [
                'active_side' => 'active',
                'title' => 'Data Skripsi',
                'active_user' => 'active',
            ];
            return view('mahasiswa/DataSkripsi', $data);
        }
    }
    public function edit(string $id)
    {
        $skripsi = Skripsi::find($id);
        $data = [
            'active_side' => 'active',
            'title' => 'Edit Skripsi',
            'active_user' => 'active',
            'skripsi' => $skripsi
        ];
        return view('mahasiswa/EditSkripsi', $data);
    }
    public function update(Request $request, string $id)
    {
        $skripsi = Skripsi::findOrFail($id);
        $skripsi->fill($request->post())->save();

        return redirect()->route('Skripsi.index');
    }

    public function destroy(string $id)
    {
        $skripsi = skripsi::find($id); // Ganti Mahasiswa dengan model yang Anda gunakan

    if (!$skripsi) {
        return redirect()->back()->with('error', 'Data not found.');
    }

    $skripsi->delete();

    return redirect()->route('Skripsi.index')->with('success', 'Data deleted successfully.'); // Ganti 'route_name' dengan nama rute yang ingin Anda tuju setelah penghapusan data.
    }

    public function download(string $id)
    {
        $skripsi = Skripsi::find($id);

        // Perform a check if the authenticated user has access to this file
        if (auth()->user()->id != $skripsi->id_mahasiswa) {
            return Redirect::back()->with('error', 'Unauthorized access');
        }

        // Get the file path
        $filePath = storage_path('app/' . $skripsi->scan_khs);

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