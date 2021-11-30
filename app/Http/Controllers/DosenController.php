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
        $surat = Surats::with('user')->orderBy('updated_at', 'desc')->Paginate(10);
        return view('dosen.dashboard', compact('surat'));
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

        return redirect('dosen/surat-keluar');
    }

    public function editSuratTugas($id)
    {
        $surat = Surats::findOrfail($id);
        return view('dosen.editSurat_tugas', compact('surat'));
    }

    public function arsipSurat()
    {
        return view('dosen.arsipSurat');
    }
}
