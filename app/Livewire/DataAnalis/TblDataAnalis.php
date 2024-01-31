<?php

namespace App\Livewire\DataAnalis;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\itemAnalisa;
use App\Models\userPemohon;
use Livewire\WithPagination;
use App\Models\analisaSampel;
use App\Models\permintaanAnalisa;
use Illuminate\Database\Eloquent\Builder;

class TblDataAnalis extends Component
{
    use WithPagination;
    protected $lilisteners = ['datevalue'];
    public $detail = [];
    public $itemAnalisa = [];
    public $tanggal='';
    public $jenis_analisa = '';


    public function pencarian()
    {
        $this->render();
    }

    public function resetPencarian()
    {   $this->jenis_analisa='';
        $this->tanggal=null;
        $this->render();
    }

    public function render()
    {
        $tgl = $this->tanggal;
        $jenis_analisa=$this->jenis_analisa;

        $jenisAnalisa = analisaSampel::all();

        $query = itemAnalisa::with('tblpermintaan')
        ->orwhereHas('tblpermintaan', function(Builder $dat) use ($tgl){
                $dat->where('tanggal','like','%'.$tgl.'%');
            })
        ->orderBy('created_at','desc')->where('jenisAnalisaSampel_id','like','%'.$jenis_analisa.'%')->paginate(2);


        return view('livewire.data-analis.tbl-data-analis',[ 'query' => $query, 'detailItem' => $this->detail, 'itemAnalisaSampel'=>$this->itemAnalisa,'itemjenisAnalisa'=>$jenisAnalisa]);
    }

    public function itemAnalisaModal($id)
    {
        dd($id);
    }

    public function close()
    {
        $this->itemAnalisa = [];
        $this->detail = [];
    }
}
