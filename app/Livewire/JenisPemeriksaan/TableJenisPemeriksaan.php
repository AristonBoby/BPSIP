<?php

namespace App\Livewire\JenisPemeriksaan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\jenis_pengujian_sampel;
use App\Models\jenisPemeriksaanSampel;
use Livewire\WithPagination;

class TableJenisPemeriksaan extends Component
{
    use WithPagination;
    public $modalItem;
    public $varDetaiId;

    public function render()
    {
        $query = jenisPemeriksaanSampel::join('analisa_sampels','analisa_sampels.id','=','jenis_pemeriksaan_sampels.analisa_sampel_id')
         ->join('jenis_pengujian_sampels','jenis_pengujian_sampels.id','=','analisa_sampels.jenisPengujian_id')
         ->select('jenis_pemeriksaan_sampels.analisa_sampel_id','jenis_pengujian_sampels.jenis_pengujian','analisa_sampels.jenis_analisa',DB::raw('SUM(jenis_pemeriksaan_sampels.harga) AS harga'),DB::raw("GROUP_CONCAT(jenis_pemeriksaan_sampels.itemPemeriksaan SEPARATOR ' , ') AS jenis"))
         ->groupBy('analisa_sampels.jenis_analisa')
         ->groupBy('jenis_pengujian_sampels.jenis_pengujian')
         ->groupBy('jenis_pemeriksaan_sampels.analisa_sampel_id')
         ->paginate(10);
        return view('livewire.jenis-pemeriksaan.table-jenis-pemeriksaan',['query'=>$query]);
    }

    public function perbarui()
    {
        $this->render();
    }
    public function detailItem($id)
    {
        $query = jenisPemeriksaanSampel::where('analisa_sampel_id',$id)
                ->join('users','users.id','=','jenis_pemeriksaan_sampels.user_id')
                ->select('jenis_pemeriksaan_sampels.id as idItem','jenis_pemeriksaan_sampels.*','users.*')->get();
        if($query)
        {
            $this->modalItem = $query;
        }

    }

    public function detailId($id)
    {   $this->varDetaiId = $id;
        $this->detailItem($this->varDetaiId);
    }

    public function delete()
    {
        $this->detailItem($this->varDetaiId);
        $query=jenisPemeriksaanSampel::find($this->varDetaiId);
        $query->delete();
        if($query)
        {
            $this->detailItem($this->varDetaiId);
            $this->dispatch('alert',text:'Data Berhasil Dihapus !!!',icon:'success',title:'Berhasil',timer:2000);
        }
    }

}
