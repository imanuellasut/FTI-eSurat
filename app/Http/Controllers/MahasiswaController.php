<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    public function suratMasuk()
    {
        return view('mahasiswa.suratMasuk');
    }

    public function suratKeluar()
    {
        return view('mahasiswa.suratKeluar');
    }

    public function suratTugas()
    {
        return view('mahasiswa.suratTugas');
    }

    public function suratKegiatan()
    {
        return view('mahasiswa.suratKegiatan');
    }

    public function arsipSurat()
    {
        return view('mahasiswa.arsipSurat');
    }

    public function getSuratKeluar()
    {
        $surat = DB::table('users')
            ->where('id', Auth::user())
            ->get();

        dd($surat);
    }
}
