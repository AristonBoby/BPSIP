<?php

namespace App\Livewire\PermohonanAnalisis;

use Livewire\Component;
use App\Models\jenis_pengujian_sampel;
class FormPermintaanAnalisis extends Component
{
    public $sampel = [1];
    public $index  = 0;
    public $kodeSampel=[];

    public $tanggal;
    public $nomorSpk;
    public $namaPemohon='';
    public $jenisPengujian;
    public $noTlpn;
    public $provinsi;
    public $kab;
    public $kec;
    public $kel;
    public $jumContoh;
    public $beratContoh;
    public $jenisContoh;
    public $kondisiContoh;
    public $bentukContoh;
    public $jenisKemasan;


    public $i = 0;

    public function mount()
    {
        $this->tanggal = date('d-m-Y');
    }

    public function render()
    {   $data = jenis_pengujian_sampel::all();
        return view('livewire.permohonan-analisis.form-permintaan-analisis',['analisa'=>$data]);
    }

    public function addSampel($no)
    {   $no+1;
        $this->index = $no;
        $this->sampel[$no]='';
        array_push($this->sampel,$no);
    }

    public function removeSampel($no)
    {   $this->kodeSampel[$no]='';
        unset($this->sampel[$no]);
        unset($this->kodeSampel[$no]);
        array_push($this->sampel);
    }

    protected $rules=[
        'nomorSpk'          =>  'required',
        'namaPemohon'       =>  'required',
        'jenisPengujian'    =>  'required',
        'noTlpn'            =>  'required',
        'provinsi'          =>  'required',
        'kab'               =>  'required',
        'kec'               =>  'required',
        'kel'               =>  'required',
        'jumContoh'         =>  'required',
        'beratContoh'       =>  'required',
        'jenisContoh'       =>  'required',
        'kondisiContoh'     =>  'required',
        'bentukContoh'      =>  'required',
        'jenisKemasan'      =>  'required',
    ];

    public function messages()
    {
        return [
            'nomorSpk.required'         =>  'Nomor SPK Tidak Boleh Kosong',
            'namaPemohon'               =>  'Nama Pemohon Tidak Boleh',
            'jenisPengujian.required'   =>  'Jenis Pengujian Sampel Tidak Boleh Kosong',
            'noTlpn.required'           =>  'Nomor Telepon Tidak Boleh Kosong',
            'provinsi.required'         =>  'Provinsi Tidak Boleh Kosong',
            'kab.required'              =>  'Kab/Kota Tidak Boleh Kosong',
            'kec.required'              =>  'Kecamatan Tidak Boleh Kosong',
            'kel.required'              =>  'Kelurahan / Desa Tidak Boleh Kosong',
            'tanggal.required'          =>  'Tanggal Tidak Boleh Kosong',
            'jumContoh.required'        =>  'Jumlah Contoh Tidak Boleh Kosong',
            'beratContoh.required'      =>  'Berat Contoh Tidak Boleh Kosong',
            'jenisContoh.required'      =>  'Jenis Contoh Tidak Boleh Kosong',
            'kondisiContoh.required'    =>  'Kondisi Contoh Tidak Boleh Kosong',
            'bentukContoh.required'     =>  'Bentuk Contoh Tidak Boleh Kosong',
            'jenisKemasan.required'     =>  'Jenis Kemasan Tidak Boleh Kosong',
        ];
    }
    public function store()
    {
        $this->validate();
    }
}
