<?php

namespace App\Http\Controllers;

use App\Models\PKL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Redirect;

class PKLController extends Controller
{
    function index(){
        $pkl = PKL::where('id_mahasiswa', auth()->user()->id)->get()->first();
        //dd($pkl);
        $data = [
            'active_side' => 'active',
            'title' => 'Data PKL',
            'active_user' => 'active',
            'pkl' => $pkl
        ];
        return redirect()->route('PKL.create');

    }

    public function indexVerif()
    {
        $pkl = PKL::where('status', false)->whereNotNull('scan_pkl')->get();
        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi PKL',
            'active_user' => 'active',
            // 'mahasiswa'=>$mahasiswa,
            // 'irs' => $irs
            // 'nim' => $nim
        ];
        return view('DosenWali.verifPKLindex', compact('pkl'), $data); // Menampilkan view dengan data IRS yang sudah diambil
    }

    public function indexDosen()
    {
        $pkl = PKL::where('status', true)->get();
        $data = [
            'active_side' => 'active',
            'title' => 'List PKL',
            'active_user' => 'active',
            // 'mahasiswa'=>$mahasiswa,
            // 'irs' => $irs
            // 'nim' => $nim
        ];

        return view('DosenWali.PKLindex', compact('pkl'), $data);
    }
    public function create()
    {
        $pkl = PKL::where('id_mahasiswa', auth()->user()->id)->get();
        //dd($pkl);
        $avail_semester = [1,2,3,4,5,6,7,8,9,10,11,12,13,14];
        //dd($avail_semester);         
        $data = array (
            'active_side' => 'active', 
            'active_user' => 'active',
            'title' => 'Isi PKL',
            'pkl' => $pkl->first(),
            'avail_semester' => $avail_semester,

        );
        return view('Mahasiswa/PKL', $data);
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
        $pkl = PKL::where('id_mahasiswa', auth()->user()->id)->get();
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

    public function store(Request $request){
        $data = $request->all();
        //dd($data);
        $pkl = PKL::where('id_mahasiswa', auth()->user()->id)->get()->first();
        if ($request->hasFile('scan_pkl')) {
            $data['scan_pkl'] = $request->file('scan_pkl')->store('scan_pkl');
            if($pkl->scan_pkl != null){
                Storage::delete($pkl->scan_pkl);
            }
        }
        $pkl->fill($data);
        $pkl->save();
        return redirect('/user/mahasiswa/PKL');
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
        $filePath = storage_path('app/' . $pkl->scan_pkl);

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
        $pkl = PKL::find($id);

        $pkl->status = true;
        $pkl->save();

        return redirect()->back()->with('success', 'PKL telah disetujui');
    }
    public function delete($id){
        $pkl=PKL::find($id);
        if ($pkl) {
            $pkl->delete();
            return redirect()->back()->with('success', 'PKL berhasil dihapus.');
        }
    }
}
