<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validasi extends Model
{
    use HasFactory;

    protected $table = "validasi";

    protected $fillabel = [
        'nama_pejabat',
        'jabatan',
        'tanda_tangan',
        'created_at',
        'updated_at',
    ];

    public function surats()
    {
        return $this->hasMany(Surats::class);
    }
}
