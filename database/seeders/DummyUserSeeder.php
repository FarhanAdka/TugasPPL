<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
    }
}
