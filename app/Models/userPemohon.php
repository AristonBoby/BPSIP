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
        return $this->belongsTo('App\MOdels\User');

    }
    public function kelurahan()
    {
    	return $this->belongsTo('App\Models\kelurahan');
    }
}
