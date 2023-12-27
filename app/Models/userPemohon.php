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
        'kelurahan',
        'alamat',
        'user_id'
    ];
}
