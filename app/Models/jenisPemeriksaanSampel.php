<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\uuid;
class jenisPemeriksaanSampel extends Model
{
    use HasFactory;
    use uuid;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'harga',
        'itemPemeriksaan',
        'user_id',
        'analisa_sampel_id',
        'status'
    ];

    public function tblitemAnalisa()
    {
        return $this->belongsTo('App\Models\analisaSampel', 'analisa_sampel_id', 'id');
    }

    public function dataUser()
    {
        return $this->belongsTo('App\Models\user', 'user_id', 'id');
    }
}
