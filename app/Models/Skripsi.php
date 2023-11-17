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
        'status',
        'scan_skripsi'
    ];

    function user(){
        return $this->belongsTo(User::class, 'id_mahasiswa');
    }
}
