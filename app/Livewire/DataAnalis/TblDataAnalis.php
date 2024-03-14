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
use PDO;

class TblDataAnalis extends Component
{
    use WithPagination;
    protected $lilisteners = ['datevalue'];
    public $detail = [];
    public $itemAnalisa = [];
    public $tgl='';
    public $jenisanalisaSampel = '';
    public $cari='';
    public $idHapus;
    public $detailModal=[];
    public $idstatus;
    public $updateStatus;


    public function pencarian()
    {
     //   dd($this->cari);
        $this->resetPage();
        $this->render();

    }

    public function resetPencarian()
    {
        $this->resetPage();
        $this->jenisanalisaSampel = '';
        $this->tgl = '';
        $this->cari = '';
        $this->render();
    }

    public function render()
    {
        $permintaan = permintaanAnalisa::
        where('tanggal','LIKE','%'.$this->tgl.'%')
        ->whereHas('dataUser',function ($user){
            $user->where('name','LIKE',"%".$this->cari."%");
        })
        ->paginate(10);
        $jenisAnalisa = analisaSampel::all();
        return view('livewire.data-analis.tbl-data-analis',[ 'detailModal' => $this->detailModal,'query' => $permintaan, 'detailItem' => $this->detail, 'itemAnalisaSampel'=>$this->itemAnalisa,'itemjenisAnalisa'=>$jenisAnalisa]);
    }

    public function itemAnalisaModal($id)
    {
        $query = permintaanAnalisa::where('id',$id)->get();
        $this->idstatus = $id;
        $this->detailModal = $query;

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

        $delete = itemAnalisa::where('permintaan_analisas_id',$id)->delete();
        if($delete)
        {
            $data = permintaanAnalisa::find($id)->delete();
        }else{
            $data = permintaanAnalisa::find($id)->delete();
        }

        if ($delete && $data)
        {
            $this->render();
            $this->dispatch('alert',text:'Data Berhasil Dihapus !!!',icon:'success',title:'Berhasil',timer:2000);
        }elseif($data){
            $this->render();
            $this->dispatch('alert',text:'Data Berhasil Dihapus !!!',icon:'success',title:'Berhasil',timer:2000);
        }
    }

    public function updatePemerikasaan()
    {
        $data = permintaanAnalisa::find($this->idstatus)->first();
        $data->update([
            'status' => $this->updateStatus,
        ]);

        if($data)
        {
            $this->dispatch('alert',text:'Data Berhasil di Update !!!',icon:'success',title:'Berhasil',timer:2000);
        }

    }
}
