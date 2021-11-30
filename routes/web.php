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

    //Surat Tugas
    Route::get('/buat-surat/surat-tugas', [AdminController::class, 'buatSuratTugas'])->name('admin.suratTugas');
    Route::post('/surat/surat-tugas/simpan', [AdminController::class, 'simpanSuratTugas'])->name('simpan-surat-tugas');
    Route::get('/surat/edit-surat-tugas/id-{id}', [AdminController::class, 'editSuratTugas'])->name('edit-surat-tugas');
    Route::post('/surat/update-surat-tugas/{id}', [AdminController::class, 'updateSuratTugas'])->name('update-surat-tugas');
    Route::get('/surat/hapus-surat/id-{id}', [AdminController::class, 'hapusSurat'])->name('hapus-surat');
    Route::get('/surat/cetak-{id}', [AdminController::class, 'cetakSuratTugas'])->name('cetak-surat-tugas');
    //End Surat Tugas

    //Surat Kegiatan
    Route::get('/buat-surat/surat-kegiatan', [AdminController::class, 'suratKegiatan'])->name('admin.suratKegiatan');
    Route::post('/surat/surat-kegiatan/simpan', [AdminController::class, 'simpanSuratKegiatanMahasiswa'])->name('simpan-surat-kegiatan');
    Route::get('/surat/edit-surat-kegiatan/id-{id}', [AdminController::class, 'editSuratKegiatan'])->name('edit-surat-kegiatan');
    Route::post('/surat/update-surat-kegiatan/{id}', [AdminController::class, 'updatSuratKegiatan'])->name('update-surat-kegiatan');
    Route::get('/surat/cetak-{id}', [AdminController::class, 'cetakSuratTugas'])->name('cetak-surat-tugas');
    //End Surat Kegiatan

    Route::get('/buat-surat/surat-sk-dekan', [AdminController::class, 'suratSKdekan'])->name('admin.suratSKdekan');
});

Route::group(['prefix' => 'dosen', 'middleware' => ['isDosen', 'auth', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [DosenController::class, 'index'])->name('dosen.dashboard');
    Route::get('/surat-masuk', [DosenController::class, 'suratMasuk'])->name('dosen.suratMasuk');
    Route::get('/surat-keluar', [DosenController::class, 'suratKeluar'])->name('dosen.suratKeluar');
    //Surat Tugas
    Route::get('/pengajuan-surat/surat-tugas', [DosenController::class, 'suratTugas'])->name('dosen.suratTugas');
    Route::post('/pengajuan-surat/surat-tugas/simpan', [DosenController::class, 'simpanSuratTugasDosen'])->name('simpan-surat-tugasDosen');

    Route::get('/arsipSurat', [DosenController::class, 'arsipSurat'])->name('dosen.arsipSurat');
});

Route::group(['prefix' => 'mahasiswa', 'middleware' => ['isMahasiswa', 'auth', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
    Route::get('/surat-masuk', [MahasiswaController::class, 'suratMasuk'])->name('mahasiswa.suratMasuk');
    Route::get('/surat-keluar', [MahasiswaController::class, 'suratKeluar'])->name('mahasiswa.suratKeluar');
    Route::get('/surat-keluar/hapus-surat/id-{id}', [MahasiswaController::class, 'hapusSurat']);


    //Surat Tugas
    Route::get('/pengajuan-surat/surat-tugas', [MahasiswaController::class, 'suratTugas'])->name('mahasiswa.suratTugas');
    Route::post('/pengajuan-surat/surat-tugas/simpan', [MahasiswaController::class, 'simpanSuratTugasMahasiswa'])->name('simpan-surat-tugas');
    Route::get('/surat-keluar/edit-surat-tugas/id-{id}', [MahasiswaController::class, 'editSuratTugas'])->name('edit-surat-tugas');
    Route::post('/surat-keluar/update-surat-tugas/{id}', [MahasiswaController::class, 'updateSuratTugas'])->name('mahasiswa.updateSuratTugas');
    //End Surat Tugas

    //Surat Kegiatan
    Route::get('/pengajuan-surat/surat-kegiatan', [MahasiswaController::class, 'suratKegiatan'])->name('mahasiswa.suratKegiatan');
    Route::post('/pengajuan-surat/surat-kegiatan/simpan', [MahasiswaController::class, 'simpanSuratKegiatanMahasiswa'])->name('simpan-surat-kegiatan');
    Route::get('/surat-keluar/edit-surat-kegiatan/id-{id}', [MahasiswaController::class, 'editSuratKegiatan'])->name('edit-surat-kegiatan');
    Route::post('/surat-keluar/update-surat-kegiatan/{id}', [MahasiswaController::class, 'updatSuratKegiatan'])->name('update-surat-kegiatan');
    //End Surat Kegiatan

    Route::get('/arsip-surat', [MahasiswaController::class, 'arsipSurat'])->name('mahasiswa.arsipSurat');
});
