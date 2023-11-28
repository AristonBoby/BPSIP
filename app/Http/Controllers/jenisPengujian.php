<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jenisPengujian extends Controller
{
    public function index()
    {
        return view('jenis_Pengujian');
    }
}
