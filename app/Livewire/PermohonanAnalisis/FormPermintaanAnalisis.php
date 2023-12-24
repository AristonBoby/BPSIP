<?php

namespace App\Livewire\PermohonanAnalisis;

use Livewire\Component;
use App\Models\jenis_pengujian_sampel;
class FormPermintaanAnalisis extends Component
{
    public $sampel = [1];
    public $index  = 0;
    public $kodeSampel=[];

    public $i = 0;
    public function render()
    {   $data = jenis_pengujian_sampel::all();
        return view('livewire.permohonan-analisis.form-permintaan-analisis',['analisa'=>$data]);
    }

    public function addSampel($no)
    {   $no+1;
        $this->index = $no;
        $this->sampel[$no]='';
        array_push($this->sampel,$no);

    }

    public function removeSampel($no)
    {   $this->kodeSampel[$no]='';
        unset($this->sampel[$no]);
        unset($this->kodeSampel[$no]);
        array_push($this->sampel);
    }

    public function store()
    {
        dd($this->kodeSampel);
    }
}
