<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PresensiAdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\CetakLaporanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['guest:karyawan'])->group(function() {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
});

Route::middleware(['guest:user'])->group(function() {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
});

Route::middleware(['auth:user'])->group(function () {
    //dashboard
    Route::get('/dashboard/admin', [DashboardAdminController::class, 'index'])->name('admin.index');

    //data karyawan
    Route::get('admin/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('admin/karyawan/tambah', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('admin/karyawan/tambah', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('admin/karyawan/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::patch('admin/karyawan/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('admin/karyawan/{karyawan}/hapus', [KaryawanController::class, 'destroy'])->name('karyawan.delete');

    //cetak laporan
    Route::get('/cetak_laporan', [CetakLaporanController::class, 'index_tahun'])->name('cetaklaporan.index.tahun');
    Route::get('/cetak_laporan/{tahun}', [CetakLaporanController::class, 'index_bulan'])->name('cetaklaporan.index.bulan');
    Route::get('/cetak_laporan/{tahun}/{bulan}', [CetakLaporanController::class, 'index'])->name('cetaklaporan.index');


    //presensi
    Route::get('admin/presensi', [PresensiAdminController::class, 'index'])->name('presensi.index');
    Route::delete('admin/presensi/{presensi}/hapus', [PresensiAdminController::class, 'destroy'])->name('presensi.delete');




});

Route::middleware(['auth'])->group(function () {
    Route::get('/proseslogout', [AuthController::class, 'proseslogout'])->name('proseslogout');
});

Route::post('/proseslogin', [AuthController::class, 'proseslogin']);

Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //Presensi
    Route::get('/presensi/create', [PresensiController::class, 'create']);
    Route::post('/presensi/store', [PresensiController::class, 'store']);

    //Edit Profile
    Route::get('/editprofile', [PresensiController::class, 'editprofile']);
    Route::post('presensi/{nik}/updateprofile', [PresensiController::class, 'updateprofile']);

    Route::get('reset_password', function() {
        DB::table('karyawan')->where('nik', '12345')->update(['password'=> Hash::make('12345')]);
    });
});



