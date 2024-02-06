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
use App\Models\transaksiAnalisa;
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
    public $idHapus;


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

    public function deleteId($id)
    {
        $this->idHapus = $id;
    }

    public function hapus()
    {
        $this->delete($this->idHapus);
    }

    public function delete($id)
    {
        $delete = transaksiAnalisa::where('item_analisa_id',$id)->delete();

        if($delete)
        {   $permintaan = itemAnalisa::find($id)->first();
            $delItemAnalisa = itemAnalisa::where('id',$id)->forceDelete();

            if($delItemAnalisa )
            {
                $sum = itemAnalisa::where('permintaan_analisas_id',$permintaan->permintaan_analisas_id)->get();
                if($sum->count() === 0)
                {
                    $delete = permintaanAnalisa::find($permintaan->permintaan_analisas_id)->forceDelete();
                    $this->dispatch('alert',text:'Data Berhasil Dihapus !!!',icon:'success',title:'Berhasil',timer:2000);
                }
            }
        }
        $this->render();
    }
}
