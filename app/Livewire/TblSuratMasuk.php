<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TblSuratMasuk extends Component
{
    public $varFile;
    public $varAsal_Surat;
    public $varNomor_Surat;
    public $varJenis_Surat;
    public $varTanggal;
    public $varPerihal;
    public $namaAsliFile;

    public function render()
    {
        return view('livewire.tbl-surat-masuk', ['dok' => DB::table('documents')->all()]);
    }
}
