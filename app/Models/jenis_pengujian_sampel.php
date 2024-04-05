<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\uuid;
class jenis_pengujian_sampel extends Model
{
    use uuid;
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
       'id',
       'jenis_pengujian',
       'status',
    ];


    public function analisaSampel()
    {
        return $this->hasMany('App\Models\analisaSampel','jenisPengujian_id','id');
    }
}
