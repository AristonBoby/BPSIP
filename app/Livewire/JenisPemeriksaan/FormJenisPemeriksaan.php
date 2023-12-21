<?php

namespace App\Livewire\JenisPemeriksaan;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\analisaSampel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\jenis_pengujian_sampel;
use App\Models\jenisPemeriksaanSampel;

class FormJenisPemeriksaan extends Component
{   public $jenisPengujian ='';
    public $analisa="";
    public $status =1;
    public $itemPengujian;
    public $biaya;

    public function render()
    {
        //$query = jenisPemeriksaanSampel::select('analisa_sampel_id',DB::raw('SUM(jenis_pemeriksaan_sampels.harga) AS harga'), DB::raw('GROUP_CONCAT(jenis_pemeriksaan_sampels.itemPemeriksaan) AS item'))->groupBy('analisa_sampel_id')->get();
        $query = jenisPemeriksaanSampel::join('analisa_sampels','analisa_sampels.id','=','jenis_pemeriksaan_sampels.analisa_sampel_id')
                                        ->select('analisa_sampels.jenis_analisa',DB::raw('SUM(jenis_pemeriksaan_sampels.harga) AS harga'),DB::raw("GROUP_CONCAT(jenis_pemeriksaan_sampels.itemPemeriksaan SEPARATOR ' <br> ') AS jenis"))
                                        ->groupBy('analisa_sampels.jenis_analisa')
                                        ->paginate(10);
                                      //  dd($query);
        $data=jenis_pengujian_sampel::all();
        $analisa = analisaSampel::where('jenisPengujian_id',$this->jenisPengujian)->get();
        return view('livewire.jenis-pemeriksaan.form-jenis-pemeriksaan',['query'=>$data,'analisaSampel'=>$analisa]);
    }

    protected $rules = [
        'biaya'             =>  'required|integer',
        'analisa'           =>  'required|',
        'jenisPengujian'    =>  'required|',
        'analisa'           =>  'required|'
    ];


    public function messages()
    {
        return [
            'biaya.required'            => 'Data tidak boleh kosong',
            'biaya.integer'             => 'Data yang diinput wajib angka',
            'analisa.required'          => 'Data tidak boleh kosong',
            'jenisPengujian.required'   => 'Data tidak boleh kosong',
            'analisa.required'          => 'Data tidak boleh kosong',
        ];
    }

    public function formReset()
    {
        $this->jenisPengujian = '';
        $this->analisa="";
        $this->biaya="";
        $this->user_id=" ";
        $this->analisa_sammpel_id='';
        $this->status=1;
        $this->itemPengujian='';
    }

    public function simpan()
    {    $this->validate();
        $query = jenisPemeriksaanSampel::create([
            'id'                => str::uuid(),
            'itemPemeriksaan'   => $this->itemPengujian,
            'harga'             => $this->biaya,
            'user_id'           => Auth::id(),
            'analisa_sampel_id' => $this->analisa,
            'status'            => $this->status,
        ]);

        if($query)
        {   $this->formReset();
            $this->dispatch('alert',text:'Data Behasil Tersimpan',icon:'success',title:'Berhasil   ',timer:2000);
        }
    }


}
