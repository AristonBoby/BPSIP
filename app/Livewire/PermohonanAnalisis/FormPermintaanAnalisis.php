<?php

namespace App\Livewire\PermohonanAnalisis;

use App\Models\user;
use Livewire\Component;
use App\Models\itemAnalisa;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Illuminate\Support\Carbon;
use App\Models\transaksiAnalisa;
use App\Models\permintaanAnalisa;
use App\Models\transaksi_analisa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\jenis_pengujian_sampel;
use App\Models\jenisPemeriksaanSampel;

class FormPermintaanAnalisis extends Component
{   use WithPagination;
    public $sampel = [1];
    public $index  = 0;
    public $kodeSampel=[];
    public $kodeLab=[];
    public $getharga=[];
    public $keterangan=[];
    public $itemPemeriksaan=[];
    public $cari='';
    public $varCari;
    public $removeItem;

    public $form = true;

    public $userId;
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
        $this->index++;
        $this->sampel[$no]='';
        array_push($this->sampel,$no);
    }

    public function removeSampel($no)
    {
        $this->index--;
        unset($this->sampel[$no]);
        unset($this->kodeSampel[$no]);
        unset($this->itemPemeriksaan[$no]);
        unset($this->idpemeriksaan[$no]);
        unset($this->getharga[$no]);
        unset($this->keterangan[$no]);
        array_push($this->sampel);
        array_push($this->kodeSampel);
        array_push($this->itemPemeriksaan);
        array_push($this->idpemeriksaan);
        array_push($this->keterangan);
    }

    protected $rules=[
        'nomorSpk'          =>  'required',
        'namaPemohon'       =>  'required',
        'jenisPengujian'    =>  'required',
        'noTlpn'            =>  'required',
        'jumContoh'         =>  'required',
        'beratContoh'       =>  'required',
        'jenisContoh'       =>  'required',
        'kondisiContoh'     =>  'required',
        'bentukContoh'      =>  'required',
        'jenisKemasan'      =>  'required',
        'kodeSampel.*'      =>  'required',
        'kodeLab'           =>  'required',
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
        $insert = permintaanAnalisa::create([
            'id'            =>  Str::uuid(),
            'jumContoh'     =>  $this->jumContoh,
            'no_spk'        =>  $this->nomorSpk,
            'beratContoh'   =>  $this->beratContoh,
            'bentukContoh'  =>  $this->bentukContoh,
            'kondisiContoh' =>  $this->kondisiContoh,
            'jenisKemasan'  =>  $this->jenisKemasan,
            'tanggal'       =>  Carbon::parse($this->tanggal)->format('Y/m/d'),
            'status_daftar' =>  2,
            'status'        =>  1,
            'user_id'       =>  $this->userId,
        ]);
        if($insert)
        {
            $idAnalisa = permintaanAnalisa::orderBy('created_at', 'DESC')->first();
            for($i=0; $i < count($this->kodeSampel); $i++)
            {

                if($idAnalisa)
                {
                    for($i=0; $i < count($this->kodeSampel); $i++ )
                    {
                        $id = Str::uuid();
                        $query = itemAnalisa::create([
                                'id'                        =>  $id,
                                'kodeSampel'                =>  $this->kodeSampel[$i],
                                'kodeLab'                   =>  $this->kodeLab[$i],
                                'jenisAnalisaSampel_id'     =>  $this->idpemeriksaan[$i],
                                'permintaan_analisas_id'    =>  $idAnalisa->id,
                                'keterangan'                =>  $this->keterangan[$i],
                        ]);
                        //-------------------------------------------------//
                        //-- Cek Jumlah item Analisa Yang ingin di input --//
                        //-------------------------------------------------//

                        if($query)
                        {
                            $item = jenisPemeriksaanSampel::where('analisa_sampel_id',$this->idpemeriksaan[$i])->where('status','1')->get();
                            foreach($item as $value)
                            $qu = transaksiAnalisa::create([
                            'id'                            =>  Str::uuid(),
                            'item_analisa_id'               =>  $id,
                            'jenis_pemeriksaan_sampels_id'  =>  $value->id,
                            ]);
                        }
                    }
                }
            }
        }
        $this->dispatch('alert',text:'Data Berhasil Di Simpan' ,icon:'success',title:'Berhasil',timer:2000);
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
                ->select('users.id','name','no_tlpn','alamat','namaKelurahan','namaKecamatan','namaKota','namaProvinsi')
                ->first();
       if($query)
       {
        $this->dispatch('alert',text:'[ '.$query->name.' ]' ,icon:'success',title:'Berhasil',timer:2000);
        $this->namaPemohon  =   $query->name;
        $this->noTlpn       =   $query->no_tlpn;
        $this->alamat       =   $query->alamat. ', DESA/KEL. '. $query->namaKelurahan.', KEC. '. $query->namaKecamatan.', KAB/KOTA. '. $query->namaKota.', Provinsi '.$query->namaProvinsi;
        $this->form         =   false;
        $this->userId       =   $query->id;
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
       $query = jenisPemeriksaanSampel::join('analisa_sampels','analisa_sampels.id','=','jenis_pemeriksaan_sampels.analisa_sampel_id')
       ->join('jenis_pengujian_sampels','jenis_pengujian_sampels.id','=','analisa_sampels.jenisPengujian_id')
       ->select(DB::raw('SUM(jenis_pemeriksaan_sampels.harga) AS harga'),DB::raw("GROUP_CONCAT(jenis_pemeriksaan_sampels.itemPemeriksaan SEPARATOR ' , ') AS jenis"))
       ->groupBy('jenis_pengujian_sampels.jenis_pengujian')
       ->groupBy('jenis_pemeriksaan_sampels.analisa_sampel_id')
       ->where('jenis_pemeriksaan_sampels.analisa_sampel_id',$this->idpemeriksaan[$key])
       ->get();
       foreach ($query as $value) {
        $this->getharga[$key] = formatRupiah($value->harga);
        $this->itemPemeriksaan[$key] = $value->jenis;
      }
    }
}
