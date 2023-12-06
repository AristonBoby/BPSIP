<?php

namespace App\Livewire\AnalisaSampel;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
class TableAnalisaSampel extends Component
{
    public function render()
    {   
        $query  = DB::table('analisa_sampels')
                ->join();
        return view('livewire.analisa-sampel.table-analisa-sampel');
    }
}
