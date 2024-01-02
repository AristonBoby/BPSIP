<?php

namespace App\Livewire\PermohonanAnalisis;

use App\Models\user;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\jenis_pengujian_sampel;

class FormPermintaanAnalisis extends Component
{   use WithPagination;
    public $sampel = [1];
    public $index  = 0;
    public $kodeSampel=[];
    public $getharga=[];
    public $cari='';
    public $varCari;

    public $form = true;

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
    public $alamat;
    public $idpemeriksaan=[];
    public $i=0;
    public function mount()
    {
        $this->tanggal = date('d-m-Y');
    }

    public function render()
    {   $query = User::where('name','LIKE','%'.$this->cari.'%')->where('role',2)->paginate(10);
        $data = jenis_pengujian_sampel::all();
        $pengujian = DB::table('analisa_sampels')
                     ->join('jenis_pengujian_sampels','jenis_pengujian_sampels.id','analisa_sampels.jenisPengujian_id')
                     ->where('analisa_sampels.jenisPengujian_id',$this->jenisPengujian)
                     ->select('analisa_sampels.jenis_analisa','analisa_sampels.id')
                     ->get();
        return view('livewire.permohonan-analisis.form-permintaan-analisis',['analisa'=>$data,'cariUser'=>$query,'itemPengujian'=>$pengujian]);
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

    public function batal()
    {
        $this->cari = '';
    }

    public function selectUser($id)
    {
       $query = DB::table('users')
                ->join('user_pemohons','user_pemohons.user_id','users.id')
                ->join('kelurahans','kelurahans.id','user_pemohons.kelurahan_id')
                ->join('kecamatans','kecamatans.id','kelurahans.kecamatan_id')
                ->join('kotas','kotas.id','kecamatans.kota_id')
                ->join('provinsis','provinsis.id','kotas.provinsi_id')
                ->where('role',2)
                ->where('users.id',$id)
                ->select('name','no_tlpn','alamat','namaKelurahan','namaKecamatan','namaKota','namaProvinsi')
                ->first();
       //dd($query);
       if($query)
       {
        $this->dispatch('alert',text:'[ '.$query->name.' ]' ,icon:'success',title:'Berhasil',timer:2000);
        $this->namaPemohon  =   $query->name;
        $this->noTlpn       =   $query->no_tlpn;
        $this->alamat       =   $query->alamat. ', DESA/KEL. '. $query->namaKelurahan.', KEC. '. $query->namaKecamatan.', KAB/KOTA. '. $query->namaKota.', Provinsi '.$query->namaProvinsi;
        $this->form         =   false;
       }else
       {
        $this->dispatch('alert',text:'Gagal Mengambil Data' ,icon:'warning',title:'Gagal ',timer:2000);
        $this->namaPemohon  =   '';
        $this->noTlpn       =   '';
        $this->alamat       =   '';
        $this->form         =   true;
       }
    }

    public function updatedIdpemeriksaan($value,$key)
    {
       // dd($this->idpemeriksaan);
       $this->getharga[$key] = 10000;
    }
}
