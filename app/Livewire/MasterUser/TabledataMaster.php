<?php

namespace App\Livewire\MasterUser;

use App\Models\User;
use App\Models\provinsi;
use App\Models\userPemohon;
use Livewire\Component;
use Livewire\WithPagination;

class TabledataMaster extends Component
{
    use WithPagination;
    protected $listeners = ['resetTable'];
    public function render()
    {
        $query      =   User::whereNot('role',9)->whereNot('role',0)->paginate(10);

        return view('livewire.master-user.tabledata-master',['query'=>$query]);
    }
    protected $rules=[
        'nama'      =>  'required',
        'email'     =>  'required',
    ];

    public function resetTable()
    {
        $this->render();
    }

    public function getData($id)
    {
        $this->dispatch('getDataUser',$id);
    }

    public function idGet($id)
    {
        $this->dispatch('idPassword',$id);
    }

    public function idHapus($id)
    {
        
        $this->dispatch('hapusmasterUser',$id);
    }
}
