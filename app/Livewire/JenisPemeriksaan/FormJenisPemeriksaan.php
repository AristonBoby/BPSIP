<?php

namespace App\Livewire\JenisPemeriksaan;

use Livewire\Component;
use App\Models\jenis_pengujian_sampel;
use App\Models\analisaSampel;

class FormJenisPemeriksaan extends Component
{   public $jenisPengujian ='';
    public $analisa="";
    public function render()
    {
        $data=jenis_pengujian_sampel::all();
        $analisa = analisaSampel::where('jenisPengujian_id',$this->jenisPengujian)->get();
        return view('livewire.jenis-pemeriksaan.form-jenis-pemeriksaan',['query'=>$data,'analisaSampel'=>$analisa]);
    }
}
