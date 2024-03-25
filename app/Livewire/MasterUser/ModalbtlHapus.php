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

    public function updateUser()
    {   
        $query = User::where('id',$this->id)->update([
            'role' => $this->roleType,
        ]);
       
    }   
    

    public function idUpdate($id)
    {
       $this->id = $id;
    }
}
