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
    public $pencarian = "";
    public $status = "";

    public function updatetingPencarian()
    {
        
    }

    public function render()
    {
        if($this->status == 0)
        {
            $query      =   User::whereNot('role',9)
                            ->where('name','LIKE','%'.$this->pencarian.'%')
                            ->where('role','LIKE','%'.$this->status.'%')
                            ->paginate(10);
        }
        else{
            $this->resetPage();
            $query      =   User::whereNot('role',9)
                            ->whereNot('role',0)
                            ->where('name','LIKE','%'.$this->pencarian.'%')
                            ->paginate(10);
           
        }
            

        return view('livewire.master-user.tabledata-master',['query'=>$query]);
    }

    public function filterPencarian()
    {
       
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

    public function btlHapus($id)
    {
        $this->dispatch('btlHapus',$id);
    }
}
