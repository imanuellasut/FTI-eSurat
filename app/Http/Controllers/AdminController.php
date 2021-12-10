<?php

namespace App\Http\Controllers;

use App\Models\Surats;
use App\Models\User;
use App\Models\Validasi;
use Barryvdh\DomPDF\PDF;
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

        $allSurats = Surats::with('validasi', 'user')->orderBy('updated_at', 'desc')->paginate(5);

        $validasiD = DB::table('surats')->where('id_jenis_surats', 'D')->get()->count();
        return view('admin.surat', compact('allSurats', 'validasiD'));
    }

    public function validasiSurat($id, Request $request)
    {
        $surat = Surats::findOrfail($id);
        $surat->update($request->all());

        return redirect('admin/surat');
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

        $data = $request->all();
        //dd($data);

        $user = new User;

        $surat = new Surats;
        $surat->id_user = $data['id_user'];
        $surat->id_jenis_surats = $data['id_jenis_surats'];
        $surat->nama_jenis_surat = $data['nama_jenis_surat'];
        $surat->id_pengaju = $data['id_pengaju'];
        $surat->nama_pengaju = $data['nama_pengaju'];
        $surat->prihal = $data['prihal'];
        $surat->nama_mitra = $data['nama_mitra'];
        $surat->tgl_pelaksanaan = $data['tgl_pelaksanaan'];
        $surat->lokasi = $data['lokasi'];
        $surat->keterangan = $data['keterangan'];
        $surat->tipe_surat = $data['tipe_surat'];
        $surat->status = $data['status'];
        $surat->save();


        // Surats::create([
        //     'id_user' => $request->id_user,
        //     'id_jenis_surats' => $request->id_jenis_surats,
        //     'nama_jenis_surat' => $request->nama_jenis_surat,
        //     'id_pengaju' => $request->id_pengaju,
        //     'nama_pengaju' => $request->nama_pengaju,
        //     'prihal' => $request->prihal,
        //     'nama_mitra' => $request->nama_mitra,
        //     'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
        //     'lokasi' => $request->lokasi,
        //     'keterangan' => $request->keterangan,
        //     'tipe_surat' => $request->tipe_surat,
        //     'status' => $request->status,
        // ]);

        return redirect()->back()->with('status', 'Surat Tugas berhasil Ditambahkan');
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

    public function cetakSuratTugas($id) {

        $cetak = Surats::with('user', 'validasi')->findOrFail($id);

        // $cetakSurat = Surats::with('user', 'validasi')->findOrfail($id)->first();
        // $cetak['cetakSurat'] =  $cetakSurat;
        // $cetak = json_decode($dataSurat);

        // dd($cetak);

        return view('surat.cetakSuratTugas', compact('cetak'));
    }

    // public function cetakSuratTugas($id)
    // {
    //     $options = new Options();
    //     $dompdf = new Dompdf($options);
    //     $options->setIsHtml5ParserEnabled(true);
    //     $options->setDebugPng(true);

    //     $cetak = Surats::with('user', 'validasi')->findOrfail($id);
    //     // $pdf = PDF::loadview('surat.cetakSuratTugas', ['cetak' => $cetak]);

    //     $html = view('surat.cetakSuratTugas', compact('cetak'));

    //     // $pdf = new Dompdf();

    //     $dompdf->loadHtml($html);

    //     // (Optional) Setup the paper size and orientation
    //     // $dompdf->setPaper('A4', 'portrait');

    //     // Render the HTML as PDF
    //     $dompdf->render();

    //     // Output the generated PDF to Browser
    //     // return $dompdf->stream();

    //     return $dompdf->stream('Surat Tugas.pdf', array('Attachment' => false));
    //     //return view('surat.cetaksuratTugas', compact('cetak'));
    // }

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


    public function beritaAcara()
    {
        return view('admin.beritaAcara');
    }

    public function arsipSurat()
    {
        return view('admin.arsipSurat');
    }
}
