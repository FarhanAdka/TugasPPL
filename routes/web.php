<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function (){
    Route::get('/', [SessionController::class, 'index'])->name('login');
    Route::post('/', [SessionController::class, 'login']);
});
Route::get('/home',function (){
    return redirect('/user');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/user',[userController::class,'index']);
    Route::get('/user/mahasiswa',[userController::class,'mahasiswa'])->middleware('userAkses:mahasiswa');
    Route::get('/user/operator',[UserController::class,'operator'])->middleware('userAkses:operator');
    Route::get('/user/dosenWali',[UserController::class,'dosenWali'])->middleware('userAkses:dosenWali');
    Route::get('/user/departemen',[UserController::class,'departemen'])->middleware('userAkses:departemen');
    Route::get('/logout',[SessionController::class, 'logout']);
});