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

        $allSurats = Surats::with('user')->orderBy('updated_at', 'desc')->paginate(5);
        return view('admin.surat', compact('allSurats'));
    }

    public function hapusSurat($id)
    {
        $surat = Surats::findOrfail($id)->delete();
        return redirect()->back();
    }

    public function buatSuratTugas()
    {
        return view('admin.suratTugas');
    }

    public function simpanSuratTugas(Request $request)
    {
        Surats::create([
            'id_user' => $request->id_user,
            'id_jenis_surats' => $request->id_jenis_surats,
            'nama_jenis_surat' => $request->nama_jenis_surat,
            'prihal' => $request->prihal,
            'nama_mitra' => $request->nama_mitra,
            'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'tipe_surat' => $request->tipe_surat,
            'status' => $request->status,
        ]);

        return redirect('admin/surat');
    }

    public function editSuratTugas($id)
    {
        $surat = Surats::findOrfail($id);
        return view('admin.editSurat_tugas', compact('surat'));
    }

    public function updateSuratTugas($id, Request $request)
    {
        $surat = Surats::findOrfail($id);
        $surat->update($request->all());

        return redirect('admin/surat');
    }


    public function cetakSuratTugas($id)
    {
        $cetak = Surats::with('user')->findOrfail($id);
        $html = view('surat.cetakSuratTugas', compact('cetak'));

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        // $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        // return $dompdf->stream();

        return $dompdf->stream('Surat Tugas.pdf');

        //return view('surat.cetaksuratTugas', compact('cetak'));
    }

    public function suratKegiatan()
    {
        return view('admin.suratKegiatan');
    }

    public function simpanSuratKegiatan(Request $request)
    {
        Surats::create([
            'id_user' => $request->id_user,
            'id_jenis_surats' => $request->id_jenis_surats,
            'nama_jenis_surat' => $request->nama_jenis_surat,
            'prihal' => $request->prihal,
            'nama_mitra' => $request->nama_mitra,
            'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'tipe_surat' => $request->tipe_surat,
            'status' => $request->status,
        ]);

        return redirect('admin/surat');
    }

    public function editSuratKegiatan($id)
    {
        $surat = Surats::findOrfail($id);
        return view('admin.editSurat_tugas', compact('surat'));
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
