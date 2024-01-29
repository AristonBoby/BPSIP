<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\kecamatan','kecamatan_id','id');
    }
}
