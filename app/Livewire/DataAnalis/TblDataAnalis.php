<?php

namespace App\Livewire\DataAnalis;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\itemAnalisa;
use App\Models\userPemohon;
use App\Models\analisaSampel;
use App\Models\permintaanAnalisa;
use Illuminate\Database\Eloquent\Builder;

class TblDataAnalis extends Component
{
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
    {   $this->jenis_analisa ='';
        $this->tanggal="";
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
        ->orderBy('created_at','desc')->where('jenisAnalisaSampel_id','like','%'.$jenis_analisa.'%')->paginate(10);


        return view('livewire.data-analis.tbl-data-analis',[ 'query' => $query, 'detailItem' => $this->detail, 'itemAnalisaSampel'=>$this->itemAnalisa,'itemjenisAnalisa'=>$jenisAnalisa]);
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
