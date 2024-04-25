<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pendaftaraanGuest extends Controller
{
    public function index()
    {
        $prov = provinsi::all();

        return view('pendaftaran',compact('prov'));
    }

    public function store(Request $request)
    {
        return redirect('/pendaftaran');
    }
}
