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
        $allSurats = Surats::with('validasi', 'user')->orderBy('updated_at', 'desc')->paginate(10);

        $validasiA = DB::table('surats')->where('id_jenis_surats', 'A')->get()->count();
        $validasiB = DB::table('surats')->where('id_jenis_surats', 'B')->get()->count();
        $validasiC = DB::table('surats')->where('id_jenis_surats', 'C')->get()->count();
        $validasiD = DB::table('surats')->where('id_jenis_surats', 'D')->get()->count();
        $validasiE = DB::table('surats')->where('id_jenis_surats', 'E')->get()->count();
        return view('admin.dashboard', compact('allSurats','validasiA','validasiB','validasiC','validasiD','validasiE'));
    }

    public function surat()
    {
        return view('admin.surat');
    }

    public function getAllSurat()
    {

        $allSurats = Surats::with('validasi', 'user')->orderBy('updated_at', 'desc')->paginate(5);

        $validasiA = DB::table('surats')->where('id_jenis_surats', 'A')->get()->count();
        $validasiB = DB::table('surats')->where('id_jenis_surats', 'B')->get()->count();
        $validasiC = DB::table('surats')->where('id_jenis_surats', 'C')->get()->count();
        $validasiD = DB::table('surats')->where('id_jenis_surats', 'D')->get()->count();
        $validasiE = DB::table('surats')->where('id_jenis_surats', 'E')->get()->count();

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
        return redirect()->back()->with(['error' => 'Berhasil Menghapus Surat']);
    }

    //Surat tugas
        public function buatSuratTugas() {
            return view('admin.suratTugas');
        }

        public function simpanSuratTugas(Request $request) {

            $data = $request->all();

            $surat = new Surats;
            $surat->id_user = $data['id_user'];
            $surat->id_jenis_surats = $data['id_jenis_surats'];
            $surat->nama_jenis_surat = $data['nama_jenis_surat'];
            $surat->pengaju = $data['pengaju'];
            $surat->tema = $data['tema'];
            $surat->prihal = $data['prihal'];
            $surat->nama_mitra = $data['nama_mitra'];
            $surat->tgl_pelaksanaan = $data['tgl_pelaksanaan'];
            $surat->lokasi = $data['lokasi'];
            $surat->keterangan = $data['keterangan'];
            $surat->tipe_surat = $data['tipe_surat'];
            $surat->status = $data['status'];
            $surat->save();

            return redirect('admin/surat')->with('status', 'Berhasil Tambah Surat Tugas');
        }

        public function editSuratTugas($id) {
            $surat = Surats::findOrfail($id);
            return view('admin.editSurat_tugas', compact('surat'));
        }

        public function updateSuratTugas($id, Request $request) {
            $surat = Surats::findOrfail($id);
            $surat->update($request->all());

            return redirect('admin/surat');
        }

        // public function cetakSuratTugas($id) {

        //     $cetak = Surats::with('user', 'validasi')->findOrFail($id);
        //     //$cetakSuratJson = Surats::($id)->toArray();
        //     // $jsonData = json_decode($cetakSuratJson, true);

        //     // $cetakData = Surats::findOrFail($id);

        //     // $cetakSuratJson = Surats::findOrFail($id);
        //     $jsonData = DB::table('surats')
        //                 -> select('pengaju')
        //                 -> where('id', $id)->get()->toJson();

        //     // $cetakSuratJson = Surats::with('validasi', 'user')->where('id', $id)->orderBy('updated_at', 'desc')->get()->toJson();
        //     // $cetakSuratJson = json_decode($jsonData);
        //     // $cetak = Surats::with('user', 'validasi')->get($id);
        //     // $cetakData['cetakSurat'] =  $cetakSuratJson;
        //     $pengaju = json_decode($jsonData, true);
        //     // var_dump(json_decode($jsonData, true));
        //     // dd($pengaju);

        //     //$cetakData['jsonData'] = $jsonData;

        //     return view('surat.cetakSuratTugas', compact('cetak', 'pengaju'));
        // }

        public function cetakSuratTugas($id) {
            $options = new Options();
            $dompdf = new Dompdf($options);
            $options->setIsHtml5ParserEnabled(true);
            $options->setDebugPng(true);

            $cetak = Surats::with('user', 'validasi')->findOrfail($id);
            // $pdf = PDF::loadview('surat.cetakSuratTugas', ['cetak' => $cetak]);

            $html = view('surat.cetakSuratTugas', compact('cetak'));

            // $pdf = new Dompdf();

            $dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation
            // $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            // return $dompdf->stream();

            return $dompdf->stream('Surat Tugas.pdf', array('Attachment' => false));
            //return view('surat.cetaksuratTugas', compact('cetak'));
        }

    //End Surat Tugas

    //Surat Keterangan
        public function suratsuratKeterangan() {
            return view('admin.suratKeterangan');
        }

        public function simpanSuratKeterangan(Request $request)
        {
            Surats::create([
                'id_user' => $request->id_user,
                'id_jenis_surats' => $request->id_jenis_surats,
                'nama_jenis_surat' => $request->nama_jenis_surat,
                'prihal' => $request->prihal,
                'tema' => $request->tema,
                'nama_mitra' => $request->nama_mitra,
                'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
                'waktu_mulai' => $request->waktu_mulai,
                'waktu_selesai' => $request->waktu_selesai,
                'lokasi' => $request->lokasi,
                'isi_surat' => $request->isi_surat,
                'tipe_surat' => $request->tipe_surat,
                'status' => $request->status,
            ]);

            return redirect('admin/surat')->with(['success' => 'Berhasil Tambah Surat Keterangan']);
        }

        public function editSuratKeterangan($id)
        {
            $surat = Surats::findOrfail($id);
            return view('admin.editSurat_tugas', compact('surat'));
        }

        public function cetakSuratKeterangan($id) {
            $options = new Options();
            $dompdf = new Dompdf($options);
            $options->setIsHtml5ParserEnabled(true);
            $options->setDebugPng(true);

            $cetak = Surats::with('user', 'validasi')->findOrfail($id);
            // $pdf = PDF::loadview('surat.cetakSuratTugas', ['cetak' => $cetak]);

            $html = view('surat.cetakSuratKeterangan', compact('cetak'));

            // $pdf = new Dompdf();

            $dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation
            // $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            // return $dompdf->stream();

            return $dompdf->stream('Surat Keterangan.pdf', array('Attachment' => false));
            //return view('surat.cetaksuratTugas', compact('cetak'));
        }
    //End Surat Keterangan


    public function suratSKdekan()
    {
        return view('admin.suratSKdekan');
    }

    public function suratUndangan()
    {
        return view('admin.suratUndangan');
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
