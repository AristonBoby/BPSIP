<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    use HasFactory;
    protected $table = 'kotas';

    public function provinsi()
    {
        return $this->belongsTo('App\Models\provinsi','provinsi_id','id');
    }
}
