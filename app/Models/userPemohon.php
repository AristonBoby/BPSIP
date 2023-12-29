<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userPemohon extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_tlpn',
        'id',
        'kelurahan_id',
        'alamat',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function kelurahan()
    {
    	return $this->hasOne('App\Models\kelurahan');
    }
}
