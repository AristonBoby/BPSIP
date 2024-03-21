<?php

namespace App\Livewire\MasterUser;

use Livewire\Component;
use App\Models\user;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\userPemohon;
class ModalEdit extends Component
{
    protected $listeners = ['getDataUser'];
    public $id;
    public $nama;
    public $email;
    public $no_Hp;
    public $prov_id;
    public $kota_id;
    public $kec_id;
    public $kelurahan;
    public $alamat;
    public $idUpdateAlamat;


    public function render()
    {
        return view('livewire.master-user.modal-edit');
    }

    public function iduserAlamat($id)
    {
        $this->dispatch('updateAlamat',$id);
    }
    public function getDataUser($id)
    {
        $query = user::where('id',$id)->first();
       // dd($query->userPemohons->no_tlpn);
        if($query)
        {
            $this->id               =   $query->id;
            $this->nama             =   $query->name;
            $this->email            =   $query->email;
            $this->no_Hp            =   $query->userPemohons->no_tlpn;
            $this->prov_id          =   $query->userPemohons->kelurahan->kecamatan->kota->provinsi->namaProvinsi;
            $this->kota_id          =   $query->userPemohons->kelurahan->kecamatan->kota->namaKota;
            $this->kec_id           =   $query->userPemohons->kelurahan->kecamatan->namaKecamatan;
            $this->kelurahan        =   $query->userPemohons->kelurahan->namaKelurahan;
            $this->alamat           =   $query->userPemohons->alamat;

        }
    }

    protected $rules = [
        'nama'  =>  'required',
        'email' =>  'required',
    ];

    public function update()
    {   $this->validate();
        $query = user::where('id',$this->id)->update([
            'name'  =>  $this->nama,
            'email' =>  $this->email,
        ]);

        $query_pemohon = userPemohon::where('user_id',$this->id)->update([
            'no_tlpn'   =>  $this->no_Hp,
            'alamat'    =>  $this->alamat,
        ]);

        if($query)
        {
            if($query_pemohon)
            {
                $this->dispatch('alert',text:'Data Behasil Diperbaharui',icon:'success',title:'Berhasil ',timer:2000);
            }
            else{
                $this->dispatch('alert',text:'Data Gagal Diperbaharui',icon:'danger',title:'Gagal Memperbarui ',timer:2000);
            }

        }
    }

    public function idGet($id)
    {
      //  dd($id);
    }
}
