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
        $surat = Surats::with('user')->orderBy('updated_at', 'desc')->Paginate(10);
        return view('mahasiswa.dashboard', compact('surat'));
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

    public function suratKegiatan()
    {
        return view('mahasiswa.suratKegiatan');
    }

    public function simpanSuratKegiatanMahasiswa(Request $request)
    {
        // dd($request->all());
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

        return redirect('mahasiswa/surat-keluar');
    }

    public function editSuratKegiatan($id)
    {
        $surat = Surats::findOrfail($id);
        return view('mahasiswa.editSuratKegiatan', compact('surat'));
    }

    public function updatSuratKegiatan($id, Request $request)
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
        return view('mahasiswa.arsipSurat');
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
