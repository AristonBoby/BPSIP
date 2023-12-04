<?php

namespace App\Livewire\JenisPengujianSampel;

use App\Models\jenis_pengujian_sampel;
use Livewire\WithPagination;
use Livewire\Component;

class TableJenisPengujianSampel extends Component
{   
    use WithPagination;
    public $id;
    public $jenis;
    public $status;
    public function render()
    {
        $data = jenis_pengujian_sampel::paginate(5);
        return view('livewire.jenis-pengujian-sampel.table-jenis-pengujian-sampel',['query'=>$data]);
    }


    public function getData($id)
    {
        $this->id = $id;
        $query = jenis_pengujian_sampel::where('id',$this->id)->first();
        $this->jenis    = $query['jenis_pengujian'];
        $this->status   = $query['status'];
    }

}
