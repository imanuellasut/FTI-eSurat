<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surats extends Model
{
    use HasFactory;

    protected $table = "surats";

    protected $fillable  = [
        'id_user',
        'id_jenis_surats',
        'nama_jenis_surat',
        'prihal',
        'tgl_pelaksanaan',
        'nama_mitra',
        'lokasi',
        'keterangan',
        'isi_surat',
        'penutup_surat',
        'tipe_surat',
        'status',
        'pesan_status',
    ];

    // public function jenis_surat()
    // {
    //     return $this->belongsTo(Jenis_surats::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
