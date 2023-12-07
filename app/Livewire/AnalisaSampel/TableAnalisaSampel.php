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
    public $jenisPengujian;
    public $jenisAnalisa;
    public $status;

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
        elseif($this->filter == 1)
        {
            $query  = analisaSampel::join('jenis_pengujian_sampels','jenis_pengujian_sampels.id','analisa_sampels.jenisPengujian_id')
                ->join('users','users.id','analisa_sampels.users_id')
                ->select('analisa_sampels.deleted_at','analisa_sampels.id','jenis_pengujian_sampels.jenis_pengujian','jenis_analisa','analisa_sampels.status','analisa_sampels.created_at','users.name')
                ->where('analisa_sampels.jenis_analisa','LIKE', '%'.$this->cari.'%')
                ->onlyTrashed()
                ->paginate(10);
            
        }
        $queryJenis = jenis_pengujian_sampel::where('status','1')->get();
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

    protected $rules = [
        'jenisPengujian'    => 'required',
        'jenisAnalisa'      => 'required',
        'editId'            => 'required'
    ];

    public function getData($id)
    {
        $this->id       = $id;
        $this->editId   = $id;
        $query = analisaSampel::find($this->editId);

        if($query)
        {
            $this->jenisPengujian   = $query->jenisPengujian_id;
            $this->status           = $query->status;    
            $this->jenisAnalisa     = $query->jenis_analisa;
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
             $this->dispatch('alert',text:'Behasil Menyimpan',icon:'success',title:'Berhasil   ',timer:2000);   
        }
    }

    public function update()
    {
        $this->validate();
        $query = analisaSampel::find($this->editId);
        $query->update([
            'jenisPengujian_id' => $this->jenisPengujian,
            'jenis_analisa'     => $this->jenisAnalisa,
            'status'            => $this->status,
        ]);
        if($query)
        {
            $this->dispatch('alert',text:'Data Behasil Diperbarui',icon:'success',title:'Berhasil   ',timer:2000);
        }
    }

    public function btlHapus()
    {   
        $query = analisaSampel::withTrashed()->find($this->editId);
        $query->restore();
        if($query)
        {
            $this->dispatch('alert',text:'Behasil Menyimpan',icon:'success',title:'Berhasil   ',timer:2000);
        }
       
    }
}