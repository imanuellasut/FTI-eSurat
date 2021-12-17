<?php

namespace App\Http\Controllers;

use App\Models\Surats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\SoftDeletes;

class DosenController extends Controller
{

    public function index()
    {
        $validasiA = DB::table('surats')->where('id_jenis_surats', 'A')->get()->count();
        $validasiB = DB::table('surats')->where('id_jenis_surats', 'B')->get()->count();
        $validasiC = DB::table('surats')->where('id_jenis_surats', 'C')->get()->count();
        $validasiD = DB::table('surats')->where('id_jenis_surats', 'D')->get()->count();
        $validasiE = DB::table('surats')->where('id_jenis_surats', 'E')->get()->count();
        $totalsurat = DB::table('surats')->get()->count();

        $surat = Surats::with('user')->orderBy('updated_at', 'desc')->Paginate(10);
        return view('dosen.dashboard', compact('surat', 'validasiA', 'validasiB', 'validasiC', 'validasiD', 'validasiE', 'totalsurat'));
    }

    public function suratMasuk()
    {
        $suratMasuk = Surats::with('user')->orderBy('updated_at', 'desc')->Paginate(10);
        return view('dosen.suratMasuk', compact('suratMasuk'));
    }

    public function suratKeluar()
    {
        $surat = Surats::with('user')->orderBy('created_at', 'desc')->Paginate(10);
        return view('dosen.suratKeluar', compact('surat'));
    }

    public function hapusSurat($id)
    {
        Surats::findOrfail($id)->delete();
        return redirect()->back()->with(['error' => 'Berhasil Menghapus Surat']);
    }

    public function suratTugas()
    {
        return view('dosen.suratTugas');
    }

    public function simpanSuratTugasDosen(Request $request)
    {
        // dd($request->all());
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

        return redirect('dosen/surat-keluar')->with(['success' => 'Berhasil Tambah Surat Tugas']);
    }

    public function editSuratTugas($id)
    {
        $surat = Surats::findOrfail($id);
        return view('dosen.editSuratTugas', compact('surat'));
    }

    public function updateSuratTugas($id, Request $request)
    {
        $surat = Surats::findOrfail($id);
        $surat->update($request->all());

        return redirect('dosen/surat-keluar');
    }

    public function suratKeterangan() {
        return view('dosen.suratKeterangan');
    }

    public function simpanSuratKeterangan(Request $request) {

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
        $surat->tipe_surat = $data['tipe_surat'];
        $surat->status = $data['status'];
        $surat->save();

        return redirect('dosen/surat-keluar')->with(['success' => 'Berhasil Tambah Surat Keterangan']);
    }

    public function editSuratKeterangan($id) {
        $surat = Surats::findOrfail($id);
        return view('dosen.editSuratKegiatan', compact('surat'));
    }

    public function updateSuratKeterangan($id, Request $request)
    {
        $surat = Surats::findOrfail($id);
        $surat->update($request->all());

        return redirect('dosen/surat-keluar');
    }

    public function beritaAcara() {
        return view('dosen.beritaAcara');
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


        return redirect('dosen/surat-keluar')->with('status', 'Berhasil Tambah Berita Acara');
    }

    public function editBeritaAcara($id) {
        $surat = Surats::findOrfail($id);
        return view('dosen.editBeritaAcara', compact('surat'));
    }

     public function updateBeritaAcara($id, Request $request)
    {
        $surat = Surats::findOrfail($id);
        $surat->update($request->all());

        return redirect('dosen/surat-keluar');
    }

    public function arsipSurat()
    {
        return view('dosen.arsipSurat');
    }
}
