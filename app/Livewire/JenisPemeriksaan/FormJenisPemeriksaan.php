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
        $query = DB::table('jenis_pemeriksaan_sampels')
        ->select('jenis_pemeriksaan_sampels.analisa_sampel_id, DB::raw(SUM(harga) AS Total)')->groupBy('jenis_pemeriksaan_sampels.analisa_sampel_id')->get();
        //select('jenis_pengujian_sampels.*','jenis_pemeriksaan_sampels.*',DB::raw('jenis_pemeriksaan_sampels.*,SUM(harga) AS Total'))->groupBy('user_id')->get();
        dd($query);
        $data=jenis_pengujian_sampel::all();
        $analisa = analisaSampel::where('jenisPengujian_id',$this->jenisPengujian)->get();
        return view('livewire.jenis-pemeriksaan.form-jenis-pemeriksaan',['query'=>$data,'analisaSampel'=>$analisa]);
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
    {
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

    public function hitung()
    {

    }
}
