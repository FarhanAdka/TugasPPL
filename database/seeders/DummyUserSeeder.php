<?php

namespace Database\Seeders;

use App\Models\PKL;
use App\Models\Skripsi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\DosenWali;
use App\Models\Departemen;
class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
                [
                    'name'=>'op1',
                    'username'=>'operator1',
                    'role'=>'operator',
                    'password'=>bcrypt('123456')
                ],
                [
                    'name'=>'mh1',
                    'username'=>'mahasiswa1',
                    'role'=>'mahasiswa',
                    'password'=>bcrypt('123456')
                ],
                [
                    'name'=>'dp1',
                    'username'=>'departemen1',
                    'role'=>'departemen',
                    'password'=>bcrypt('123456')
                ],
                [
                    'name'=>'dw1',
                    'username'=>'doswal1',
                    'role'=>'dosen_wali',
                    'password'=>bcrypt('123456')
                ]
            ];
            foreach($userData as $key => $val){
                User::create($val);
            }
            $mhs_id = User::where('username', 'mahasiswa1')->first()->id;
            $dw_id = User::where('username', 'doswal1')->first()->id;
            Mahasiswa::create(
                [
                    'user_id' => $mhs_id,
                    'doswal' => $dw_id,
                    'angkatan' => '2018',
                ]
            );

            PKL::create(
                [
                    'id_mahasiswa' => $mhs_id,
                ]
            );

            Skripsi::create(
                [
                    'id_mahasiswa' => $mhs_id,
                ]
            );

            DosenWali::create(
                [
                    'user_id' => $dw_id,
                ]
            );
            
    }
}
