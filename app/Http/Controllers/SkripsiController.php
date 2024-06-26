<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Skripsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Redirect;

class SkripsiController extends Controller
{
    function index()
    {
        $user = User::where('id', auth()->user()->id)->get()->first();
        $skripsi = Skripsi::where('id_mahasiswa', auth()->user()->id)->get()->first();
            $skripsi->mahasiswa = Mahasiswa::where('user_id', $skripsi->id_mahasiswa)->get()->first();
            $skripsi->mahasiswa->nim = User::where('id', $skripsi->mahasiswa->user_id)->get()->first()->username;
        
        //dd($skripsi);
        $data = [
            'active_side' => 'active',
            'title' => 'Data Skripsi',
            'active_user' => 'active',
            'skripsi' => $skripsi,
            'UserName' => $user->name,
        ];
        return redirect()->route('skripsi.create');

    }

    public function indexVerif(){
        $userDoswal = User::where('id', auth()->user()->id)->get()->first();
        $skripsi = Skripsi::where('status', false)->whereNotNull('scan_skripsi')->get();
        //dd($skripsi);
        foreach ($skripsi as $s) {
            $s->mahasiswa = Mahasiswa::where('user_id', $s->id_mahasiswa)->get()->first();
            $s->mahasiswa->nim = User::where('id', $s->mahasiswa->user_id)->get()->first()->username;
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Verifikasi Skripsi',
            'active_user' => 'active',
            'UserName' => $userDoswal->name,
            //'skripsi' => $skripsi
        ];
        return view('DosenWali.verifSkripsiindex', compact('skripsi'), $data);
    }

    public function indexDosen()
    {
        $userDoswal = User::where('id', auth()->user()->id)->get()->first();
        $skripsi = Skripsi::where('status', true)->get();
        foreach ($skripsi as $s) {
            $s->mahasiswa = Mahasiswa::where('user_id', $s->id_mahasiswa)->get()->first();
            // dd($s->mahasiswa);
            $s->mahasiswa->nim = User::where('id', $s->mahasiswa->user_id)->get()->first()->username;
        }
        //dd($skripsi);
        $data = [
            'active_side' => 'active',
            'title' => 'List Skripsi',
            'active_user' => 'active',
            'UserName' => $userDoswal->name,
            //'skripsi' => $skripsi
        ];
        return view('DosenWali.Skripsiindex', compact('skripsi'), $data);
    }

    public function create()
    {
        $userMhs = User::where('id', auth()->user()->id)->get()->first();
        $foto = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        $skripsi = Skripsi::where('id_mahasiswa', auth()->user()->id)->get();
        $avail_semester = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        //dd($skripsi);
        $data = array(
            'active_side' => 'active',
            'active_user' => 'active',
            'title' => 'Isi Skripsi',
            'skripsi' => $skripsi->first(),
            'UserName' => $userMhs->name,
            'foto' => $foto->foto,
            'avail_semester' => $avail_semester,
        );
        return view('Mahasiswa/skripsi', $data);
    }
    public function show(string $id)
    { 
        {
            $userMhs = User::where('id', auth()->user()->id)->get()->first();
            $data = [
                'active_side' => 'active',
                'title' => 'Data Skripsi',
                'active_user' => 'active',
                'UserName' => $userMhs->name,
            ];
            return view('mahasiswa/Dataskripsi', $data);
        }
    }
    public function edit(string $id)
    {
        $userMhs = User::where('id', auth()->user()->id)->get()->first();
        $skripsi = skripsi::where('id_mahasiswa', auth()->user()->id)->get();
        $avail_semester = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        $data = [
            'active_side' => 'active',
            'title' => 'Edit skripsi',
            'active_user' => 'active',
            'skripsi' => $skripsi,
            'UserName' => $userMhs->name,
            'avail_semester' => $avail_semester,

        ];
        return view('mahasiswa/Editskripsi', $data);
    }
    public function update(Request $request, string $id)
    {
        $skripsi = skripsi::findOrFail($id);
        $skripsi->fill($request->post())->save();

        // Fetch the updated KHS data
        //$updatedIRS = KHS::where('id_mahasiswa', auth()->user()->id)->get();
        return redirect()->route('skripsi.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $skripsi = Skripsi::where('id_mahasiswa', auth()->user()->id)->get()->first();
        if ($request->hasFile('scan_skripsi')) {
            $data['scan_skripsi'] = $request->file('scan_skripsi')->store('scan_skripsi');
            if ($skripsi->scan_skripsi != null) {
                Storage::delete($skripsi->scan_skripsi);
            }
        }
        $skripsi->fill($data);
        $skripsi->save();
        return redirect('/user/mahasiswa/Skripsi');
    }

    public function destroy(string $id)
    {
        $skripsi = Skripsi::find($id); // Ganti Mahasiswa dengan model yang Anda gunakan

        if (!$skripsi) {
            return redirect()->back()->with('error', 'Data not found.');
        }

        $skripsi->delete();

        return redirect()->back()->with('skripsi.index')->with('success', 'Data deleted successfully.'); // Ganti 'route_name' dengan nama rute yang ingin Anda tuju setelah penghapusan data.
    }

    public function download(string $id)
    {
        $skripsi = Skripsi::find($id);

        // Perform a check if the authenticated user has access to this file
        if (auth()->user()->id != $skripsi->id_mahasiswa && auth()->user()->role != 'dosen_wali' && auth()->user()->role != 'departemen') {
            return Redirect::back()->with('error', 'Unauthorized access');
        }

        // Get the file path
        $filePath = storage_path('app/' . $skripsi->scan_skripsi);

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
        $skripsi = Skripsi::find($id);
        $skripsi->status = true;
        $skripsi->save();
        return redirect()->back()->with('success', 'Skripsi telah diapprove');
    }
    public function delete($id){
        $skripsi=Skripsi::find($id);
        if ($skripsi) {
            $skripsi->delete();
            return redirect()->back()->with('success', 'Skripsi telah dihapus');
        }
        return redirect()->back()->with('error', 'Skripsi tidak ditemukan');
    }
}