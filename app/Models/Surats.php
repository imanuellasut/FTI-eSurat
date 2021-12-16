<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

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
        'pengaju',
        'idPengaju',
        'namaPengaju',
        'nama_jenis_surat',
        'tema',
        'prihal',
        'tgl_pelaksanaan',
        'tgl_mulai',
        'tgl_selesai',
        'waktu_pelaksanaan',
        'waktu_mulai',
        'waktu_selesai',
        'nama_mitra',
        'lokasi',
        'menimbang',
        'mengingat',
        'menetapkan',
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
        'pengaju' => 'array',
        'idPengaju' => 'array',
        'namaPengaju' => 'array',
        'menimbang' => 'array',
        'mengingat' => 'array',
        'menetapkan' => 'array',
    ];

    public function set() {
        return Carbon::parse($this->attributes['tgl_pelaksanaan'])
            ->translatedFormat('l, d F Y');
    }

    // public function setPengajuAttribute($value)
	// {
	//     $pengaju = [];

	//     foreach ($value as $array_item) {
	//         if (!is_null($array_item['idPengaju'])) {
	//             $pengaju[] = $array_item;
	//         }
	//     }

	//     $this->attributes['pengaju'] = json_encode($pengaju);
	// }

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
