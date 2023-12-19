<?php

namespace App\Livewire\JenisPemeriksaan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\jenis_pengujian_sampel;
use App\Models\jenisPemeriksaanSampel;

class TableJenisPemeriksaan extends Component
{
    public function render()
    {
        $query = jenisPemeriksaanSampel::join('analisa_sampels','analisa_sampels.id','=','jenis_pemeriksaan_sampels.analisa_sampel_id')
        ->join('jenis_pengujian_sampels','jenis_pengujian_sampels.id','=','analisa_sampels.jenisPengujian_id')
        ->select('jenis_pengujian_sampels.jenis_pengujian','analisa_sampels.jenis_analisa',DB::raw('SUM(jenis_pemeriksaan_sampels.harga) AS harga'),DB::raw("GROUP_CONCAT(jenis_pemeriksaan_sampels.itemPemeriksaan SEPARATOR ' , ') AS jenis"))
        ->groupBy('analisa_sampels.jenis_analisa')
        ->groupBy('jenis_pengujian_sampels.jenis_pengujian')
        ->paginate(10);
        return view('livewire.jenis-pemeriksaan.table-jenis-pemeriksaan',['query'=>$query]);
    }
}
