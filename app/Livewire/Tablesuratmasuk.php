<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\document;
use Illuminate\Support\Facades\Storage;
class Tablesuratmasuk extends Component
{
    use WithPagination;
    public $idDokumen;
    public $urlDokumen;
    public $dataIframe;
    protected $listeners = ['hapusDokumen' => 'hapus'];

    public function render()
    {
        $query = DB::table('documents')->paginate(10);
        return view('livewire.tablesuratmasuk',[
            'data' => $query
        ]);
    }

    public function refresh()
    {
        $this->render();
    }

    public function confirmDelete($id)
    {
        $query = document::find($id)->first();
        if($query)
        {
            $this->idDokumen = $query->id;
            $this->dispatch('confirmModalDelete');
        }else
        {
            $this->dispatch('alert',text:'Data Gagal ID Dokumen Tidak Ditemukan',icon:'error',title:'Gagal',timer:2000);
        }

    }

    public function hapus()
    {


        $fileDelete = document::find($this->idDokumen)->first();
        $query = document::find($this->idDokumen)->delete();
        if($query)
        {
            $delete = Storage::delete('public/dokumen/'.$fileDelete->document);
            if($delete)
            {
               $this->dispatch('alert',text:'Data Berhasil dihapus',icon:'success',title:'Berhasil',timer:2000);
            }
        }
        else
        {
            $this->dispatch('alert',text:'Data Gagal dihapus',icon:'error',title:'Gagal',timer:2000);
        }
    }

    public function viewedok($id)
    {
        //23_10_2023:06_10_48-ssss.pdf
        $query = document::find($id)->first();

        $exists = Storage::url("dokumen/$query->document");
        return "<iframe height='100%' width='100%' src=' $exists'></iframe>";
    }

}
