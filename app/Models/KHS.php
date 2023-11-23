<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KHS extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mahasiswa',
        'semester_aktif',
        'jumlah_sks',
        'ip',
        'ipk',
        'status',
        'scan_khs',
        'sks_kumulatif',
    ];

    function user(){
        return $this->belongsTo(User::class, 'id_mahasiswa');
    }
}
