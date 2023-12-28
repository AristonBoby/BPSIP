<?php

namespace App\Livewire\PendaftaranPemohon;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\User;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\userPemohon;
use Illuminate\Support\Facades\Hash;
class FormPendaftaranPemohon extends Component
{
    public $nama;
    public $email;
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
        'email'                     =>  'required',
        'noHp'                      =>  'required||numeric|unique:user_pemohons,no_tlpn',
        'password'                  =>  'same:password_confirmation|min:6',
        'password_confirmation'     =>  'required',
        'prov'                      =>  'required',
        'city'                      =>  'required',
        'kec'                       =>  'required',
        'kel'                       =>  'required',
    ];
    public function render()
    {   $prov = provinsi::all();
        $kota = kota::where('provinsi_id',$this->prov)->get();
        return view('livewire.pendaftaran-pemohon.form-pendaftaran-pemohon',['provinsi'=>$prov,'kota'=>$kota]);
    }
    public function messages()
    {
        return [
            'password.same'         => 'Password Tidak Sesuai',
            'password.same'         => 'Password Tidak Sesuai',
            'noHp.numeric'          => 'Nomor Wajib Angka',
            'noHp.required'         => 'Data No Telepon wajib diisi',
            'noHp.unique'           => 'No Telepon / Whatsaap Anda Telah Terdaftar',
        ];
    }

    public function store()
    {
        //$this->validate();
        $query = User::create([
            'name'      => $this->nama,
            'email'     => $this->email,
            'password'  => Hash::make($this->password),
            'role'      => '2',
        ]);

        if($query){
            $idUser = User::where('email',$this->email)->first();
            $data = userPemohon::create([
                'id'        =>  Str::uuid(),
                'no_tlpn'   =>  $this->noHp,
                'kelurahan' =>  '3',
                'alamat'    =>  $this->alamat,
                'user_id'   =>  $idUser->id,
            ]);
        }

    }
}
