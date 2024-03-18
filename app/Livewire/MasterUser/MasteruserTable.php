<?php

namespace App\Livewire\MasterUser;

use Livewire\Component;
use App\Models\User;
use App\Models\userPemohon;

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
        'name'      =>  'required|max:50',
        'email'     =>  'required|unique:users,email',
        'no_hp'     =>  'required|numeric|min:10|unique:user_pemohons,no_tlpn',
        'pass'      =>  'required|same:re_pass',
        're_pass'   =>  'required|same:pass',
    ];
    public function messages()
    {
        return [
            'name.required'     =>  'Nama Wajib diisi !!!',
            'name.max'          =>  'Nama Maksimal 50 Karakter !!!',
            'email.required'    =>  'Email Wajib diisi !!!',
            'email.unique'      =>  'Email Telah Terdaftar !!!',
            'no_hp.required'    =>  'No. HP Wajib diisi !!!',
            'no_hp.max'         =>  'No Hp Maksimal 13 Angka !!!',
            'no_hp.unique'      =>  'Email Telah Terdaftar !!!',
            'no_hp.min'         =>  'No Hp Minimal 10 Angka !!!',
            'pass.required'     =>  'Password Wajib diisi !!!',
            're_pass.required'  =>  'Re Password Wajib diisi !!!',
            'pass.same'         =>  'Kombinasi Password Tidak Sesuai',
            're_pass.same'      =>  'Kombinasi Password Tidak Sesuai',
        ];
    }
    public function create()
    {
        $this->validate();
        $query = User::create([
            'name'  => $this->name,
            'email' => $this->email,
            'password'  => $this->pass,
            'role'  => 9,
        ]);

        $detail = userPemohon::create([;
            'id'        =>  Str::uuid(),
            'user_id'   =>  $query->id,
            'no_tlpn'   =>  $this->no_hp,
        ]);

        if ($query)
        {
            $this->dispatch('alert',text:'Data Berhasil Disimpan !!!',icon:'success',title:'Berhasil',timer:2000);
            $this->resetForm();
        }
    }

    private function resetForm()
    {
            $this->name     =   '';
            $this->email    =   '';
            $this->no_hp    =   '';
            $this->pass     =   '';
            $this->re_pass  =   '';
    }
}
