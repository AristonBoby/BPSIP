<?php

namespace App\Livewire\MasterUser;

use Livewire\Component;
use App\Models\user;
class ModalEdit extends Component
{
    protected $listeners = ['getDataUser'];

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
            $this->nama     =   $query->name;
            $this->email    =   $query->email; 
            $this->no_Hp    =   $query->userPemohons->no_tlpn;
            $this->alamat   =   $query->userPemohons->alamat;
        } 
    }
}
