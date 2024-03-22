<?php

namespace App\Livewire\MasterUser;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ModalPassword extends Component
{
    protected $listeners = ['idPassword'];
    public $id;
    public $password;
    public $rePassword;

    public function render()
    {
        return view('livewire.master-user.modal-password');
    }

    public function idPassword($id)
    {
        $this->id = $id;
    }

    protected $rules = [
        'password'      =>  'required|same:rePassword',
        'rePassword'    =>  'required|same:password',
    ];

    public function messages()
    {
        return [
            'password.required'     => 'Password Wajib Diisi !!!',
            'rePassword.required'   => 'Password Wajib Diisi !!!',
            'rePassword.same'       => 'Password Tidak Sama !!!',
            'password.same'       => 'Password Tidak Sama !!!',
        ];
    }

    public function passwordUpdate()
    {    $this->validate();
         $query = User::where('id',$this->id)->update([
            'password' => Hash::make($this->password),
         ]);

         if($query)
            {
                $this->dispatch('alert',text:'Password Behasil Diperbarui',icon:'success',title:'Password Berhasil',timer:2000);
            }
    }
}
