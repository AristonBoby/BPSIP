<?php

namespace App\Livewire\MasterUser;

use Livewire\Component;
use App\Models\userPemohon;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;

class ModalupdateAlamat extends Component
{
    protected $listeners = ['updateAlamat'];
    public $id;

    public $idProvinsi;
    public $idKota;
    public $idKec;
    public $idKel;
    
    public function render()
    {  
        $provinsi   =   provinsi::all();
        $kota       =   kota::where('provinsi_id',$this->idProvinsi)->get();
        $kec        =   kecamatan::where('kota_id',$this->idKota)->get();
        $kel        =   kelurahan::where('kecamatan_id',$this->idKec)->get();
        return view('livewire.master-user.modalupdate-alamat',['provinsi' => $provinsi,'kota' => $kota,'kecamatan'=>$kec,'kelurahan' => $kel]);
    }

    public function updateAlamat($id)
    {
        $this->resetValidation();
        $this->idProvinsi = '';
        $query = userPemohon::where('no_tlpn',$id)->first();
        $this->id = $query->no_tlpn;
    }

    protected $rules = [
        'idProvinsi' => 'required',
        'idKota'     => 'required',
        'idKec'      => 'required',
        'idKel'      => 'required',
    ];

    public function messages()
    {
        return [
            'idKel.required'  => 'Pilih Salah Satu Kelurahan',
            'idKec.required'  => 'Pilih Salah Satu Kecamatan',
            'idProvinsi.required'  => 'Pilih Salah Satu Provinsi',
            'idKota.required' => 'Pilih Salah Satu Kabupatan / Kota',
        ];
    }

    public function update()
    {   $this->validate();
        $query = userPemohon::where('no_tlpn',$this->id)->update([
            'kelurahan_id'  => $this->idKel,
        ]);
        if($query)
        {
            $this->idKel = '';
            $this->idProvinsi = '';
            $this->dispatch('alert',text:'Data Behasil Diperbaharui',icon:'success',title:'Berhasil ',timer:2000);
        }
    }
}
