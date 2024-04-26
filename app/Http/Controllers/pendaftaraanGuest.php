<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use App\Models\kelurahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pendaftaraanGuest extends Controller
{
    public function index()
    {
        $prov = kelurahan::paginate(10);
        return view('pendaftaran',compact('prov'));
    }
    public function kota()
    {

    }

    public function store(Request $request)
    {
        return redirect('/pendaftaran');
    }

    public function provinsi()
    {
       $query = provinsi::where('namaProvinsi','LIKE','%'.request('q').'%')->get();
       return response()->json($query);
    }
}