<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_surats extends Model
{
    use HasFactory;

    protected $table = "jenis_surats";
    protected $primaryKey = "id_jenis_surats";
    protected $filelable = [
        'id_jenis_surats',
        'nama_jenis_surat',
        'kode_jenis_surat',
    ];

    public function surats()
    {
        return $this->hasMany(Surats::class);
    }
}
