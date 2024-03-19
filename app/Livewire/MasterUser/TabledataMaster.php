<?php

namespace App\Livewire\MasterUser;

use App\Models\User;
use App\Models\userPemohon;
use Livewire\Component;
use Livewire\WithPagination;

class TabledataMaster extends Component
{
    use WithPagination;
    public function render()
    {
        $query = User::whereNot('role',1)->paginate(10);
        return view('livewire.master-user.tabledata-master',['query'=>$query]);
    }
}
