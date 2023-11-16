<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IRS extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mahasiswa',
        'semester_aktif',
        'jumlah_sks',
        'scan_irs',
        'status',
    ];

    function user(){
        return $this->belongsTo(User::class, 'id_mahasiswa');
    }
}
