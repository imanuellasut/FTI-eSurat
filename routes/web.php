<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SuratController;
use App\Models\Surats;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/surat', [AdminController::class, 'getAllSurat'])->name('admin.surat');
    Route::get('/surat/edit-surat/id-{id}', [AdminController::class, 'editSurat'])->name('edit-surat');
    Route::get('/surat/cetak-{id}', [AdminController::class, 'cetakSurat'])->name('cetak-surat');
    Route::get('/buat-surat/surat-tugas', [AdminController::class, 'suratTugas'])->name('admin.suratTugas');
    Route::get('/buat-surat/surat-kegiatan', [AdminController::class, 'suratKegiatan'])->name('admin.suratKegiatan');
    Route::get('/buat-surat/surat-sk-dekan', [AdminController::class, 'suratSKdekan'])->name('admin.suratSKdekan');
});

Route::group(['prefix' => 'dosen', 'middleware' => ['isDosen', 'auth', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [DosenController::class, 'index'])->name('dosen.dashboard');
    Route::get('/surat-masuk', [DosenController::class, 'suratMasuk'])->name('dosen.suratMasuk');
    Route::get('/surat-keluar', [DosenController::class, 'suratKeluar'])->name('dosen.suratKeluar');
    Route::get('/pengajuan-surat/surat-tugas', [DosenController::class, 'suratTugas'])->name('dosen.suratTugas');
    Route::get('/arsipSurat', [DosenController::class, 'arsipSurat'])->name('dosen.arsipSurat');
});

Route::group(['prefix' => 'mahasiswa', 'middleware' => ['isMahasiswa', 'auth', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
    Route::get('/surat-masuk', [MahasiswaController::class, 'suratMasuk'])->name('mahasiswa.suratMasuk');
    Route::get('/surat-keluar', [MahasiswaController::class, 'suratKeluar'])->name('mahasiswa.suratKeluar');
    Route::get('/pengajuan-surat/surat-tugas', [MahasiswaController::class, 'suratTugas'])->name('mahasiswa.suratTugas');
    Route::post('/pengajuan-surat/surat-tugas/simpan', [MahasiswaController::class, 'simpanSuratTugasMahasiswa'])->name('simpan-surat-tugas');
    Route::get('/pengajuan-surat/surat-kegiatan', [MahasiswaController::class, 'suratKegiatan'])->name('mahasiswa.suratKegiatan');
    Route::post('/pengajuan-surat/surat-kegiatan/simpan', [MahasiswaController::class, 'simpanSuratKegiatanMahasiswa'])->name('simpan-surat-kegiatan');
    Route::get('/arsip-surat', [MahasiswaController::class, 'arsipSurat'])->name('mahasiswa.arsipSurat');
});
