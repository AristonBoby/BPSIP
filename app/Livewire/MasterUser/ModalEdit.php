<?php

namespace App\Livewire\MasterUser;

use Livewire\Component;
use App\Models\user;
use App\Models\userPemohon;
class ModalEdit extends Component
{
    protected $listeners = ['getDataUser'];
    public $id;
    public $nama;
    public $email;
    public $no_Hp;
    public $alamat;

    public function render()
    {   
        return view('livewire.master-user.modal-edit');
    }

    public function getDataUser($id)
    {
        $query = user::where('id',$id)->first();
        if($query)
        {
            $this->id       =   $query->id;
            $this->nama     =   $query->name;
            $this->email    =   $query->email; 
            $this->no_Hp    =   $query->userPemohons->no_tlpn;
            $this->alamat   =   $query->userPemohons->alamat;
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
            'no_tlpn'   => $this->no_Hp,
            'alamat'    =>  $this->alamat,
        ]);

        if($query && $query_pemohon)
        {
            $this->dispatch('alert',text:'Data Behasil Diperbaharui',icon:'success',title:'Berhasil ',timer:2000);
        }
    }
}
