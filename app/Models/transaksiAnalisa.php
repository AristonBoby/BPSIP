<?php

namespace App\Models;
use App\Traits\uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class transaksiAnalisa extends Model
{
    use uuid;
    use HasFactory;
    protected $fillable = [
        'id',
        'item_analisa_id',
        'jenis_pemeriksaan_sampels_id',
    ];

    public function tblJenisPemeriksaan()
    {
        return $this->belongsTo('App\Models\jenisPemeriksaanSampel','jenis_pemeriksaan_sampels_id','id');
    }

}
