<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return view('dosen.dashboard');
    }

    public function suratMasuk()
    {
        return view('dosen.suratMasuk');
    }

    public function suratKeluar()
    {
        return view('dosen.suratKeluar');
    }

    public function suratTugas()
    {
        return view('dosen.suratTugas');
    }

    public function arsipSurat()
    {
        return view('dosen.arsipSurat');
    }
}
