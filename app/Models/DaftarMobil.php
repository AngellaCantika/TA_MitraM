<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMobil extends Model
{
    use HasFactory;

    protected $table = 'daftar_mobil';

    protected $fillable = [
        'merk',
        'model',
        'tgl_masuk',
        'plat_nomer',
        'status_perbaikan',
        'penanggung_jawab',
        'komponen_kerusakan',
        'foto',
    ];

    public function penanggungJawab()
{
    return $this->belongsTo(User::class, 'penanggung_jawab');
}
}


