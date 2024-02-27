<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\permintaanAnalisa;
use Illuminate\Http\Request;

class printPermohoanan extends Controller
{
    public function index($id)
    {
        $data = permintaanAnalisa::find($id)->first();
        return view('print-Permohonan',compact('data'));
    }
}
