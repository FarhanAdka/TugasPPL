<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKL extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mahasiswa',
        'nilai',
        'status',
        'scan_pkl'
    ];

    function user(){
        return $this->belongsTo(User::class, 'id_mahasiswa');
    }
}
