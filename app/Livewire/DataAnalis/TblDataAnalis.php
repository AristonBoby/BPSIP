<?php

namespace App\Livewire\DataAnalis;

use Livewire\Component;
use App\Models\itemAnalisa;
use App\Models\permintaanAnalisa;
use Illuminate\Support\Facades\DB;

class TblDataAnalis extends Component
{

    public $detail = [];
    public $itemAnalisa = [];

    public function render()
    {
        $query = DB::table('permintaan_analisas')
                ->join('users','users.id','user_id')
                ->join('user_pemohons','user_pemohons.user_id','users.id')
                ->join('item_analisas','item_analisas.permintaan_analisas_id','permintaan_analisas.id')
                ->join('jenis_pemeriksaan_sampels','jenis_pemeriksaan_sampels.id','analisa_sampel_id')
                ->join('analisa_sampels','analisa_sampels.id','analisa_sampel_id')
                ->join('jenis_pengujian_sampels','jenis_pengujian_sampels.id','jenisPengujian_id')
                ->select('name','no_spk','no_tlpn','alamat','jenis_analisa','jenis_pengujian','tanggal','permintaan_analisas.status','permintaan_analisas.status_daftar','item_analisas.permintaan_analisas_id')
                ->paginate(10);
           dd($query);
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
