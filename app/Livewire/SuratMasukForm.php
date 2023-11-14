<?php

namespace App\Livewire;

use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\document;
use Livewire\WithFileUploads;
use Twilio\Rest\Client;

class SuratMasukForm extends Component
{
    use WithFileUploads;

    public $varFile;
    public $varAsal_Surat;
    public $varNomor_Surat;
    public $varJenis_Surat;
    public $varTanggal;
    public $varPerihal;
    public $namaAsliFile;

    public function render()
    {
        return view('livewire.suratMasukForm',);
    }

    public function test()
    {
        dd('dddd');
    }

    public function messages()
    {
        return [
            'varAsal_Surat.required'      =>  'Asal Surat Wajib diisi',
            'varAsal_Surat.max'           =>  'Maksimal 30 Karakter',
            'varFile.mimes'               =>  'Ukuran Lebih Dari 5 Mb',
            'varNomor_Surat.required'     =>  'Nomor Surat Wajib diisi',
            'varNomor_Surat.max'          =>  'Maksimal 30 Karakter',
            'varJenis_Surat.required'     =>  'Jenis Surat Wajib diisi',
            'varTanggal.required'         =>  'Tanggal Surat Wajib diisi',
            'varPerihal.required'         =>  'Perihal Surat Wajib diisi',
            'varFile.required'            =>  'File Wajib diisi',
        ];
    }
    // Cek Ukuran FIle Upload //
    public function updatedVarFile()
    {
         $this->validate([
         'varFile' => 'file|mimes:pdf'
         ]);
            $size = $this->varFile->getSize();
            $maxSizeUpload = 1048576 * 5;

            if($maxSizeUpload >= $size)
            {
                $this->namaAsliFile = $this->varFile->getClientOriginalName();
            }
    }
    // END //

    protected $rules = [
        'varAsal_Surat'     => 'required|max:30',
        'varNomor_Surat'    => 'required|max:30',
        'varJenis_Surat'    => 'required',
        'varTanggal'        => 'required',
        'varPerihal'        => 'required',
        'varFile'           => 'required',
    ];

    public function simpan()
    {
        $this->validate();
        $namaFile = date('d_m_Y:h_m_s').'.'.$this->varFile->getClientOriginalExtension();
        $query = document::create([
            'id'            => Str::uuid(),
            'asal_surat'    => $this->varAsal_Surat,
            'nomor_surat'   => $this->varNomor_Surat,
            'jenis_surat'   => $this->varJenis_Surat,
            'tanggal'       => $this->varTanggal,
            'perihal'       => $this->varPerihal,
            'user_id'       => Auth::user()->id,
            'document'      => $namaFile,
        ]);

        if($query)
        {
            $this->varFile->storeAs('public/dokumen',$namaFile);
            $this->dispatch('alert',text:'Data Berhasil disimpan !!!',icon:'success',title:'Berhasil',timer:2000);
            $this->resetForm();
        }

        else{
            $this->dispatch('alert',text:'Data Tidak Tersimoan',icon:'error',title:'Gagal   ',timer:2000);
        }
    }

    private function resetForm()
    {
        $this->varFile          = '';
        $this->varAsal_Surat    = '';
        $this->varNomor_Surat   = '';
        $this->varJenis_Surat   = '';
        $this->varTanggal       = '';
        $this->varPerihal       = '';
        $this->namaAsliFile     = '';
    }

    private function whatsapp()
    {
        $recipient = '+6281251357537';

        $sid    = getenv("TWILIO_AUTH_SID");

        $token  = getenv("TWILIO_AUTH_TOKEN");
        $wa_from= getenv("TWILIO_WHATSAPP_FROM");

        $twilio = new Client($sid, $token);

        $body = "Hello, welcome to codelapan.com.";

        return $twilio->messages->create("whatsapp:+6285162962518",["from" => "whatsapp:+14155238886", "body" => $body]);
    }
}
