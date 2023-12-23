<?php

namespace App\Livewire\JenisPengujianSampel;

use Livewire\Component;
use App\Models\jenis_pengujian_sampel;
use Illuminate\Support\Str;
class FormJenisPengujian extends Component
{
    public $varJenis;
    public $varStatus='1';

    public function render()
    {
        return view('livewire.jenis-pengujian-sampel.form-jenis-pengujian');
    }

    protected $rules = [
        'varJenis'  => 'required|max:50',
        'varStatus' => 'required|max:1',
    ];

    public function messages()
    {
        return [
            'varJenis'   =>  'Data wajib diisi !!!',
            'varStatus'  =>  'required|max:1',

        ];
    }

    public function create()
    {
        $this->validate();
        $create = jenis_pengujian_sampel::create([
            'id'                => Str::uuid(),
            'jenis_pengujian'   => $this->varJenis,
            'status'            => $this->varStatus,
       ]);

       if($create)
       {
        $this->dispatch('alert',text:'Data Tidak Tersimpan',icon:'success',title:'Berhasil   ',timer:2000);
       }
    }
}

