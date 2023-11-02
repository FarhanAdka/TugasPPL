<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Supprt\Facades\Auth;

class UserController extends Controller
{
    
    function mahasiswa(){
        echo "selamat datang mahasiswa";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }
    function operator(){
        echo "selamat datang operator";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }
    function dosenWali(){
        echo "selamat datang dosen wali";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }
    function departemen(){
        echo "selamat datang departemen";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }
}
