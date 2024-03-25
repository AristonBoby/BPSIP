<?php

namespace App\Livewire\MasterUser;

use Livewire\Component;
use App\Models\User;
class ModalbtlHapus extends Component
{
    protected $listeners =['btlHapus'=>'idUpdate'];
    public $id;
    public $roleType;

    public function render()
    {
        return view('livewire.master-user.modalbtl-hapus');
    }

    protected $rules =
    [
        'roleType' => 'required',
    ];

    public function updateUser()
    {   $this->validate();
        $query = User::where('id',$this->id)->update([
            'role' => $this->roleType,
        ]);

        if($query)
        {
            $this->dispatch('alert',text:'User Berhasil Tersimpan !!!',icon:'success',title:'Berhasil',timer:2000); 
        }
       
    }   


    public function idUpdate($id)
    {
       $this->id = $id;
    }
}
