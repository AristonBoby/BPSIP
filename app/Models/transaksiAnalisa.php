<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksiAnalisa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'item_analisa_id',
        'jenis_pemeriksaan_sampels_id',
    ];
}
