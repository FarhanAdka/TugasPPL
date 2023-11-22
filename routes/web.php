<?php

use App\Http\Controllers\IRSController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DepartemenController;
use App\Models\Mahasiswa;
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
    Route::resource('/user/mahasiswa/IRS', IRSController::class)->middleware('userAkses:mahasiswa');
    Route::resource('/user/mahasiswa/KHS', KHSController::class)->middleware('userAkses:mahasiswa');
    Route::get('/user/mahasiswa/profile',[MahasiswaController::class,'profile'])->middleware('userAkses:mahasiswa');
    Route::get('/user/mahasiswa/fileIRS/{id}', [IRSController::class, 'download'])->middleware('userAkses:mahasiswa')->name('irs.download');
    Route::get('/user/mahasiswa/fileKHS/{id}', [KHSController::class, 'download'])->middleware('userAkses:mahasiswa')->name('khs.download');
    //Operator
    Route::get('/user/operator',[UserController::class,'operator'])->middleware('userAkses:operator');
    Route::get('/user/operator/profile',[OperatorController::class,'profile'])->middleware('userAkses:operator');
        //Buat akun
        Route::get('/user/operator/tambahMahasiswa',[OperatorController::class,'createMahasiswa'])->middleware('userAkses:operator');
        Route::post('/user/operator/tambahMahasiswa',[OperatorController::class,'storemhs'])->middleware('userAkses:operator')->name('mahasiswa.store');
        Route::get('/user/operator/tambahdosenWali',[OperatorController::class,'createdosenWali'])->middleware('userAkses:operator');
        Route::post('/user/operator/tambahdosenWali', [OperatorController::class, 'storedoswal'])->middleware('userAkses:operator')->name('dosenwali.store');


        Route::get('/user/operator/tambahOperator',[OperatorController::class,'createOperator'])->middleware('userAkses:operator');
        //Kelola akun
        Route::get('/user/operator/kelolaMahasiswa',[OperatorController::class,'kelolaMahasiswa'])->middleware('userAkses:operator');
        Route::get('/user/operator/keloladosenWali',[OperatorController::class,'keloladosenWali'])->middleware('userAkses:operator');

    //Dosen Wali
    Route::get('/user/dosenWali',[UserController::class,'dosenWali'])->middleware('userAkses:dosenWali');

    //Departemen
    Route::get('/user/departemen',[UserController::class,'departemen'])->middleware('userAkses:departemen');
    Route::get('/user/departemen/DataMahasiswa',[DepartemenController::class,'dataMHS'])->middleware('userAkses:departemen');
    Route::get('/user/departemen/ProfilDepartemen',[DepartemenController::class,'ProfilDepartemen'])->middleware('userAkses:departemen');
    Route::get('/user/departemen/ProgresPKL',[DepartemenController::class,'ProgresPKL'])->middleware('userAkses:departemen');
    Route::get('/user/departemen/ProgresSkripsi',[DepartemenController::class,'ProgresSkripsi'])->middleware('userAkses:departemen');

    Route::get('/logout',[SessionController::class, 'logout']);
});


