<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use App\Models\Mahasiswa;
use App\Models\PKL;
use App\Models\Skripsi;
use App\Models\IRS;
use App\Models\KHS;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    function index(){
        if (Auth::check()) {
            if (Auth::user()->role == 'mahasiswa') {
                return redirect('user/mahasiswa/');
            } elseif (Auth::user()->role == 'operator') {
                return redirect('user/operator');
            } elseif (Auth::user()->role == 'dosen_wali') {
                return redirect('user/dosenWali');
            } elseif (Auth::user()->role == 'departemen') {
                return redirect('user/departemen');
            }
        }
        return view('login');
    }

    function mahasiswa(){
        $userMhs = User::where('id', auth()->user()->id)->get()->first();
        $user = User::where('id', auth()->user()->id)->first();
        $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->first();
        $doswal = User::where('id', $mahasiswa->first()->doswal)->get()->first();
        $khs = KHS::where('id_mahasiswa', $mahasiswa->user_id)->get();
        $irs = IRS::where('id_mahasiswa', $mahasiswa->user_id)->get();
        $smt_irs = $irs->pluck('semester_aktif')->toArray();
        $smt_khs = $khs->pluck('semester_aktif')->toArray();
        $smt = array_unique(array_intersect($smt_irs, $smt_khs));
        $smt_pkl = PKL::where('id_mahasiswa', $mahasiswa->user_id)->pluck('semester')->toArray();
        $smt_skripsi = Skripsi::where('id_mahasiswa', $mahasiswa->user_id)->pluck('lama_studi')->toArray();

        

        $data = array
         (
            'active_home' => 'active',
            'user' => $user,
            'Role' => 'Mahasiswa',
            'title' => 'Dhasbord',
            'nama_doswal'=> $doswal->name,
            'mahasiswa' => $mahasiswa,
            'smt' => $smt,
            'smt_pkl' => $smt_pkl[0],
            'smt_skripsi' => $smt_skripsi[0],
            'UserName' => $userMhs->name,
            'foto' => $mahasiswa->foto,
        );
        return view('Mahasiswa/homeMahasiswa', $data);
    }

    function operator(){
        $userOp = User::where('id', auth()->user()->id)->get()->first();
        $data = array (
            'active_side' => 'active',
            'active_sub' => 'active',
            'active_user' => 'active',
            'title' => 'Dashboard',
            'UserName' => $userOp->name

        );
        return view('Operator/homeOperator', $data);
    }

    function dosenWali(){
        $mahasiswa = Mahasiswa::where('doswal', auth()->user()->id)->get();
        foreach ($mahasiswa as $mhs) {
            $mhs->nim = User::where('id', $mhs->user_id)->get()->first()->username;
            $mhs->nama = User::where('id', $mhs->user_id)->get()->first()->name;
            $mhs->dosen_wali = User::where('id', $mhs->doswal)->get()->first()->name;
        }
        
        // dd($mahasiswaa);

        $data = array (
            'active_home' => 'active',
            'title' => 'Dosen Wali',
            'UserName' => auth()->user()->name,
            'mahasiswa' => $mahasiswa,
        );
        return view('DosenWali/homedosenWali', $data);
    }
    
    public function ProgresStudi(string $mahasiswa){
        //dd($mahasiswa);
        $user = User::where('id', $mahasiswa)->first();
        $mahasiswa = Mahasiswa::where('user_id', $mahasiswa)->first();
        $khs = KHS::where('id_mahasiswa', $mahasiswa->user_id)->get();
        $irs = IRS::where('id_mahasiswa', $mahasiswa->user_id)->get();
        $smt_irs = $irs->pluck('semester_aktif')->toArray();
        $smt_khs = $khs->pluck('semester_aktif')->toArray();
        $smt = array_unique(array_intersect($smt_irs, $smt_khs));
        if (PKL::where('id_mahasiswa', $mahasiswa->user_id)->first() != null){
            $smt_pkl = PKL::where('id_mahasiswa', $mahasiswa->user_id)->first()->semester;
        }
        else{
            $smt_pkl = 0;
        }
        // dd(Skripsi::where('id_mahasiswa', $mahasiswa->user_id)->first()->status);
        if (Skripsi::where('id_mahasiswa', $mahasiswa->user_id)->first()->status == true){
            $smt_skripsi = Skripsi::where('id_mahasiswa', $mahasiswa->user_id)->first()->semester;
        }
        else{
            $smt_skripsi = 0;
        }
        // dd($smt_skripsi);
        //dd($smt_skripsi[0]);
        $doswal = User::where('id', $mahasiswa->doswal)->first();
        //dd(isset($khs[]));
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => 'INFORMATIKA',
            'title' => 'Progres Studi',
            'user' => $user,
            'mahasiswa' => $mahasiswa,
            'khs' => $khs,
            'irs' => $irs,
            'nama_doswal'=>$doswal->name,
            'smt' => $smt,
            'smt_pkl' => $smt_pkl,
            'smt_skripsi' => $smt_skripsi,
        );
        return view('DosenWali/detilMahasiswa', $data);
        //dd($khs);
    }

    function Profile(){
        // $userMhs = User::where('id', auth()->user()->id)->get()->first();
        // $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->get()->first();
        
        // $doswal = User::where('id', $mahasiswa->first()->doswal)->get()->first();
        // //dd($mahasiswa);
        // $hidden = 'hidden';
        // if($userMhs->has_setup){
        //     $hidden = '';
        // }
        // $data = array (
        //     // dd($mahasiswa->foto);
        //     'active_home' => 'active',
        //     'title' => 'Profile',
        //     'mahasiswa' => $mahasiswa,
        //     'userMhs' => $userMhs,
        //     'nama_doswal' => $doswal->name,
        //     'UserName' => $userMhs->name,
        //     'foto' => $mahasiswa->foto,
        //     'hidden' => $hidden,
            
        // );
        //dd($doswal);
        // Profile Doswal
        $userDoswal = User::where('id', auth()->user()->id)->get()->first();
        $doswal = DosenWali::where('user_id', auth()->user()->id)->get()->first();
        $hidden = 'hidden';
        if($userDoswal->has_setup){
            $hidden = '';
        }
        $data = array (
            // dd($mahasiswa->foto);
            'active_home' => 'active',
            'title' => 'Profile',
            'doswal' => $doswal,
            'userDoswal' => $userDoswal,
            'nama_doswal' => $doswal->name,
            'UserName' => $userDoswal->name,
            'foto' => $doswal->foto,
            'hidden' => $hidden,
            
        );

        
        return view('DosenWali/profileDosenWali', $data);
    }
    function update(Request $request){
        $data = $request->all();
        // dd($data);
        $user = User::where('id', auth()->user()->id)->get()->first();
        $doswal = DosenWali::where('user_id', auth()->user()->id)->get()->first();
        $user->has_setup = true;
        $user->name = $data['nama'];
        $user->save();
        //dd($mhs);
        $doswal->update($data);
        $doswal->save();

        return redirect()->route('doswal.profile');
        //dd($request->all());
    }

    function departemen(){
        
        
        //$pkl = PKL::all();
        $current_year = date('Y');
        //dd($current_year);
        $tahun_shown = array();
        for ($i = intval($current_year); $i >= intval($current_year) - 6; $i--) {
            $mahasiswa[$i] = Mahasiswa::where('angkatan', strval($i))->get();
            $tahun_shown[] = $i;
        }

        // dd($mahasiswa);
        $lulus_pkl = 0;
        $lulus_skripsi = 0;
        foreach ($mahasiswa as $key => $value) {
            //$mahasiswa[$key]->name = User::where('id', $value[0]->user_id)->first()->name;
            $pkl[$key]['sudah'] = array();
            $pkl[$key]['belum'] = array();
            //$pkl[$key]['belum'] = array();
            $skripsi[$key]['sudah'] = array();
            $skripsi[$key]['belum'] = array();
            foreach ($value as $key2 => $value2) {
                //dd($key2);
                $data_pkl = PKL::where('id_mahasiswa', $value2->user_id)->get()->first();
                // dd($value2->user_id);
                $data_pkl->nama = User::where('id', $value2->user_id)->first()->name;
                $data_pkl->nim = User::where('id', $value2->user_id)->first()->username;
                $data_pkl->angkatan = $value2->angkatan;
                // dd($data_pkl);
                if ($data_pkl != null) {
                    if ($data_pkl->status) {
                        $pkl[$key]['sudah'][] = $data_pkl;
                        $lulus_pkl++;
                    } else {
                        $pkl[$key]['belum'][] = $data_pkl;
                    }
                }

                $data_skripsi = Skripsi::where('id_mahasiswa', $value2->user_id)->get()->first();
                // dd($data_skripsi);
                $data_skripsi->nama = User::where('id', $value2->user_id)->first()->name;
                $data_skripsi->nim = User::where('id', $value2->user_id)->first()->username;
                $data_skripsi->angkatan = $value2->angkatan;
                if ($data_skripsi != null) {
                    if ($data_skripsi->status) {
                        $skripsi[$key]['sudah'][] = $data_skripsi;
                        $lulus_skripsi++;
                    } else {
                        $skripsi[$key]['belum'][] = $data_skripsi;
                    }
                }

            }
        }
        
        // dd($pkl[2021]['sudah'][0]);
        // dd($skripsi);
        // dd($tahun_shown);
        $data = array (
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => 'INFORMATIKA',
            'Title' => 'Dashboard',
            
            'pkl' => $pkl,
            'skripsi' => $skripsi,
            'tahun_shown' => $tahun_shown,
            'mahasiswa' => $mahasiswa,
            'lulus_pkl' => $lulus_pkl,
            'lulus_skripsi' => $lulus_skripsi,
        );
        return view('Departemen/homeDepartemen', $data);
    }

    public function settingDoswal(){
        $data = array (
            'active_home' => 'active',
            'Role' => 'Dosen Wali',
            'UserName' => auth()->user()->name,
            'title' => 'Settings',
        );
        return view('DosenWali/settings', $data);
    }

    public function settingDept()
    {
        $data = array(
            'active_home' => 'active',
            'Role' => 'Departemen',
            'UserName' => auth()->user()->name,
            'Title' => 'Settings',
        );
        return view('Departemen/settings', $data);
    }

    public function updatePassword(Request $request)
    {
        // dd($request->new_password);
        if (Auth::attempt(['username' => auth()->user()->username, 'password' => $request->old_password])) {
            $request->validate([
                'new_password' => ['required'],
            ]);
        } else {
            return redirect()->route('doswal.settings')->with('error', 'Password lama salah');
        }

        $user = User::find(auth()->user()->id);
        // dd($user);
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('doswal.settings');
    }
}
