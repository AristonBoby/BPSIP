<?php

namespace App\Livewire\MasterUser;

use Livewire\Component;
use App\Models\user;
class ModalEdit extends Component
{
    protected $listeners = ['getDataUser'];

    public $queryUser ='';

    public function render()
    {   
        return view('livewire.master-user.modal-edit',['user'=>$this->queryUser]);
    }

    public function getDataUser($id)
    {
        $query = user::where('id',$id)->first();
        if($query)
        {
            $this->queryUser = $query;
        } 
    }
}
