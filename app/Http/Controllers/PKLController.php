<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\PKL;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Redirect;

class PKLController extends Controller
{
    function index(){
        $user = User::where('id', auth()->user()->id)->get()->first();
        
        $pkl = PKL::where('id_mahasiswa', auth()->user()->id)->get()->first();
        // dd($pkl->status);
            $pkl->mahasiswa = Mahasiswa::where('user_id', $pkl->id_mahasiswa)->get()->first();
            $pkl->mahasiswa->nim = User::where('id', $pkl->mahasiswa->user_id)->get()->first()->username;
        
        //dd($pkl);
        $data = [
            'active_side' => 'active',
            'title' => 'Data PKL',
            'active_user' => 'active',
            'pkl' => $pkl,
            'UserName' => $user->name,
        ];
        return redirect()->route('PKL.create');

    }

    public function indexVerif()
    {
        $userDoswal = User::where('id', auth()->user()->id)->get()->first();
        
        $pkl = PKL::where('status', false)->whereNotNull('scan_pkl')->get();
        foreach ($pkl as $p) {
            $p->mahasiswa = Mahasiswa::where('user_id', $p->id_mahasiswa)->get()->first();
            $p->mahasiswa->nim = User::where('id', $p->mahasiswa->user_id)->get()->first()->username;
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Verifikasi PKL',
            'active_user' => 'active',
            'UserName' => $userDoswal->name,
            // 'mahasiswa'=>$mahasiswa,
            // 'irs' => $irs
            // 'nim' => $nim
        ];
        return view('DosenWali.verifPKLindex', compact('pkl'), $data); // Menampilkan view dengan data IRS yang sudah diambil
    }

    public function indexDosen()
    {
        $userDoswal = User::where('id', auth()->user()->id)->get()->first();
        
        $pkl = PKL::where('status', true)->get();
        foreach ($pkl as $p) {
            $p->mahasiswa = Mahasiswa::where('user_id', $p->id_mahasiswa)->get()->first();
            $p->mahasiswa->nim = User::where('id', $p->mahasiswa->user_id)->get()->first()->username;
        }
        $data = [
            'active_side' => 'active',
            'title' => 'List PKL',
            'active_user' => 'active',
            'pkl' => $pkl,
            'UserName' => $userDoswal->name,
            // 'mahasiswa'=>$mahasiswa,
            // 'irs' => $irs
            // 'nim' => $nim
        ];

        return view('DosenWali.PKLindex', compact('pkl'), $data);
    }
    public function create()
    {
        $userMhs = User::where('id', auth()->user()->id)->get()->first();
        
        $pkl = PKL::where('id_mahasiswa', auth()->user()->id)->get();
        $foto = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        //dd($pkl);
        $avail_semester = [1,2,3,4,5,6,7,8,9,10,11,12,13,14];
        //dd($avail_semester);         
        $data = array (
            'active_side' => 'active', 
            'active_user' => 'active',
            'title' => 'Isi PKL',
            'pkl' => $pkl->first(),
            'avail_semester' => $avail_semester,
            'UserName' => $userMhs->name,
            'foto' => $foto->foto,

        );
        return view('Mahasiswa/PKL', $data);
    }
    public function show(string $id)
    {
        {
            $userMhs = User::where('id', auth()->user()->id)->get()->first();
            
            $data = [
                'active_side' => 'active',
                'title' => 'Data PKL',
                'active_user' => 'active',
                'UserName' => $userMhs->name,
            ];
            return view('mahasiswa/DataPKL', $data);
        }
    }
    public function edit(string $id)
    {
        $userMhs = User::where('id', auth()->user()->id)->get()->first();
        $pkl = PKL::where('id_mahasiswa', auth()->user()->id)->get();
        $data = [
            'active_side' => 'active',
            'title' => 'Edit PKL',
            'active_user' => 'active',
            'pkl' => $pkl,
            'UserName' => $userMhs->name,
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
        if (auth()->user()->id != $pkl->id_mahasiswa && auth()->user()->role != 'dosen_wali' && auth()->user()->role != 'departemen') {
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
