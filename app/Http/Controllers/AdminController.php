<?php

namespace App\Http\Controllers;

use App\Models\Surats;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;

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

    public function getAllSurat()
    {

        $allSurats = Surats::with('user')->paginate(5);
        return view('admin.surat', compact('allSurats'));
    }

    public function editSurat($id)
    {
        $surat = Surats::findorfail($id);
        return view('admin.editSurat_tugas', compact('surat'));
    }

    public function cetakSurat($id)
    {
        $cetak = Surats::with('user')->findorfail($id);
        $html = view('surat.cetakSuratTugas', compact('cetak'));

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

        //return view('surat.cetaksuratTugas', compact('cetak'));
    }

    public function suratTugas()
    {
        return view('admin.suratTugas');
    }

    public function CetaksuratTugas()
    {
        // $surat = Surats::with('user')->all();

        // $pdf = PDF::loadview(, ['surats' => $surat]);

        // return view('admin.suratTugas');
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
