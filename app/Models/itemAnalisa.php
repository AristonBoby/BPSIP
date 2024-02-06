<?php

namespace App\Models;
use App\Traits\uuid;
use App\Models\permintaanAnalisa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class itemAnalisa extends Model
{
    use HasFactory;
    use uuid;
    use SoftDeletes;

    protected $table = 'item_analisas';
    protected $primaryKey = 'id';
    protected $visible = 'id';
    protected $fillable = [
        'id',
        'kodeSampel',
        'kodeLab',
        'jenisAnalisaSampel_id',
        'permintaan_analisas_id',
        'keterangan',
        'harga'

    ];


    public function tblpermintaan()
    {
        return $this->belongsTo('App\Models\permintaanAnalisa', 'permintaan_analisas_id', 'id');
    }

    public function tblpemeriksaan()
    {
        return $this->belongsTo('App\Models\jenisPemeriksaanSampel', 'jenisPemeriksaanSampels_id', 'id');
    }

    public function analisaSampel()
    {
        return $this->belongsTo('App\Models\analisaSampel','jenisAnalisaSampel_id','id');
    }

    public function transaksiAnalisa()
    {
        return $this->hasMany('App\Models\transaksiAnalisa','item_analisa_id','id');
    }

    public function search($value)
    {

    }

}
