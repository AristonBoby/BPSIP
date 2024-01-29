<?php

namespace App\Livewire\DataAnalis;

use App\Models\User;
use Livewire\Component;
use App\Models\itemAnalisa;
use App\Models\userPemohon;
use App\Models\permintaanAnalisa;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class TblDataAnalis extends Component
{

    public $detail = [];
    public $itemAnalisa = [];
    public $tanggal;

    public function mount()
    {
        $this->tanggal = date('d-m-Y');
    }

    public function updatingTanggal($value)
    {
        $this->tanggal = $value;
    }

    public function render()
    {
        $name= $this->tanggal;
        $query = itemAnalisa::with('tblpermintaan')->orwhereHas('tblpermintaan', function(Builder $dat) use ($name){
            $dat->where('tanggal',$name);
        })->paginate(10);

        return view('livewire.data-analis.tbl-data-analis',[ 'query' => $query, 'detailItem' => $this->detail, 'itemAnalisaSampel'=>$this->itemAnalisa]);
    }

    public function itemAnalisaModal($id)
    {
        $query = DB::table('permintaan_analisas')
                ->where('permintaan_analisas.id',$id)
                ->join('users','users.id','permintaan_analisas.user_id')
                ->join('user_pemohons','user_pemohons.user_id','users.id')
                ->join('kelurahans','kelurahans.id','user_pemohons.kelurahan_id')
                ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
                ->join('kotas','kotas.id','kecamatans.kota_id')
                ->join('provinsis','provinsis.id','kotas.provinsi_id')
                ->select('permintaan_analisas.no_spk','tanggal','jumContoh','beratContoh','bentukContoh','kondisiContoh','jenisKemasan','name','alamat','no_tlpn','namaKelurahan','namaKecamatan','namaKota','namaProvinsi')
                ->get();

        $this->detail = $query;

        if($query)
        {
            $data = itemAnalisa::where('permintaan_analisas_id',$id)->get();
            $this->itemAnalisa = $data;
        }
    }

    public function close()
    {
        $this->itemAnalisa = [];
        $this->detail = [];
    }
}
