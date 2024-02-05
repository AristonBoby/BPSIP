<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\uuid;
class analisaSampel extends Model
{
    use uuid;
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'id',
        'jenis_analisa',
        'users_id',
        'jenisPengujian_id',
        'status'
    ];

    public function jenisPemeriksaanSampel()
    {
        return $this->hasMany('App\Models\jenisPemeriksaanSampel','item_analisa_id','id');
    }
}
