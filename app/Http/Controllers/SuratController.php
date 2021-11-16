<?php

namespace App\Http\Controllers;

use App\Models\Surats;
use App\Models\User;
use App\Models\Jenis_surats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    public function getAllSurat()
    {
        $allSurats = Surats::paginate(2);
        return view('admin.surat', compact('dataSurat'));

        // $all_surats = DB::table('surats')
        //     ->join('users', 'users.id', '=', 'surats.id_users')
        //     ->join('jenis_surats', 'jenis_surats.id_jenis_surat', '=', 'surats.id_jenis_surat')
        //     ->get();
        // return view('');
    }

    // public function simpanSuratTugasMahasiswa(Request $request)
    // {
    //     // dd($request->all());
    //     Surats::create([
    //         'id_user' => $request->id_user,
    //         'id_jenis_surats' => $request->id_jenis_surats,
    //         'prihal' => $request->prihal,
    //         'nama_mitra' => $request->nama_mitra,
    //         'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
    //         'lokasi' => $request->lokasi,
    //         'keterangan' => $request->keterangan,
    //         'tipe_surat' => $request->tipe_surat,
    //         'status' => $request->status,
    //     ]);

    //     return redirect('mahasiswa/surat-keluar');
    // }
}
