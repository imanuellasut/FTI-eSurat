<?php

namespace App\Http\Controllers;

use App\Models\Surats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    public function suratMasuk()
    {
        return view('mahasiswa.suratMasuk');
    }

    public function suratKeluar()
    {
        $suratKeluar = Surats::with('user')->Paginate(10);
        return view('mahasiswa.suratKeluar', compact('suratKeluar'));
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
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'tipe_surat' => $request->tipe_surat,
            'status' => $request->status,
        ]);

        return redirect('mahasiswa/surat-keluar');
    }


    public function suratKegiatan()
    {
        return view('mahasiswa.suratKegiatan');
    }

    public function arsipSurat()
    {
        return view('mahasiswa.arsipSurat');
    }

    public function getSuratKeluar()
    {
        $surat = DB::table('users')
            ->where('id', Auth::user())
            ->get();

        dd($surat);
    }
}
