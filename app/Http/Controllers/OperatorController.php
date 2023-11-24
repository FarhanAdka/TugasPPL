<?php

namespace App\Http\Controllers;

use App\Models\PKL;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\DosenWali;
<<<<<<< HEAD
use League\Uri\UriTemplate\Operator;
=======
use Illuminate\Support\Facades\Storage;
>>>>>>> 5e461cf2ccf2e57aab538ce43c969ec2bc2a06e4

class OperatorController extends Controller
{
    //Profile
    function profile()
    {
        $data = array(
            'active_home' => 'active',
            'title' => 'Profile Operator',
        );
        return view('operator/profileOperator');
    }

    //Create Akun
    function createMahasiswa()
    {
        $doswal = User::where('role', 'dosen_wali')->get();
        $data = array(
            'active_home' => 'active',
            'title' => 'Tambah Akun Mahasiswa',
            'doswal' => $doswal,
        );
        return view('operator/createAkun/createMahasiswa', $data);
    }
    function createdosenWali()
    {
        $data = array(
            'active_home' => 'active',
            'title' => 'Tambah Akun Dosen Wali',
        );
        return view('operator/createAkun/createdosenWali');
    }
    function createOperator()
    {
        $data = array(
            'active_home' => 'active',
            'title' => 'Tambah Akun Operator',
        );
        return view('operator/createAkun/createOperator');
    }

    //Kelola akun akun
    function kelolaMahasiswa()
    {
        $mahasiswa = User::where('role', 'mahasiswa')->paginate(10);
        $data = array(
            'active_home' => 'active',
            'title' => 'Kelola Akun Mahasiswa',
            'mahasiswa' => $mahasiswa,
        );
        return view('operator/kelolaAkun/kelolaMahasiswa', $data);
    }
<<<<<<< HEAD

    function editMahasiswa($id){
        // Menggunakan findOrFail untuk menemukan data mahasiswa berdasarkan ID
        $Mahasiswa = User::findOrFail($id);
    
        $data = array (
            'active_home' => 'active',
            'title' => 'Edit Akun Mahasiswa',
            'Mahasiswa' => $Mahasiswa,
        );
    
        return view('operator/kelolaAkun/editMahasiswa', $data);
    }
    
    function updateMahasiswa(Request $request, $id){
        // Validasi input
        $request->validate([
            'username' => 'required',
            'name' => 'required',
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













    function keloladosenWali(){
=======
    function keloladosenWali()
    {
>>>>>>> 5e461cf2ccf2e57aab538ce43c969ec2bc2a06e4
        $doswal = User::where('role', 'dosen_wali')->paginate(10);
        $data = array(
            'active_home' => 'active',
            'title' => 'Kelola Akun Dosen Wali',
            'doswal' => $doswal,
        );
        return view('operator/kelolaAkun/keloladosenWali', $data);
    }

<<<<<<< HEAD
    function editdosenWali($id){
        // Menggunakan findOrFail untuk menemukan data dosen wali berdasarkan ID
        $doswal = User::findOrFail($id);
    
        $data = array (
            'active_home' => 'active',
            'title' => 'Edit Akun Dosen Wali',
            'doswal' => $doswal,
        );
    
        return view('operator/kelolaAkun/editdosenWali', $data);
    }
    
    function updatedosenWali(Request $request, $id){
        // Validasi input
        $request->validate([
            'username' => 'required',
            'name' => 'required',
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

    



    function storemhs(Request $request){
=======
    function storemhs(Request $request)
    {
>>>>>>> 5e461cf2ccf2e57aab538ce43c969ec2bc2a06e4
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
        User::create($data);
        return redirect('/user/operator/keloladosenWali');
    }

<<<<<<< HEAD
    function destroyMhs($id){
        $mahasis = User::findOrFail($id)->delete();  
        return redirect('user/operator/kelolaMahasiswa')->with('success', 'Berhasil Menghapus data..', $mahasis);
    }
=======
    function createDataMahasiswa()
    {
        $data = array(
            'active_home' => 'active',
            'title' => 'Tambah Data Mahasiswa',
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
                $rowData = array_combine($headers, $row);

                // Append the row data to the CSV data array
                $csvData[] = $rowData;

                // Process each row here if needed
                // For example, create Mahasiswa models using $rowData
            }
            // Close the file handler
            fclose($csvFile);
            
            // Now $csvData contains an array of associative arrays representing CSV rows
            for ($i=0; $i < count($csvData)+1; $i++) { 
                //dd($csvData[$i]);
            }
            // Redirect with success message
            return redirect('/user/operator/kelolaMahasiswa')->with('success', 'Data Mahasiswa imported successfully!');
        }

        // If no file is uploaded or an error occurred
        return redirect()->back()->with('error', 'Failed to import data.');
    }


>>>>>>> 5e461cf2ccf2e57aab538ce43c969ec2bc2a06e4
}