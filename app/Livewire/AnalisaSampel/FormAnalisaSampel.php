<?php

namespace App\Livewire\AnalisaSampel;

use Livewire\Component;
use App\Models\jenis_pengujian_sampel;

class FormAnalisaSampel extends Component
{
    public function render()
    {
        $query = jenis_pengujian_sampel::all();
        return view('livewire.analisa-sampel.form-analisa-sampel',['pengujian'=>$query]);
    }
}
