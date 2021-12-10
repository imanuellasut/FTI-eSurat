<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surats extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "surats";

    protected $fillable  = [
        'id_user',
        'id_jenis_surats',
        'no_surat',
        'id_validasi',
        'id_pengaju',
        'nama_pengaju',
        'nama_jenis_surat',
        'prihal',
        'tgl_pelaksanaan',
        'tgl_mulai',
        'tgl_selesai',
        'waktu_pelaksanaan',
        'waktu_mulai',
        'waktu_selesai',
        'nama_mitra',
        'lokasi',
        'keterangan',
        'isi_surat',
        'penutup_surat',
        'tipe_surat',
        'status',
        'tgl_validasi',
        'pesan_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'id_pengaju' => 'array',
        'nama_pengaju' => 'array',
    ];

    // public function jenis_surat()
    // {
    //     return $this->belongsTo(Jenis_surats::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function validasi()
    {
        return $this->belongsTo(Validasi::class, 'id_validasi');
    }
}
