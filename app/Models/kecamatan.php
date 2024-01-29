<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;


    public function kota()
    {
        return $this->belongsTo('App\Models\kota','kota_id','id');
    }
}
