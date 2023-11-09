<?php

namespace App\Models;

use App\Models\DosenWali;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'alamat',
        'kab_kota',
        'provinsi',
        'no_hp',
        'email',
        'angkatan',
        'jalur_masuk',
        'doswal',
    ];

    function doswal()
    {
        return $this->belongsTo(User::class, 'doswal');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'mahasiswa');
    }

}
