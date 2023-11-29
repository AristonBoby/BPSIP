<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\uuid;
class jenis_pengujian_sampel extends Model
{
    use uuid;
    use HasFactory;
    protected $fillable = [
       'id',
       'jenis_pengujian',
       'status'
    ];
}
