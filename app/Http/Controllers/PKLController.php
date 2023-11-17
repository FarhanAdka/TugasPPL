<?php

namespace App\Http\Controllers;

use App\Models\PKL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Redirect;

class PKLController extends Controller
{
    function index(){
        $pkl = PKL::where('id_mahasiswa', auth()->user()->id)->get();
        $data = [
            'active_side' => 'active',
            'title' => 'Data PKL',
            'active_user' => 'active',
            'pkl' => $pkl
        ];
    }

    public function create()
    {
        $data = array (
            'active_side' => 'active', 
            'active_user' => 'active',
            'title' => 'Isi PKL'
        );
        return view('Mahasiswa/IsiPKL', $data);
    }
    public function show(string $id)
    {
        {
            $data = [
                'active_side' => 'active',
                'title' => 'Data PKL',
                'active_user' => 'active',
            ];
            return view('mahasiswa/DataPKL', $data);
        }
    }
    public function edit(string $id)
    {
        $pkl = PKL::find($id);
        $data = [
            'active_side' => 'active',
            'title' => 'Edit PKL',
            'active_user' => 'active',
            'pkl' => $pkl
        ];
        return view('mahasiswa/EditPKL', $data);
    }
    public function update(Request $request, string $id)
    {
        $pkl = PKL::findOrFail($id);
        $pkl->fill($request->post())->save();

        // Fetch the updated KHS data
        //$updatedIRS = KHS::where('id_mahasiswa', auth()->user()->id)->get();
        return redirect()->route('PKL.index');
    }

    public function destroy(string $id)
    {
        $pkl = pkl::find($id); // Ganti Mahasiswa dengan model yang Anda gunakan

    if (!$pkl) {
        return redirect()->back()->with('error', 'Data not found.');
    }

    $pkl->delete();

    return redirect()->route('PKL.index')->with('success', 'Data deleted successfully.'); // Ganti 'route_name' dengan nama rute yang ingin Anda tuju setelah penghapusan data.
    }

    public function download(string $id)
    {
        $pkl = PKL::find($id);

        // Perform a check if the authenticated user has access to this file
        if (auth()->user()->id != $pkl->id_mahasiswa) {
            return Redirect::back()->with('error', 'Unauthorized access');
        }

        // Get the file path
        $filePath = storage_path('app/' . $pkl->scan_khs);

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
