<?php

namespace App\Livewire\JenisPengujianSampel;

use App\Models\jenis_pengujian_sampel;
use Livewire\WithPagination;
use Livewire\Component;

class TableJenisPengujianSampel extends Component
{
    use WithPagination;
    public $id;
    public $idView;
    public $jenis;
    public $status;
    public $cari = '';

    public function render()
    {
        $data = jenis_pengujian_sampel::where('jenis_pengujian',$this->cari)->paginate(5);
        return view('livewire.jenis-pengujian-sampel.table-jenis-pengujian-sampel',['query'=>$data]);
    }

    public function tblRefresh()
    {
        $this->render();
    }


    private function resetVariabel()
    {
         $this->id      ='';
         $this->idView  ='';
         $this->jenis   ='';
         $this->status  ='';
         $this->resetValidation();
    }

    public function getData($id)
    {   $this->resetVariabel();
        $this->id = $id;
        $query = jenis_pengujian_sampel::where('id',$this->id)->first();
        if($query)
        {
            $this->idView   = $query['id'];
            $this->jenis    = $query['jenis_pengujian'];
            $this->status   = $query['status'];
        }

    }
    protected $rules =[
            'jenis'             => 'required',
            'status'            => 'required',
    ];

    public function messages()
    {
        return [
            'jenis.required'        =>  'Data Tidak Boleh Kosong',
            'status.required'       =>  'Pilih Salah Satu',
        ];
    }

    public function update()
    {
        $this->validate();
        $query = jenis_pengujian_sampel::find($this->id)->update([
            'jenis_pengujian'   => $this->jenis,
            'status'            => $this->status,
        ]);

        if($query)
        {
            $this->dispatch('success');
        }
    }

}
