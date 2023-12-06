<?php

namespace App\Livewire\AnalisaSampel;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
class TableAnalisaSampel extends Component
{
    public function render()
    {   
        //$query = DB::table('')->all;
        return view('livewire.analisa-sampel.table-analisa-sampel');
    }
}
