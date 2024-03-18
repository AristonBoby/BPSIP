<?php

namespace App\Livewire\MasterUser;

use App\Models\User;
use Livewire\Component;

class TabledataMaster extends Component
{
    public function render()
    {
        $query = User::where('role',9)->paginate(10);
        return view('livewire.master-user.tabledata-master',['query'=>$query]);
    }
}
