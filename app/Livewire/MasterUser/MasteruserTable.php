<?php

namespace App\Livewire\MasterUser;

use Livewire\Component;
use App\Models\User;
class MasteruserTable extends Component
{
    public $name;
    public $email;
    public $no_hp;
    public $pass;
    public $re_pass;

    public function render()
    {
        return view('livewire.master-user.masteruser-table');
    }

    protected $rules = [
        'name'      =>  'required',
        'email'     =>  'required',
        'no_hp'     =>  'required|numeric',
        'pass'      =>  'required',
    ];

    public
    public function create()
    {
        $this->validate();
        $query = User::create([
            'name'  => $this->name,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
            'password'  => $this->pass,
            'role'  => 9,
        ]);

        if ($query)
        {
            $this->dispatch('alert',text:'Data Berhasil Disimpan !!!',icon:'success',title:'Berhasil',timer:2000);
        }
    }
}
