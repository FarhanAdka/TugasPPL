<?php

namespace App\Models;


use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenWali extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'nama'
    ];

    function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'doswal');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'username');
    }
}
