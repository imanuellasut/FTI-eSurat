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

Route::get('/ajax', function () {
    return view('ajax');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/surat', [AdminController::class, 'getAllSurat'])->name('admin.surat');
    Route::post('/surat/validasi/{id}', [AdminController::class, 'validasiSurat'])->name('validasi-surat');

    //Surat Tugas
    Route::get('/buat-surat/surat-tugas', [AdminController::class, 'buatSuratTugas'])->name('admin.suratTugas');
    Route::post('/surat/surat-tugas/simpan', [AdminController::class, 'simpanSuratTugas'])->name('admin-simpan-surat-tugas');
    Route::get('/surat/edit-surat-tugas/id-{id}', [AdminController::class, 'editSuratTugas'])->name('edit-surat-tugas');
    Route::post('/surat/update-surat-tugas/{id}', [AdminController::class, 'updateSuratTugas'])->name('update-surat-tugas');
    Route::get('/surat/hapus-surat/id-{id}', [AdminController::class, 'hapusSurat'])->name('hapus-surat');
    Route::get('/surat/surat-tugas/cetak-{id}', [AdminController::class, 'cetakSuratTugas'])->name('cetak-surat-tugas');
    //End Surat Tugas

    //Surat Keterangan
    Route::get('/buat-surat/surat-keterangan', [AdminController::class, 'suratsuratKeterangan'])->name('admin.suratKeterangan');
    Route::post('/surat/surat-keterangan/simpan', [AdminController::class, 'simpanSuratKeterangan'])->name('admin-simpan-surat-keterangan');
    Route::get('/surat/edit-surat-keterangan/id-{id}', [AdminController::class, 'editSuratKeterangan'])->name('edit-surat-keterangan');
    Route::post('/surat/update-surat-keterangan/{id}', [AdminController::class, 'updatSuratKegiatan'])->name('update-surat-keterangan');
    Route::get('/surat/surat-keterangan/cetak-{id}', [AdminController::class, 'cetakSuratKeterangan'])->name('cetak-surat-keterangan');
    //End Surat Keterangan

    //Surat SK Dekan
    Route::get('/buat-surat/surat-sk-dekan', [AdminController::class, 'suratSKdekan'])->name('admin-sk-dekan');
    Route::post('/surat/surat-sk-dekan/simpan', [AdminController::class, 'simpanSKdekan'])->name('admin-simpan-sk-dekan');
    Route::get('/surat/surat-sk-dekan/cetak-{id}', [AdminController::class, 'cetakSKdekan'])->name('cetak-surat-sk-dekan');
    //End Surat Sk Dekan

    //Surat Undangan
    Route::get('/buat-surat/surat-undangan', [AdminController::class, 'suratUndangan'])->name('surat-undangan');
    Route::post('/surat/surat-undangan/simpan', [AdminController::class, 'simpanSuratUndangan'])->name('simpan-surat-undangan');
    Route::post('/surat/surat-undangan/cetak-{id}', [AdminController::class, 'cetakSuratUndangan'])->name('cetak-surat-undangan');
    //End Surat Undangan

    //Berita Acara
    Route::get('/buat-surat/berita-acara', [AdminController::class, 'beritaAcara']);
    Route::post('/surat/berita-acara/simpan', [AdminController::class, 'simpanBeritaAcara'])->name('simpan-berita-acara');
    //End Berita Acara

});

Route::group(['prefix' => 'dosen', 'middleware' => ['isDosen', 'auth', 'PreventBackHistory']], function () {
    Route::get('/dashboard', [DosenController::class, 'index'])->name('dosen.dashboard');
    Route::get('/surat-masuk', [DosenController::class, 'suratMasuk'])->name('dosen.suratMasuk');
    Route::get('/surat-keluar', [DosenController::class, 'suratKeluar'])->name('dosen.suratKeluar');
    Route::get('/surat-keluar/hapus-surat/id-{id}', [DosenController::class, 'hapusSurat']);

    //Surat Tugas
    Route::get('/pengajuan-surat/surat-tugas', [DosenController::class, 'suratTugas'])->name('dosen.suratTugas');
    Route::post('/pengajuan-surat/surat-tugas/simpan', [DosenController::class, 'simpanSuratTugasDosen'])->name('simpan-surat-tugasDosen');

    //Surat Keterangan
    Route::get('/pengajuan-surat/surat-keterangan', [DosenController::class, 'suratKeterangan'])->name('surat-keterangan');
    Route::post('/pengajuan-surat/surat-keterangan/simpan', [DosenController::class, 'simpanSuratKeterangan'])->name('dosen-simpan-surat-keterangan');

    //Berita Acara
    Route::get('/pengajuan-surat/berita-acara', [DosenController::class, 'beritaAcara'])->name('berita-acara');
    Route::post('/pengajuan-surat/berita-acara/simpan', [DosenController::class, 'simpanBeritaAcara'])->name('simpan-berita-acara');

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

    //Surat Keterangan
    Route::get('/pengajuan-surat/surat-keterangan', [MahasiswaController::class, 'suratKeterangan'])->name('mahasiswa.suratKegiatan');
    Route::post('/pengajuan-surat/surat-kegiatan/simpan', [MahasiswaController::class, 'simpanSuratKeterangan'])->name('simpan-surat-keterangan');
    Route::get('/surat-keluar/edit-surat-kegiatan/id-{id}', [MahasiswaController::class, 'editSuratKeterangan'])->name('edit-surat-kegiatan');
    Route::post('/surat-keluar/update-surat-kegiatan/{id}', [MahasiswaController::class, 'updateSuratKeterangan'])->name('update-surat-kegiatan');
    //End Surat Keterangan

    Route::get('/arsip-surat', [MahasiswaController::class, 'arsipSurat'])->name('mahasiswa.arsipSurat');
});
