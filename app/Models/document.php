<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\uuid;
class document extends Model
{   use uuid;
    use HasFactory;

    protected $fillable = [
        'file',
        'id',
        'asal_surat',
        'nomor_surat',
        'tanggal',
        'perihal',
        'document',
        'user_id'
    ];
}
