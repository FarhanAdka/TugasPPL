<?php

use App\Http\Controllers\IRSController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PKLController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\DoswalController;
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
    Route::middleware(['userAkses:mahasiswa'])->group(function (){
        Route::get('/user/mahasiswa',[userController::class,'mahasiswa']);
        Route::resource('/user/mahasiswa/IRS', IRSController::class);
        Route::resource('/user/mahasiswa/KHS', KHSController::class);
        Route::get('/user/mahasiswa/PKL', [PKLController::class, 'index']);
        Route::get('/user/mahasiswa/PKL/create', [PKLController::class, 'create'])->name('PKL.create');
        Route::post('/user/mahasiswa/PKL', [PKLController::class, 'store'])->name('PKL.store');
        Route::get('/user/mahasiswa/profile',[MahasiswaController::class,'profile'])->name('mahasiswa.profile');
        Route::post('/user/mahasiswa/profile',[MahasiswaController::class,'update'])->name('mahasiswa.update');
        Route::get('/user/mahasiswa/fileIRS/{id}', [IRSController::class, 'download'])->name('irs.download');
        Route::get('/user/mahasiswa/fileKHS/{id}', [KHSController::class, 'download'])->name('khs.download');
        Route::get('/user/mahasiswa/filePKL/{id}', [PKLController::class, 'download'])->name('pkl.download');
        Route::get('/user/mahasiswa/fileSkripsi/{id}', [SkripsiController::class, 'download'])->name('skripsi.download');

        Route::get('/user/mahasiswa/Skripsi', [SkripsiController::class, 'index']);
        Route::get('/user/mahasiswa/Skripsi/create', [SkripsiController::class, 'create'])->name('skripsi.create');
        Route::post('/user/mahasiswa/Skripsi', [SkripsiController::class, 'store'])->name('skripsi.store');
    });
    // Route::get('/user/mahasiswa',[userController::class,'mahasiswa'])->middleware('userAkses:mahasiswa');
    // Route::resource('/user/mahasiswa/IRS', IRSController::class)->middleware('userAkses:mahasiswa');
    // Route::resource('/user/mahasiswa/KHS', KHSController::class)->middleware('userAkses:mahasiswa');
    // Route::get('/user/mahasiswa/PKL', [PKLController::class, 'index'])->middleware('userAkses:mahasiswa');
    // Route::get('/user/mahasiswa/PKL/create', [PKLController::class, 'create'])->middleware('userAkses:mahasiswa')->name('PKL.create');
    // Route::post('/user/mahasiswa/PKL', [PKLController::class, 'store'])->middleware('userAkses:mahasiswa')->name('PKL.store');
    // Route::get('/user/mahasiswa/profile',[MahasiswaController::class,'profile'])->middleware('userAkses:mahasiswa');
    // Route::get('/user/mahasiswa/fileIRS/{id}', [IRSController::class, 'download'])->middleware('userAkses:mahasiswa')->name('irs.download');
    // Route::get('/user/mahasiswa/fileKHS/{id}', [KHSController::class, 'download'])->middleware('userAkses:mahasiswa')->name('khs.download');
    // Route::get('/user/mahasiswa/filePKL/{id}', [PKLController::class, 'download'])->middleware('userAkses:mahasiswa')->name('pkl.download');
    // Route::get('/user/mahasiswa/fileSkripsi/{id}', [SkripsiController::class, 'download'])->middleware('userAkses:mahasiswa')->name('skripsi.download');

    // Route::get('/user/mahasiswa/Skripsi', [SkripsiController::class, 'index'])->middleware('userAkses:mahasiswa');
    // Route::get('/user/mahasiswa/Skripsi/create', [SkripsiController::class, 'create'])->middleware('userAkses:mahasiswa')->name('skripsi.create');
    // Route::post('/user/mahasiswa/Skripsi', [SkripsiController::class, 'store'])->middleware('userAkses:mahasiswa')->name('skripsi.store');

    
    //Operator
    Route::get('/user/operator',[UserController::class,'operator'])->middleware('userAkses:operator');
    Route::get('/user/operator/profile',[OperatorController::class,'profile'])->middleware('userAkses:operator');
        //Buat akun
        Route::get('/user/operator/tambahMahasiswa',[OperatorController::class,'createMahasiswa'])->middleware('userAkses:operator');
        Route::post('/user/operator/tambahMahasiswa',[OperatorController::class,'storemhs'])->middleware('userAkses:operator')->name('mahasiswa.store');
        Route::get('/user/operator/tambahdosenWali',[OperatorController::class,'createdosenWali'])->middleware('userAkses:operator');
        Route::post('/user/operator/tambahdosenWali', [OperatorController::class, 'storedoswal'])->middleware('userAkses:operator')->name('dosenwali.store');
        Route::get('/user/operator/tambahDataMahasiswa',[OperatorController::class,'createDataMahasiswa'])->middleware('userAkses:operator')->name('datamhs.create');
        Route::post('/user/operator/tambahDataMahasiswa',[OperatorController::class,'storeDataMahasiswa'])->middleware('userAkses:operator')->name('datamhs.store');


        Route::get('/user/operator/tambahOperator',[OperatorController::class,'createOperator'])->middleware('userAkses:operator');
        //Kelola akun
        Route::get('/user/operator/kelolaMahasiswa',[OperatorController::class,'kelolaMahasiswa'])->middleware('userAkses:operator');
        Route::get('/user/operator/kelolamahasiswa/{id}/edit',[OperatorController::class,'editMahasiswa'])->middleware('userAkses:operator')->name('mahasiswa.edit');
        Route::put('/user/operator/kelolamahasiswa/{id}',[OperatorController::class,'updateMahasiswa'])->middleware('userAkses:operator')->name('kelolamahasiswa.store');
        Route::delete('/user/operator/kelolamahasiswa/{id}',[OperatorController::class,'destroyMahasiswa'])->middleware('userAkses:operator')->name('mahasiswa.destroy');
        Route::get('/user/operator/keloladosenWali',[OperatorController::class,'keloladosenWali'])->middleware('userAkses:operator');

        //Edit akun
        Route::put('/user/operator/keloladosenWali/edit/{id}',[OperatorController::class,'updatedosenWali'])->name('updatedosenWali')->middleware('userAkses:operator');
        Route::get('/user/operator/keloladosenWali/edit/{id}',[OperatorController::class,'editdosenWali'])->middleware('userAkses:operator');

        Route::put('/user/operator/kelolaMahasiswa/edit/{id}',[OperatorController::class,'updateMahasiswa'])->name('updateMahasiswa')->middleware('userAkses:operator');
        Route::get('/user/operator/kelolaMahasiswa/edit/{id}',[OperatorController::class,'editMahasiswa'])->middleware('userAkses:operator');
    //Dosen Wali
    Route::middleware(['userAkses:dosen_wali'])->group(function (){
        Route::get('/user/dosenWali',[UserController::class,'dosenWali'])->middleware('userAkses:dosen_wali');
        Route::get('/user/dosenWali/verifikasiIRS', [IRSController::class, 'indexVerif'])->name('verifIRS');
        Route::get('/user/dosenWali/IRS', [IRSController::class, 'indexDosen'])->name('indexIRS');
        Route::get('/user/dosenWali/approveIRS/{id}', [IRSController::class ,'approve'])->name('IRS.approve');
        Route::delete('/user/dosenWali/deleteIRS/{id}', [IRSController::class ,'delete'])->name('IRS.delete');
        Route::get('/user/dosenWali/verifikasiKHS', [KHSController::class, 'indexVerif'])->name('verifKHS');
        Route::get('/user/dosenWali/KHS', [KHSController::class, 'indexDosen'])->name('indexKHS');
        Route::get('/user/dosenWali/approveKHS/{id}', [KHSController::class ,'approve'])->name('KHS.approve');
        Route::delete('/user/dosenWali/deleteKHS/{id}', [KHSController::class ,'delete'])->name('KHS.delete');
        Route::get('/user/dosenWali/verifikasiPKL', [PKLController::class, 'indexVerif'])->name('verifPKL');
        Route::get('/user/dosenWali/PKL', [PKLController::class, 'indexDosen'])->name('indexPKL');
        Route::get('/user/dosenWali/approvePKL/{id}', [PKLController::class ,'approve'])->name('PKL.approve');
        Route::delete('/user/dosenWali/deletePKL/{id}', [PKLController::class ,'delete'])->name('PKL.delete');
        Route::get('/user/dosenWali/verifikasiSkripsi', [SkripsiController::class, 'indexVerif'])->name('verifSkripsi');
        Route::get('/user/dosenWali/Skripsi', [SkripsiController::class, 'indexDosen'])->name('indexSkripsi');
        Route::get('/user/dosenWali/approveSkripsi/{id}', [SkripsiController::class ,'approve'])->name('Skripsi.approve');
        Route::delete('/user/dosenWali/deleteSkripsi/{id}', [SkripsiController::class ,'delete'])->name('Skripsi.delete');
    });
    //Departemen
    Route::middleware(['userAkses:departemen'])->group(function (){
        Route::get('/user/departemen',[UserController::class,'departemen'])->middleware('userAkses:departemen');
        Route::get('/user/departemen/DataMahasiswa',[DepartemenController::class,'dataMHS']);
        Route::get('/user/departemen/ProfilDepartemen',[DepartemenController::class,'ProfilDepartemen']);
        Route::get('/user/departemen/ProgresPKL',[DepartemenController::class,'ProgresPKL']);
        Route::get('/user/departemen/ProgresSkripsi',[DepartemenController::class,'ProgresSkripsi']);
        Route::get('/user/departemen/ProgresStudi/{ProgresStudi}',[DepartemenController::class,'ProgresStudi'])->name('dept.studi');
        Route::get('/user/departemen/KHS/{id}',[DepartemenController::class,'KHS'])->name('dept.KHS');
        Route::get('/user/departemen/IRS/{id}',[DepartemenController::class,'IRS'])->name('dept.IRS');
    });
    Route::get('/logout',[SessionController::class, 'logout']);
});


