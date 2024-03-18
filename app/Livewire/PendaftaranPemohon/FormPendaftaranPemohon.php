<?php

namespace App\Livewire\PendaftaranPemohon;

use App\Models\itemAnalisa;
use App\Models\kota;
use App\Models\User;
use Livewire\Component;
use App\Models\provinsi;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\userPemohon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class FormPendaftaranPemohon extends Component
{
    public $nama;
    public $varEmail;
    public $noHp;
    public $password;
    public $password_confirmation;
    public $kel;
    public $prov;
    public $city;
    public $kec;
    public $alamat;


    protected $rules = [
        'nama'                      =>  'required',
        'varEmail'                  =>  'required|unique:users,email|email',
        'noHp'                      =>  'required|numeric|unique:user_pemohons,no_tlpn',
        'password'                  =>  'required|same:password_confirmation|min:6',
        'password_confirmation'     =>  'required',
        'prov'                      =>  'required',
        'city'                      =>  'required',
        'kec'                       =>  'required',
        'kel'                       =>  'required',
    ];

    public function render()
    {
        $data = itemAnalisa::all();
        $prov = provinsi::all();
        $kota = kota::where('provinsi_id',$this->prov)->get();
        $kec  = kecamatan::where('kota_id',$this->city)->get();
        $kel  = kelurahan::where('kecamatan_id',$this->kec)->get();

        return view('livewire.pendaftaran-pemohon.form-pendaftaran-pemohon',['provinsi'=>$prov,'kota'=>$kota,'kecamatan'=>$kec,'kelurahan'=>$kel]);
    }

    public function messages()
    {
        return [
            'nama.required'         => 'Nama wajib diisi',
            'varEmail.required'     => 'Email wajib diisi',
            'varEmail.email'        => 'Format email tidak sesuai',
            'varEmail.unique'       => 'Email yang anda masukan telah terdaftar',
            'password.same'         => 'Password Tidak Sesuai',
            'password.required'     => 'Password wajib diisi',
            'noHp.numeric'          => 'Nomor Wajib Angka',
            'noHp.required'         => 'Data No Telepon wajib diisi',
            'noHp.unique'           => 'No Telepon / Whatsaap Anda Telah Terdaftar',
        ];
    }


    public function store()
    {
        $this->validate();
        $query = User::create([
            'name'          => $this->nama,
            'email'         => $this->varEmail,
            'password'      => Hash::make($this->password),
            'role'          => '2',
        ]);

        if($query){
            $idUser = User::where('email',$this->varEmail)->first();
            $data = userPemohon::create([
                'id'            =>  Str::uuid(),
                'no_tlpn'       =>  $this->noHp,
                'kelurahan_id'  =>  $this->kel,
                'alamat'        =>  $this->alamat,
                'user_id'       =>  $idUser->id,
            ]);
        }

    }


}
