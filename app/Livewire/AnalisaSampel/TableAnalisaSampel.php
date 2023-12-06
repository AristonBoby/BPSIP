<?php

namespace App\Livewire\AnalisaSampel;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\analisaSampel;
use App\Models\jenis_pengujian_sampel;
use Illuminate\Support\Facades\DB;

class TableAnalisaSampel extends Component
{
    use WithPagination;
    public $cari='';
    public $id;
    public $filter=0;
    public $editId;
    public function render()
    {   
        if($this->filter == 0)
        $query  = analisaSampel::join('jenis_pengujian_sampels','jenis_pengujian_sampels.id','analisa_sampels.jenisPengujian_id')
                ->join('users','users.id','analisa_sampels.users_id')
                ->select('analisa_sampels.id','jenis_pengujian_sampels.jenis_pengujian','jenis_analisa','analisa_sampels.status','analisa_sampels.created_at','users.name')
                ->where('analisa_sampels.status','1')
                ->where('analisa_sampels.jenis_analisa','LIKE', '%'.$this->cari.'%')
                ->orWhere('analisa_sampels.jenis_analisa','LIKE', '%'.$this->cari.'%')
                ->paginate(10);
        elseif($this->filter ==1)
        {
            $query  = analisaSampel::onlyTrashed()->join('jenis_pengujian_sampels','jenis_pengujian_sampels.id','analisa_sampels.jenisPengujian_id')
            ->join('users','users.id','analisa_sampels.users_id')
            ->select('analisa_sampels.id','jenis_pengujian_sampels.jenis_pengujian','jenis_analisa','analisa_sampels.status','analisa_sampels.created_at','users.name')
            ->where('analisa_sampels.status','1')
            ->where('analisa_sampels.jenis_analisa','LIKE', '%'.$this->cari.'%')
            ->orWhere('analisa_sampels.jenis_analisa','LIKE', '%'.$this->cari.'%')
            ->paginate(10);
        }


        $queryJenis = jenis_pengujian_sampel::where('status','1')->get();
        //dd($query);
        return view('livewire.analisa-sampel.table-analisa-sampel',['data'=>$query,'jenis'=>$queryJenis]);
    }

    public function cariData()
    {   
        $this->resetPage();
    }

    public function updatingFilter()
    {   
        $this->resetPage();
    }
    public function updatinCarir()
    {   
        $this->resetPage();
    }

    public function getData($id)
    {
        $this->id       = $id;
        $this->editId   = $id;
        $query = analisaSampel::find($id);
        //dd($query);
        if($query)
        {
            $this->jenisPengujian = $query->jenisPengujian_id;
        }
    }

    public function delete()
    {
        $query = analisaSampel::find($this->editId);
        $query->delete();
        if($query)
        {
             $this->cari    = '';
             $this->id      = '';
             $this->filter  =  0;
             $this->editId  = '';
        }
    }

    public function btlHapus()
    {   
        $query = analisaSampel::onlyTrashed()->find($this->editId);
        $query->restore();
        if($query)
        {
            $this->dispatch('alert',text:'Behasil Menyimpan',icon:'success',title:'Berhasil   ',timer:2000);
        }
       
    }
}