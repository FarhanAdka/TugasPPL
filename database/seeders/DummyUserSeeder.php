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
                    'username'=>'op1@gmail.com',
                    'role'=>'operator',
                    'password'=>bcrypt('123456')
                ],
                [
                    'name'=>'mh1',
                    'username'=>'mh1@gmail.com',
                    'role'=>'mahasiswa',
                    'password'=>bcrypt('123456')
                ],
                [
                    'name'=>'dp1',
                    'username'=>'dp1@gmail.com',
                    'role'=>'departemen',
                    'password'=>bcrypt('123456')
                ],
                [
                    'name'=>'dw1',
                    'username'=>'dw1@gmail.com',
                    'role'=>'dosen_wali',
                    'password'=>bcrypt('123456')
                ]
            ];
            foreach($userData as $key => $val){
                User::create($val);
            }
    }
}
