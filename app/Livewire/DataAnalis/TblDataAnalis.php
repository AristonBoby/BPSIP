<?php

namespace App\Livewire\DataAnalis;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
class TblDataAnalis extends Component
{
    public function render()
    {
        $query = DB::table('permintaan_analisas')
                ->join('users','users.id','user_id')
                ->join('user_pemohons','user_pemohons.user_id','users.id')
                ->join('item_analisas','item_analisas.permintaan_analisas_id','permintaan_analisas.id')
                ->join('jenis_pemeriksaan_sampels','jenis_pemeriksaan_sampels.id','jenisPemeriksaanSampels_id')
                ->join('analisa_sampels','analisa_sampels.id','analisa_sampel_id')
                ->join('jenis_pengujian_sampels','jenis_pengujian_sampels.id','jenisPengujian_id')
                ->select('name','no_tlpn','alamat','jenis_analisa','jenis_pengujian','tanggal','permintaan_analisas.status','permintaan_analisas.status_daftar')
                ->paginate(10);
          // dd($query);
        return view('livewire.data-analis.tbl-data-analis',['query'=>$query]);
    }

}
