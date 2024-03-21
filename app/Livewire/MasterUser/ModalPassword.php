<?php

namespace App\Livewire\MasterUser;

use Livewire\Component;

class ModalPassword extends Component
{
    protected $listeners = ['idPassword'];
    public $id;

    public function render()
    {
        return view('livewire.master-user.modal-password');
    }

    public function idPassword($id)
    {
        $this->id = $id;
    }
}
