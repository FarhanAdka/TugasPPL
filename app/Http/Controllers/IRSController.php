<?php

namespace App\Http\Controllers;

use App\Models\IRS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Mahasiswa;
use App\Models\User;
use Redirect;

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

    public function indexVerif()
    {
        // $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        // $irs = collect();
        // foreach ($mahasiswa as $mhs) {
        //     $nim = User::where('username', $mhs->user_id)->get()->first()->username;
        //     $irsMahasiswa = IRS::where('id_mahasiswa', $mhs->id)->where('status', true)->get();
        //     $irs = $irs->merge($irsMahasiswa); // Menggabungkan PKL dari setiap mahasiswa ke dalam satu koleksi
        // }
        $irs = IRS::where('status', false)->get();
        foreach ($irs as $ir) {
            // dd($ir->id_mahasiswa);
            $ir->mahasiswa = Mahasiswa::where('user_id', $ir->id_mahasiswa)->get()->first();
            $ir->mahasiswa->nim = User::where('id', $ir->mahasiswa->user_id)->get()->first()->username;
        }
        $data = [
            'active_side' => 'active',
            'title' => 'Permintaan Verifikasi IRS',
            'active_user' => 'active',
            // 'mahasiswa'=>$mahasiswa,
            // 'irs' => $irs
            // 'nim' => $nim
        ];
        return view('DosenWali.verifIRSindex', compact('irs'), $data); // Menampilkan view dengan data IRS yang sudah diambil
    }

    public function indexDosen()
    {
        $irs = IRS::where('status', true)->get();
        foreach ($irs as $ir) {
            $ir->mahasiswa = Mahasiswa::where('user_id', $ir->id_mahasiswa)->get()->first();
            $ir->mahasiswa->nim = User::where('id', $ir->mahasiswa->user_id)->get()->first()->username;
        }
        //dd($irs);
        $data = [
            'active_side' => 'active',
            'title' => 'Data IRS',
            'active_user' => 'active',
            // 'mahasiswa'=>$mahasiswa,
            // 'irs' => $irs
            // 'nim' => $nim
        ];

        return view('DosenWali.IRSindex', compact('irs'), $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semester = IRS::where('id_mahasiswa', auth()->user()->id)->pluck('semester_aktif')->toArray();
        sort($semester);
        //dd($semester);
        $avail_semester = array_diff_assoc([1, 2, 3, 4, 5, 6, 7, 8], $semester);
        //dd($avail_semester);
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
        
        //dd($request->all());
        // Handle file upload
        if ($request->hasFile('scan_irs')) {
            $file = $request->file('scan_irs');
            $path = $file->store('irs_files'); // 'irs_files' is the directory within the storage folder where the file will be stored
            $irs->scan_irs = $path; // Assuming 'file_path' is the column in your IRS model to store the file path
        }
        $irs->save();

        return redirect()->route('IRS.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'active_side' => 'active',
            'title' => 'Data IRS',
            'active_user' => 'active',
        ];
        return view('mahasiswa/DataIRS', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $irs = IRS::find($id);
        $semester = IRS::where('id_mahasiswa', auth()->user()->id)->pluck('semester_aktif')->toArray();
        $avail_semester = array_diff_assoc(['1', '2', '3', '4', '5', '6', '7', '8'], $semester);
        $data = [
            'active_side' => 'active',
            'title' => 'Edit IRS',
            'active_user' => 'active',
            'irs' => $irs,
            'avail_semester' => $avail_semester,
        ];
        return view('mahasiswa/EditIRS', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $irs = IRS::findOrFail($id);
        $irs->fill($request->post())->save();

        // Fetch the updated IRS data
        //$updatedIRS = IRS::where('id_mahasiswa', auth()->user()->id)->get();
        return redirect()->route('IRS.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $irs = IRS::find($id);
        $irs_path = $irs->scan_irs;

        if($irs_path != null){
            Storage::delete($irs_path);
        }
        $irs->delete();
        
        return redirect()->back()->with('success', 'IRS telah dihapus');

    }

    public function download(string $id)
    {
        $irs = IRS::find($id);

        // Perform a check if the authenticated user has access to this file
        if (auth()->user()->id != $irs->id_mahasiswa) {
            return Redirect::back()->with('error', 'Unauthorized access');
        }

        // Get the file path
        $filePath = storage_path('app/' . $irs->scan_irs);

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
        $irs = IRS::find($id);

        $irs->status = true;
        $irs->save();

        return redirect()->back()->with('success', 'IRS telah disetujui');
    }
    public function delete($id){
        $irs=IRS::find($id);
        if ($irs) {
            $irs->delete();
            return redirect()->back()->with('success', 'IRS berhasil dihapus.');
        }
    }
}
