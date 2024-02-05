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
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class TblDataAnalis extends Component
{
    use WithPagination;
    protected $lilisteners = ['datevalue'];
    public $detail = [];
    public $itemAnalisa = [];
    public $tanggal='';
    public $jenis_analisa = '';
    public $cari='';


    public function pencarian()
    {
        $this->resetPage();
        $this->render();
    }

    public function resetPencarian()
    {
        $this->resetPage();
        $this->jenis_analisa = '';
        $this->tanggal = '';
        $this->cari = '';
        $this->render();
    }

    public function render()
    {
        $jenisAnalisa = analisaSampel::all();

        $query = itemAnalisa::where('jenisAnalisaSampel_id','like','%'.$this->jenis_analisa.'%')
                    ->whereHas('tblpermintaan', function($dat){
                            $dat->whereHas('dataUser',function($das){
                                $das->where('name','LIKE','%'.$this->cari.'%');
                            });
                            $dat->orWhere('no_spk',$this->cari);
                        })
                    ->whereHas('tblpermintaan', function($dat){
                        $dat->whereHas('dataUser',function($das){
                            $das->where('tanggal','Like','%'.$this->tanggal.'%');
                        });
                    })
                ->orderBy('created_at','desc')
                ->paginate(10);
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
