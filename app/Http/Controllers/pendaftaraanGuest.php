<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use App\Models\kelurahan;
use App\Models\kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\kota;
use App\Models\userPemohon;
use Session;
class pendaftaraanGuest extends Controller
{
    public function index()
    {
        $prov = kelurahan::paginate(10);
        return view('pendaftaran',compact('prov'));
    }
    
    public function validasi($request)
    {
        $validated = $request->validate([
            'name'      =>  'required',
            'email'     =>  'required|unique:users,email',
            'no_hp'     =>  'required|numeric',
            'prov'      =>  'required',
            'kota'      =>  'required',
            'kec'       =>  'required',
            'kelurahan' =>  'required',
            'alamat'    =>  'required|max:100',
            'pass'      =>  'required|same:re-pass',
            're-pass'   =>  'required|same:pass',
            
        ],[
            'name.required'         =>  'Nama Wajib diisi ',
            'email.required'        =>  'Email Wajib diisi,',
            'email.unique'          =>  'Email Telah digunakan',
            'no_hp.required'        =>  'Nomor HP Wajib diisi',
            'no_hp.numeric'         =>  'Nomor HP Wajib angka',
            'prov.required'         =>  'Provinsi Wajib dipilih',
            'kec.required'          =>  'Kecamatan Wajib dipilih',
            'kota.required'         =>  'Kota Wajib dipilih',
            'kelurahan.required'    =>  'Kelurahan Wajib dipilih',
            'alamat.required'       =>  'Alamat Wajib diisi',
            'pass.required'         =>  'Password Wajib diisi',
            'pass.same'             =>  'Password Tidak Sesuai',
            're-pass.required'      =>  'Password Wajib diisi',
            're-pass.same'          =>  'Password Tidak Sesuai',
            'no_hp.max'             =>  'Nomor HP Maksimal 14 digit'


        ]);

    }

    public function store(Request $request)
    {  
        $this->validasi($request);
        $query = user::create([
             'name'      =>  $request->name,
             'email'     =>  $request->email,
             'password'  =>  $request->pass,
             'role'      =>  '6',

         ]);
         $user = user::where('email',$request->email)->first();
         if($query)
         {
             $data = userPemohon::create([
                 'id'            =>  Str::uuid(),
                 'user_id'       =>  $user->id,
                 'alamat'        =>  $request->alamat,
                 'kelurahan_id'  =>  $request->kel_id,
                 'no_tlpn'       =>  $request->no_hp,
             ]);
                if($data)
                {
                    Session::flash('sukses','Ini notifikasi SUKSES');
                    return view('pendaftaran');
                }
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