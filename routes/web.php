<?php

use App\Http\Controllers\OperatorController;
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
    //User
    Route::get('/user',[userController::class,'index']);

    //Mahasiswa
    Route::get('/user/mahasiswa',[userController::class,'mahasiswa'])->middleware('userAkses:mahasiswa');
    Route::get('/user/mahasiswa/IRS',[userController::class,'mahasiswa'])->middleware('userAkses:mahasiswa');

    //Operator
    Route::get('/user/operator',[UserController::class,'operator'])->middleware('userAkses:operator');
    Route::get('/user/operator/profile',[OperatorController::class,'profile'])->middleware('userAkses:operator');
    //Buat akun
    Route::get('/user/operator/tambahMahasiswa',[OperatorController::class,'createMahasiswa'])->middleware('userAkses:operator');
    Route::get('/user/operator/tambahdosenWali',[OperatorController::class,'createdosenWali'])->middleware('userAkses:operator');
    Route::get('/user/operator/tambahOperator',[OperatorController::class,'createOperator'])->middleware('userAkses:operator');
    //Kelola akun

    //Dosen Wali
    Route::get('/user/dosenWali',[UserController::class,'dosenWali'])->middleware('userAkses:dosenWali');

    //Departemen
    Route::get('/user/departemen',[UserController::class,'departemen'])->middleware('userAkses:departemen');
    Route::get('/logout',[SessionController::class, 'logout']);
});