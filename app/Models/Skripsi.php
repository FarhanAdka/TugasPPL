<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mahasiswa',
        'nilai',
        'tanggal_lulus',
        'lama_studi',
        'status',
        'scan_skripsi',
        'semester',
    ];

    function user(){
        return $this->belongsTo(User::class, 'id_mahasiswa');
    }
}
