<?php

namespace App\Models;

use App\Traits\uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class permintaanAnalisa extends Model
{
    use uuid;
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'id',
        'no_spk',
        'jumContoh',
        'beratContoh',
        'bentukContoh',
        'kondisiContoh',
        'jenisContoh',
        'jenisKemasan',
        'tanggal',
        'user_id',
        'status_daftar',
        'status',
    ];

    public function dataUser()
    {
        return $this->belongsTo('App\Models\user', 'user_id', 'id');
    }

    public function itemAnalisa()
    {
        return $this->hasMany('App\Models\itemAnalisa','permintaan_analisas_id','id');
    }



}
