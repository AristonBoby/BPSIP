<?php

namespace App\Livewire\MasterUser;

use Livewire\Component;
use App\Models\User;
class ModalHapus extends Component
{
    protected $listeners = ['hapusmasterUser'=>'hapus'];
    public $idHapus;

    public function render()
    {
        return view('livewire.master-user.modal-hapus');
    }

    public function hapus($id)
    {
        $this->idHapus = $id;
    }
    public function delete()
    {
        $user = User::where('id',$this->idHapus)->update([
            'role' => 0,
        ]);

        if($user)
        {
            $this->dispatch('resetTable');
            $this->dispatch('alert',text:'User Berhasil Dihapus',icon:'success',title:'Berhasil Menghapus ',timer:2000);
        }
    }
}
