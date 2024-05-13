<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use App\Models\kelurahan;
use App\Models\kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kota;

class pendaftaraanGuest extends Controller
{
    public function index()
    {
        $prov = kelurahan::paginate(10);
        return view('pendaftaran',compact('prov'));
    }
    

    public function store(Request $request)
    {
      $query = user::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  =>  $request->password,
            'role'      =>  '6',
      ]);

      if ($query)
      {
        dd('berhasil');
      }
    }

    public function provinsi()
    {
       $query = provinsi::where('namaProvinsi','LIKE','%'.request('q').'%')->get();
       return response()->json($query);
    }

    public function kota($id)
    {
        $query = kota::where('provinsi_id',$id)->where('namaKota','LIKE','%'.request('q').'%')->get();
        return response()->json($query);
    }
    public function kecamatan($id)
    {
        $query = kecamatan::where('kota_id',$id)->where('namaKecamatan','LIKE','%'.request('q').'%')->get();
        return response()->json($query);
    }
    public function kelurahan($id)
    {
        $query = kelurahan::where('kecamatan_id',$id)->where('namaKelurahan','LIKE','%'.request('q').'%')->get();
        return response()->json($query);
    }

}