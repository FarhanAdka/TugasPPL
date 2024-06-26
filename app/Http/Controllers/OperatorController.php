<?php

namespace App\Http\Controllers;

use App\Models\PKL;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\DosenWali;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use League\Uri\UriTemplate\Operator;

use Illuminate\Support\Facades\Storage;


class OperatorController extends Controller
{
    //Profile
    function profile()
    {
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        $data = array(
            'active_home' => 'active',
            'title' => 'Profile Operator',
            'UserName' => $userOp->name
        );
        return view('operator/profileOperator', $data);
    }

    //Create Akun
    function createMahasiswa()
    {
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        $doswal = User::where('role', 'dosen_wali')->get();
        $data = array(
            'active_home' => 'active',
            'title' => 'Tambah Akun Mahasiswa',
            'doswal' => $doswal,
            'UserName' => $userOp->name,
        );
        return view('operator/createAkun/createMahasiswa', $data);
    }
    function createdosenWali()
    {
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        $data = array(
            'active_home' => 'active',
            'title' => 'Tambah Akun Dosen Wali',
            'UserName' => $userOp->name,
        );
        return view('operator/createAkun/createdosenWali', $data);
    }
    function createOperator()
    {
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        $data = array(
            'active_home' => 'active',
            'title' => 'Tambah Akun Operator',
            'UserName' => $userOp->name,
        );
        return view('operator/createAkun/createOperator', $data);
    }

