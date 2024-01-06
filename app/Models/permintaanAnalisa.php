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
        'jumContoh',
        'beratContoh',
        'bentukContoh',
        'kondisiContoh',
        'jenisKemasan',
        'user_id'
    ];

}
