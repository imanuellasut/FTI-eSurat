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
        $allSurats = Surats::with('validasi', 'user')->orderBy('updated_at', 'desc')->paginate(20);

        $validasiA = DB::table('surats')->where('id_jenis_surats', 'A')->get()->count();
        $validasiB = DB::table('surats')->where('id_jenis_surats', 'B')->get()->count();
        $validasiC = DB::table('surats')->where('id_jenis_surats', 'C')->get()->count();
        $validasiD = DB::table('surats')->where('id_jenis_surats', 'D')->get()->count();
        $validasiE = DB::table('surats')->where('id_jenis_surats', 'E')->get()->count();
        $totalsurat = DB::table('surats')->get()->count();

        return view('admin.dashboard', compact('allSurats','validasiA','validasiB','validasiC','validasiD','validasiE', 'totalsurat'));
    }

    public function surat()
    {
        return view('admin.surat');
    }

    public function getAllSurat() {

        $allSurats = Surats::with('validasi', 'user')->orderBy('updated_at', 'desc')->paginate(20);

        $validasiA = DB::table('surats')->where('id_jenis_surats', 'A')->get()->count();
        $validasiB = DB::table('surats')->where('id_jenis_surats', 'B')->get()->count();
        $validasiC = DB::table('surats')->where('id_jenis_surats', 'C')->get()->count();
        $validasiD = DB::table('surats')->where('id_jenis_surats', 'D')->get()->count();
        $validasiE = DB::table('surats')->where('id_jenis_surats', 'E')->get()->count();
        $totalsurat = DB::table('surats')->get()->count();

        return view('admin.surat', compact('allSurats', 'validasiA', 'validasiB', 'validasiC', 'validasiD', 'validasiE', 'totalsurat'))->with('status', 'Berhasil Validasi');
    }

    public function validasiSurat($id, Request $request)
    {
        $surat = Surats::findOrfail($id);
        $surat->update($request->all());

        return redirect('admin/surat')->with(['success' => 'Berhasil Validasi']);
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
            $surat->idPengaju = $data['idPengaju'];
            $surat->namaPengaju = $data['namaPengaju'];
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
        //     dd($pengaju);

        //     //$cetakData['jsonData'] = $jsonData;

        //     //return view('surat.cetakSuratTugas', compact('cetak', 'pengaju'));
        // }

        public function cetakSuratTugas($id) {
            $options = new Options();
            $dompdf = new Dompdf($options);
            $options->setIsHtml5ParserEnabled(true);
            $options->setDebugPng(true);

            $cetak = Surats::with('user', 'validasi')->findOrfail($id);

            $cetakJson = Surats::findOrfail($id);

            $idPengaju = $cetakJson->idPengaju;
            $namaPengaju = $cetakJson->namaPengaju;

            // $jsonData = DB::table('surats')-> where('id', $id)->first();
            //
            //
            // // $collecttion = utf8_decode($jsonData);

            // $collecttion = json_decode(json_encode($jsonData),true);

            // dd($collecttion);

            // $pdf = PDF::loadview('surat.cetakSuratTugas', ['cetak' => $cetak]);

            $html = view('surat.cetakSuratTugas', ["cetak"=>$cetak, "cetakJson"=>$cetakJson , "idPengaju"=>$idPengaju , "namaPengaju"=>$namaPengaju]);

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

        public function cetakSuratTugasDosen($id) {
            $options = new Options();
            $dompdf = new Dompdf($options);
            $options->setIsHtml5ParserEnabled(true);
            $options->setDebugPng(true);

            $cetak = Surats::with('user', 'validasi')->findOrfail($id);

            $cetakJson = Surats::findOrfail($id);

            $idPengaju = $cetakJson->idPengaju;
            $namaPengaju = $cetakJson->namaPengaju;

            // $jsonData = DB::table('surats')
            //         -> select('pengaju')
            //         -> where('id', $id)->first();
            // // $collecttion = utf8_decode($jsonData);

            // $collecttion = json_decode(json_encode($jsonData),true);

            // dd($collecttion);

            // $pdf = PDF::loadview('surat.cetakSuratTugas', ['cetak' => $cetak]);

            $html = view('surat.cetakSuratTugasDosen', ["cetak"=>$cetak, "cetakJson"=>$cetakJson , "idPengaju"=>$idPengaju , "namaPengaju"=>$namaPengaju]);

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
                'keterangan' => $request->keterangan,
                'penutup_surat' => $request->penutup_surat,
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

        // public function cetakSuratKeterangan($id) {

        //     $cetak = Surats::with('user', 'validasi')->findOrFail($id);
        //     //$cetakSuratJson = Surats::($id)->toArray();
        //     // $jsonData = json_decode($cetakSuratJson, true);

        //     // $cetakData = Surats::findOrFail($id);

        //     // $cetakSuratJson = Surats::findOrFail($id);
        //     // $jsonData = DB::table('surats')
        //     //             -> select('pengaju')
        //     //             -> where('id', $id)->get()->toJson();

        //     // $cetakSuratJson = Surats::with('validasi', 'user')->where('id', $id)->orderBy('updated_at', 'desc')->get()->toJson();
        //     // $cetakSuratJson = json_decode($jsonData);
        //     // $cetak = Surats::with('user', 'validasi')->get($id);
        //     // $cetakData['cetakSurat'] =  $cetakSuratJson;
        //     // $pengaju = json_decode($jsonData, true);
        //     // var_dump(json_decode($jsonData, true));
        //     // dd($pengaju);

        //     //$cetakData['jsonData'] = $jsonData;

        //     return view('surat.cetakSuratKeterangan', compact('cetak'));
        //}

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

    //Surat Keputusan Dekan
        public function suratSKdekan() {
            return view('admin.suratSKdekan');
        }

        public function simpanSKdekan(Request $request) {

            $data = $request->all();

            $surat = new Surats;
            $surat->id_user = $data['id_user'];
            $surat->id_jenis_surats = $data['id_jenis_surats'];
            $surat->nama_jenis_surat = $data['nama_jenis_surat'];
            $surat->prihal = $data['prihal'];
            $surat->menimbang = $data['menimbang'];
            $surat->mengingat = $data['mengingat'];
            $surat->menetapkan = $data['menetapkan'];
            $surat->tipe_surat = $data['tipe_surat'];
            $surat->status = $data['status'];
            $surat->save();

            return redirect('admin/surat')->with('status', 'Berhasil Tambah Surat Keputusan Dekan');
        }

        public function cetakSKdekan($id) {
            $options = new Options();
            $dompdf = new Dompdf($options);
            $options->setIsHtml5ParserEnabled(true);
            $options->setDebugPng(true);

            $cetak = Surats::with('user', 'validasi')->findOrfail($id)->first();
            $cetakJson = Surats::findOrfail($id);

            //$cetak = Surats::with('user', 'validasi')->findOrfail($id);
            // $pdf = PDF::loadview('surat.cetakSuratTugas', ['cetak' => $cetak]);

            $html = view('surat.cetakSuratKeputusan', compact('cetak', 'cetakJson'));

            // $pdf = new Dompdf();

            $dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation
            // $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            // return $dompdf->stream();

            return $dompdf->stream('Surat Keputusan.pdf', array('Attachment' => false));
            // return view('surat.cetaksuratTugas', compact('cetak'));
        }

    //End Surat Keputusan Dekan

    // Surat Undangan
        public function suratUndangan() {
            return view('admin.suratUndangan');
        }

        public function simpanSuratUndangan(Request $request) {

            $data = $request->all();

            $surat = new Surats;
            $surat->id_user = $data['id_user'];
            $surat->id_jenis_surats = $data['id_jenis_surats'];
            $surat->nama_jenis_surat = $data['nama_jenis_surat'];
            $surat->prihal = $data['prihal'];
            $surat->tema = $data['tema'];
            $surat->nama_mitra = $data['nama_mitra'];
            $surat->tgl_pelaksanaan = $data['tgl_pelaksanaan'];
            $surat->waktu_mulai = $data['waktu_mulai'];
            $surat->waktu_selesai = $data['waktu_selesai'];
            $surat->lokasi = $data['lokasi'];
            $surat->isi_surat = $data['isi_surat'];
            $surat->keterangan = $data['keterangan'];
            $surat->tipe_surat = $data['tipe_surat'];
            $surat->status = $data['status'];
            $surat->save();


            return redirect('admin/surat')->with('status', 'Berhasil Tambah Surat Tugas');
        }

        // public function cetakSuratKeterangan($id) {

        //     $cetak = Surats::with('user', 'validasi')->findOrFail($id);
        //     //$cetakSuratJson = Surats::($id)->toArray();
        //     // $jsonData = json_decode($cetakSuratJson, true);

        //     // $cetakData = Surats::findOrFail($id);

        //     // $cetakSuratJson = Surats::findOrFail($id);
        //     // $jsonData = DB::table('surats')
        //     //             -> select('pengaju')
        //     //             -> where('id', $id)->get()->toJson();

        //     // $cetakSuratJson = Surats::with('validasi', 'user')->where('id', $id)->orderBy('updated_at', 'desc')->get()->toJson();
        //     // $cetakSuratJson = json_decode($jsonData);
        //     // $cetak = Surats::with('user', 'validasi')->get($id);
        //     // $cetakData['cetakSurat'] =  $cetakSuratJson;
        //     // $pengaju = json_decode($jsonData, true);
        //     // var_dump(json_decode($jsonData, true));
        //     // dd($pengaju);

        //     //$cetakData['jsonData'] = $jsonData;

        //     return view('surat.cetakSuratKeterangan', compact('cetak'));
        //}

        public function cetakSuratUndangan($id) {
            $options = new Options();
            $dompdf = new Dompdf($options);
            $options->setIsHtml5ParserEnabled(true);
            $options->setDebugPng(true);

            $cetak = Surats::with('user', 'validasi')->findOrfail($id);
            // $pdf = PDF::loadview('surat.cetakSuratTugas', ['cetak' => $cetak]);

            $html = view('surat.cetakSuratUndangan', compact('cetak'));

            // $pdf = new Dompdf();

            $dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation
            // $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            // return $dompdf->stream();

            return $dompdf->stream('Surat Undangan.pdf', array('Attachment' => false));
            //return view('surat.cetaksuratTugas', compact('cetak'));
        }

    //End Surat Undangan

    //Berita Acara
        public function beritaAcara() {
            return view('admin.beritaAcara');
        }

        public function simpanBeritaAcara(Request $request) {

            $data = $request->all();

            $surat = new Surats;
            $surat->id_user = $data['id_user'];
            $surat->id_jenis_surats = $data['id_jenis_surats'];
            $surat->nama_jenis_surat = $data['nama_jenis_surat'];
            $surat->prihal = $data['prihal'];
            $surat->tema = $data['tema'];
            $surat->nama_mitra = $data['nama_mitra'];
            $surat->tgl_pelaksanaan = $data['tgl_pelaksanaan'];
            $surat->waktu_pelaksanaan = $data['waktu_pelaksanaan'];
            $surat->lokasi = $data['lokasi'];
            $surat->isi_surat = $data['isi_surat'];
            $surat->keterangan = $data['keterangan'];
            $surat->tipe_surat = $data['tipe_surat'];
            $surat->status = $data['status'];
            $surat->save();


            return redirect('admin/surat')->with('status', 'Berhasil Tambah Surat Tugas');
        }

        public function cetakBeritaAcara($id) {
            $options = new Options();
            $dompdf = new Dompdf($options);
            $options->setIsHtml5ParserEnabled(true);
            $options->setDebugPng(true);

            $cetak = Surats::with('user', 'validasi')->findOrfail($id);
            // $pdf = PDF::loadview('surat.cetakSuratTugas', ['cetak' => $cetak]);

            $html = view('surat.cetakBeritaAcara', compact('cetak'));

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

    //Berita Acara

    public function arsipSurat()
    {
        $surat = Surats::onlyTrashed()->get();
    	return view('admin.arsipSurat', ['surat' => $surat]);
    }
}

