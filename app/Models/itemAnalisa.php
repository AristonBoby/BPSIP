<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemAnalisa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kodeSampel',
        'kodeLab',
        'jenisPemeriksaanSampels_id',
        'permintaan_analisas_id',
        'keterangan',
    ];
}
