<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatBerat extends Model
{
    use HasFactory;

    protected $table = 'alat_berat';

    protected $fillable = [
        'merk',
        'model',
        'tanggal_masuk',
        'komponen_kerusakan',
        'penanggung_jawab',
        'foto',
        'status_perbaikan',
    ];

    public function mekanik() {
        return $this->belongsTo(User::class, 'penanggung_jawab');
    }
}
