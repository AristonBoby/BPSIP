<?php

namespace App\Livewire\MasterUser;

use App\Models\kecamatan;
use App\Models\kelurahan;
use Livewire\Component;
use App\Models\User;
use App\Models\userPemohon;
use Illuminate\Support\Str;
use App\Models\provinsi;
use App\Models\kota;

class MasteruserTable extends Component
{
    public $name;
    public $email;
    public $no_hp;
    public $alamat;
    public $provinsi_id;
    public $kota_id;
    public $kec_id;
    public $kel_id;
    public $pass;
    public $re_pass;

    public function render()
    {
        $provinsi   =   provinsi::all();
        $kota       =   kota::where('provinsi_id', $this->provinsi_id)->get();
        $kec        =   kecamatan::where('kota_id',$this->kota_id)->get();
        $kel        =   kelurahan::where('kecamatan_id',$this->kec_id)->get();
        return view('livewire.master-user.masteruser-table',['provinsi'=> $provinsi,'kota'=>$kota,'kecamatan'=>$kec,'kelurahan'=>$kel]);

    }

    protected $rules = [
        'name'          =>  'required|max:50',
        'email'         =>  'required|unique:users,email',
        'no_hp'         =>  'required|numeric|min:10|unique:user_pemohons,no_tlpn',
        'pass'          =>  'required|same:re_pass',
        're_pass'       =>  'required|same:pass',
        'provinsi_id'   =>  'required',
        'kota_id'       =>  'required',
        'kec_id'        =>  'required',
        'kel_id'        =>  'required',
        'alamat'        =>  'required',
    ];
    public function messages()
    {
        return [
            'name.required'     =>  'Nama Wajib diisi !!!',
            'name.max'          =>  'Nama Maksimal 50 Karakter !!!',
            'email.required'    =>  'Email Wajib diisi !!!',
            'email.unique'      =>  'Email Telah Terdaftar !!!',
            'no_hp.required'    =>  'No. HP Wajib diisi !!!',
            'no_hp.max'         =>  'No Hp Maksimal 13 Angka !!!',
            'no_hp.unique'      =>  'Email Telah Terdaftar !!!',
            'no_hp.min'         =>  'No Hp Minimal 10 Angka !!!',
            'pass.required'     =>  'Password Wajib diisi !!!',
            're_pass.required'  =>  'Re Password Wajib diisi !!!',
            'pass.same'         =>  'Kombinasi Password Tidak Sesuai',
            're_pass.same'      =>  'Kombinasi Password Tidak Sesuai',
            'provinsi_id'       =>  'Pilih Salah Satu Provinsi !!!',
            'kota_id'           =>  'Pilih Salah Satu Kab/Kota !!!',
            'kec_id'            =>  'Pilih Salah Satu Kecamatan !!!',
            'kel_id'            =>  'Pilih Salah Satu Kelurahan !!!',
            'alamat.required'   =>  'Alamat Wajib diisi !!!',

        ];
    }
    public function create()
    {
        $this->validate();
        $query = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => $this->pass,
            'role'      => 9,
        ]);

        $detail = userPemohon::create([
            'id'            =>  Str::uuid(),
            'user_id'       =>  $query->id,
            'alamat'        =>  $this->alamat,
            'kelurahan_id'  =>  $this->kel_id,
            'alamat'        =>  $this->alamat,
            'no_tlpn'       =>  $this->no_hp,
        ]);

        if ($query)
        {
            $this->dispatch('alert',text:'Data Berhasil Disimpan !!!',icon:'success',title:'Berhasil',timer:2000);
            $this->resetForm();
        }
    }

    public function resetForm()
    {   $this->resetValidation();
        $this->name          =   '';
        $this->email         =   '';
        $this->no_hp         =   '';
        $this->alamat        =   '';
        //$this->kel_id        =   '';
        $this->pass          =   '';
        $this->re_pass       =   '';
        $this->provinsi_id   =   '';
        // $this->kota_id       =   '';
        // $this->kec_id        =   '';
        // $this->kel_id        =   '';
        $this->alamat        =   '';
        $this->render();
    }

}
