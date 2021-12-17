<?php

namespace App\Http\Controllers;

use App\Models\Surats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\SoftDeletes;

class MahasiswaController extends Controller
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
        return view('mahasiswa.dashboard', compact('surat', 'validasiA', 'validasiB', 'validasiC', 'validasiD', 'validasiE', 'totalsurat'));
    }

    public function suratMasuk()
    {
        $suratMasuk = Surats::with('user')->orderBy('updated_at', 'desc')->Paginate(10);
        return view('mahasiswa.suratMasuk', compact('suratMasuk'));
    }

    public function suratKeluar()
    {
        $surat = Surats::with('user')->orderBy('created_at', 'desc')->Paginate(10);
        return view('mahasiswa.suratKeluar', compact('surat'));
    }

    public function hapusSurat($id)
    {
        Surats::findOrfail($id)->delete();
        return redirect()->back();
    }

    public function suratTugas()
    {
        return view('mahasiswa.suratTugas');
    }

    public function simpanSuratTugasMahasiswa(Request $request)
    {
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

        return redirect('mahasiswa/surat-keluar');
    }

    public function editSuratTugas($id)
    {
        $surat = Surats::findOrfail($id);
        return view('mahasiswa.editSuratTugas', compact('surat'));
    }

    public function updateSuratTugas($id, Request $request)
    {
        $surat = Surats::findOrfail($id);
        $surat->update($request->all());

        return redirect('mahasiswa/surat-keluar');
    }

    public function suratKeterangan()
    {
        return view('mahasiswa.suratKegiatan');
    }

    public function simpanSuratKeterangan (Request $request)
    {
        // dd($request->all());
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

        return redirect('mahasiswa/surat-keluar');
    }


    public function editSuratKeterangan($id) {
        $surat = Surats::findOrfail($id);
        return view('mahasiswa.editSuratKegiatan', compact('surat'));
    }

    public function updateSuratKeterangan($id, Request $request)
    {
        $surat = Surats::findOrfail($id);
        $surat->update($request->all());

        return redirect('mahasiswa/surat-keluar');
    }

    // public function hapusSurat($id)
    // {
    //     Surats::where('id', $id)->delete();
    //     return redirect('/surat-keluar');

    //     // return redirect()->back();
    //     // $surat = Surats::find($id)->delete();
    //     // return Redirect()->back()->with('success', 'Surat Telah di Hapus');
    // }

    public function arsipSurat()
    {
        $surats = Surats::with('user')->orderBy('created_at', 'desc');
        $surat = Surats::onlyTrashed()->get();
    	return view('mahasiswa.arsipSurat', ['surat' => $surat, 'surats'=> $surats]);
    }

    public function getSuratKeluar()
    {
        $surat = DB::table('users')
            ->where('id', Auth::user())
            ->orderBy('created_at', 'desc')
            ->get();

        dd($surat);
    }

    public function getSuratMasuk()
    {
        $suratMasuk = DB::table('users')
            ->where('id', Auth::user())
            ->orderBy('updated_at', 'desc')
            ->get();

        dd($suratMasuk);
    }
}
