<?php

namespace App\Models;

use App\Models\permintaanAnalisa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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


    public function tblpermintaan()
    {
        return $this->belongsTo('App\Models\permintaanAnalisa', 'permintaan_analisas_id', 'id');
    }

    public function tblpemeriksaan()
    {
        return $this->belongsTo('App\Models\jenisPemeriksaanSampel', 'jenisPemeriksaanSampels_id', 'id');
    }

    public function tbluser()
    {
        return $this->belongsTo('App\Models\user', 'user_id', 'id');
    }

}