    //Kelola akun akun
    function kelolaMahasiswa()
    {
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        $mahasiswa = User::where('role', 'mahasiswa')->paginate(10);
        $data = array(
            'active_home' => 'active',
            'title' => 'Kelola Akun Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'UserName' => $userOp->name,

        );
        return view('operator/kelolaAkun/kelolaMahasiswa', $data);
    }

    
    function updateMahasiswa(Request $request, $id){
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        // Validasi input
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'UserName' => $userOp->name,
            'password' => 'nullable|min:6', // Tambahkan nullable agar tidak wajib diisi
        ]);
    
        // Mengambil data dari request
        $data = $request->only(['username', 'name', 'password']);
    
        // Jika password tidak diisi, tidak mengubah password yang ada
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            // Jika password diisi, hash password baru
            $data['password'] = bcrypt($data['password']);
        }
    
        // Mengupdate data mahaiswa berdasarkan ID
        User::findOrFail($id)->update($data);
    
        // Redirect ke halaman kelola mahasiswa
        return redirect('/user/operator/kelolaMahasiswa');
    }





    function keloladosenWali()
    {
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        $doswal = User::where('role', 'dosen_wali')->paginate(10);
        $data = array(
            'active_home' => 'active',
            'title' => 'Kelola Akun Dosen Wali',
            'doswal' => $doswal,
            'UserName' => $userOp->name,
        );
        return view('operator/kelolaAkun/keloladosenWali', $data);
    }

    function editdosenWali($id){
        // Menggunakan findOrFail untuk menemukan data dosen wali berdasarkan ID
        $doswal = User::findOrFail($id);
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        $data = array (
            'active_home' => 'active',
            'title' => 'Edit Akun Dosen Wali',
            'doswal' => $doswal,
            'UserName' => $userOp->name,

        );
    
        return view('operator/kelolaAkun/editdosenWali', $data);
    }
    
    function updatedosenWali(Request $request, $id){
        // Validasi input
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'UserName' => $userOp->name,
            'password' => 'nullable|min:6', // Tambahkan nullable agar tidak wajib diisi
        ]);
    
        // Mengambil data dari request
        $data = $request->only(['username', 'name', 'password']);
    
        // Jika password tidak diisi, tidak mengubah password yang ada
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            // Jika password diisi, hash password baru
            $data['password'] = bcrypt($data['password']);
        }
    
        // Mengupdate data dosen wali berdasarkan ID
        User::findOrFail($id)->update($data);
    
        // Redirect ke halaman kelola dosen wali
        return redirect('/user/operator/keloladosenWali');
    }

    




    function storemhs(Request $request)
    {

        $data = $request->all();
        $data['role'] = 'mahasiswa';
        $data['password'] = bcrypt('123456');

        // Step 1: Create a new User record
        $user = User::create($data);

        // Step 2: Retrieve the User's ID
        $user_id = $user->id;

        $doswal_id = User::where('id', $data['doswal'])->first()->id;

        // Step 3: Create a Mahasiswa record and associate it with the User's ID
        Mahasiswa::create([
            'angkatan' => $data['angkatan'],
            'user_id' => $user_id,
            'doswal' => $doswal_id,
            'jalur_masuk' => null,
            'email' => null,
            'no_hp' => null,
            'provinsi' => null,
            'kab_kota' => null,
            'alamat' => null,
        ]);
        PKL::create([
            'id_mahasiswa' => $user_id,
            'nilai' => null,
            'tanggal_lulus' => null,
            'status' => false,
            'scan_pkl' => null,

        ]);
        Skripsi::create([
            'id_mahasiswa' => $user_id,
            'nilai' => null,
            'tanggal_lulus' => null,
            'lama_studi' => null,
            'status' => false,
            'scan_skripsi' => null,
        ]);
        return redirect('/user/operator/kelolaMahasiswa');
    }

    function storedoswal(Request $request)
    {
        $data = $request->all();
        $data['role'] = 'dosen_wali';
        $data['password'] = bcrypt($data['password']);
        // Step 1: Create a new User record
        $user = User::create($data);

        // Step 2: Retrieve the User's ID
        $user_id = $user->id;
        // Step 3: Create a Mahasiswa record and associate it with the User's ID
        DosenWali::create([
            'user_id' => $user_id,
            'email' => null,
            'no_hp' => null,
            'provinsi' => null,
            'kab_kota' => null,
            'alamat' => null,
        ]);
        return redirect('/user/operator/keloladosenWali');
    }

    function editMahasiswa(string $id){
        //dd($id);
        $mahasiswa = Mahasiswa::where('user_id', $id)->first();
        $mahasiswa->nim = User::where('id', $id)->first()->username;
        $mahasiswa->name = User::where('id', $id)->first()->name;
        //$mahasiswa->doswal = User::where('id', $mahasiswa->doswal)->first()->name;
        $doswal = User::where('role', 'dosen_wali')->get();
        //dd($user);
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        $data = array(
            'active_home' => 'active',
            'title' => 'Edit Akun Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'doswal' => $doswal,
            'UserName' => $userOp->name,

        );
        return view('operator/kelolaAkun/editMahasiswa', $data); 
    }

    function updateStatus(Request $request, $id){
        //dd($id);
        $data = $request->all();
        // dd($data);
        //dd($data);
        $user = User::findOrFail($id);
        $user->update($data);
        $mahasiswa = Mahasiswa::where('user_id', $id)->first();
        //dd($mahasiswa);
        $mahasiswa->status = $data['status'];
        $mahasiswa->angkatan = $data['angkatan'];
        $mahasiswa->doswal = $data['doswal'];
        $mahasiswa->save();
        return redirect('/user/operator/kelolaMahasiswa');
    }

    function createDataMahasiswa()
    {
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        $data = array(
            'active_home' => 'active',
            'title' => 'Tambah Data Mahasiswa',
            'UserName' => $userOp->name,

        );
        return view('operator/createAkun/createDataMahasiswa', $data);
    }

    function storeDataMahasiswa(Request $request)
    {
        if ($request->hasFile('csvmhs')) {
            $file = $request->file('csvmhs');
            // Storing the file
            $filePath = $file->store('csv_files');
            
            // Getting the absolute path to the stored file
            $absolutePath = storage_path('app/' . $filePath);
            
            // Opening the file for reading
            $csvFile = fopen($absolutePath, 'r');
            
            // Reading the headers
            $headers = fgetcsv($csvFile);

            // Initialize an array to hold CSV data
            $csvData = [];
            
            // Reading the file line by line
            while (($row = fgetcsv($csvFile)) !== false) {
                // Combine headers with row values and create associative array
                //dd(count($headers) == count($row)); -> it printed out true but the array_combine still won't work
                $cleanHeaders = array_map('trim', $headers);
                $cleanRow = array_map('trim', $row);
                //dd($cleanHeaders);

                $rowData = array_combine($cleanHeaders, $cleanRow);
                
                // Append the row data to the CSV data array
                $csvData[] = $rowData;
                
                // Process each row here if needed
                // For example, create Mahasiswa models using $rowData
            }
            // Close the file handler
            fclose($csvFile);
            //dd($csvData);
            
            // Now $csvData contains an array of associative arrays representing CSV rows
            for ($i=0; $i < count($csvData); $i++) { 
                //dd($csvData[$i]['dosen_wali']);
                $doswal = User::where('name', $csvData[$i]['dosen_wali'])->first()->id;
                //dd($doswal);
                User::create([
                    'name' => $csvData[$i]['name'],
                    'username' => $csvData[$i]['username'],
                    'password' => bcrypt('123456'),
                    'role' => 'mahasiswa',
                ]);
                $user_id = User::where('username', $csvData[$i]['username'])->first()->id;
                Mahasiswa::create(
                    [
                        'user_id' => $user_id,
                        'angkatan' => $csvData[$i]['angkatan'],
                        'doswal' => $doswal,
                        'jalur_masuk' => null,
                        'email' => null,
                        'no_hp' => null,
                        'provinsi' => null,
                        'kab_kota' => null,
                        'alamat' => null,
                    ]
                    );
                PKL::create([
                    'id_mahasiswa' => $user_id,
                    'nilai' => null,
                    'tanggal_lulus' => null,
                    'status' => false,
                    'scan_pkl' => null,

                ]);
                Skripsi::create([
                    'id_mahasiswa' => $user_id,
                    'nilai' => null,
                    'tanggal_lulus' => null,
                    'lama_studi' => null,
                    'status' => false,
                    'scan_skripsi' => null,
                ]);
            }
            // Redirect with success message
            return redirect('/user/operator/kelolaMahasiswa')->with('success', 'Data Mahasiswa imported successfully!');
        }

        // If no file is uploaded or an error occurred
        return redirect()->back()->with('error', 'Failed to import data.');
    }

    public function destroyMahasiswa(string $id)
    {
        //dd($id);
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/user/operator/kelolaMahasiswa');
    }

    public function settings(){
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        $data = array(
            'active_side' => 'active',
            'active_user' => 'active',
            'title' => 'Setting',
            'UserName' => $userOp->name,
        );
        return view('operator/settings', $data);
    }

    public function updatePassword(Request $request){
        if (Auth::attempt(['username' => auth()->user()->username, 'password' => $request->old_password])) {
            $request->validate([
                'new_password' => ['required'],
            ]);
        } else {
            return redirect()->back()->withErrors(['old_password' => 'Password lama salah']);
        }

        $user = User::find(auth()->user()->id);
        // dd($user);
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('home');
    }
}