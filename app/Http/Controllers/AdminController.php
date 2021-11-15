<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function surat()
    {
        return view('admin.surat');
    }


    public function suratTugas()
    {
        return view('admin.suratTugas');
    }

    public function suratKegiatan()
    {
        return view('admin.suratKegiatan');
    }

    public function suratSKdekan()
    {
        return view('admin.suratSKdekan');
    }

    public function arsipSurat()
    {
        return view('admin.arsipSurat');
    }
}
