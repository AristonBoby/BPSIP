<?php

namespace App\Livewire\JenisPengujianSampel;

use App\Models\jenis_pengujian_sampel;
use Livewire\WithPagination;
use Livewire\Component;

class TableJenisPengujianSampel extends Component
{   
    use WithPagination;

    public function render()
    {
        $data = jenis_pengujian_sampel::paginate(5);
        return view('livewire.jenis-pengujian-sampel.table-jenis-pengujian-sampel',['query'=>$data]);
    }
}
