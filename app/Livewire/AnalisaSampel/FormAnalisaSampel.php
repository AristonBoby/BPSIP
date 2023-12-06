<?php

namespace App\Livewire\AnalisaSampel;

use Livewire\Component;
use App\Models\analisaSampel;
use App\Models\jenis_pengujian_sampel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class FormAnalisaSampel extends Component
{
    public $varJenis;
    public $varAnalisa;
    public $varStatus=1;

    public function render()
    {
        $query = jenis_pengujian_sampel::where('status','1')->get();

        return view('livewire.analisa-sampel.form-analisa-sampel',['pengujian'=>$query]);
    }

    protected $rules = [
        'varJenis'      =>  'required',
        'varAnalisa'    =>  'required',
        'varStatus'     =>  'required',
    ];

    public function messages()
    {
        return [
            'varJenis.required'     => 'Data Wajib diisi !!!',
            'varAnalisa.required'   => 'Data Wajib diisi !!!',
            'varStatus.required'    => 'Data Wajib diisi !!!'
        ];
    }   
    private function resetForm()
    {
        $this->varAnalisa   = '';
        $this->varJenis     = '';
        $this->varStatus    = '1';
    }


    public function create()
    {   
        $this->validate();
        $query = analisaSampel::create([
            'id'                => Str::uuid(),
            'jenis_analisa'     => $this->varAnalisa,
            'users_id'          => Auth::id(),
            'jenisPengujian_id' => $this->varJenis,
            'status'            => $this->varStatus,
        ]);

        if($query)
        {
            $this->resetForm();
            $this->dispatch('alert',text:'Data Behasil Tersimpan',icon:'success',title:'Berhasil   ',timer:2000);
        }
    }
}
