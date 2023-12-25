<div class="col-lg-12 row">
    <form wire:submit='store' class="row form-horizontal">
        <div class="col-lg-12 col-md-12 col-sm-12 row">
            <div class="card card-outline card-primary">
                <div class="card-header ">
                    <h5 class="card-title">FORM <b>PERMOHONAN ANALISIS</b></h5>
                </div>
                <div class="card-body row">
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label col-sm-3"> Nomor SPK <b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                           <input type="text" class="form-control" placeholder="Nomor SPK">
                            @error('varAsal_Surat') <span class=" text-xs error is-invalid text-red"> {{ $message }} </span> @enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label col-sm-3"> Jenis Pengujian Sampel <b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <select class=" form-control" >
                                <option value="">-- Pilih Salah Satu --</option>
                                @foreach ($analisa as $data )
                                <option value="{{ $data->id }}">{{ $data->jenis_pengujian}}</option>
                                @endforeach
                            <select>
                            @error('varAsal_Surat') <span class=" text-xs error is-invalid text-red"> {{ $message }} </span> @enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                        <label class=" control-label col-sm-3">Nama Pemohon <b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <input type="text" wire:model.defer='varNomor_Surat' class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror" placeholder=" Nama Pemohon">
                            @error('varNomor_Surat') <span class=" text-red error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label col-sm-3">No. Telp (HP) <b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <input type="text" wire:model.defer='varNomor_Surat' class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror" placeholder=" Nomor Telepon (HP)">
                            @error('varJenis_Surat')<span class="error is_invalid  text-red"> {{ $message }} </span>@enderror
                        </div>
                    </div>
                    <div class="form-group  col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label  col-sm-3">Provinsi<b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <select class=" form-control" >
                                <option>Tanah(TH)</option>
                                <option>Pupuk Organik (PO)</option>
                            <select>
                            @error('varTanggal')<span class="error text-red ">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group  col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label  col-sm-3">Kab/Kota<b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <select class=" form-control" >
                                <option>Tanah(TH)</option>
                                <option>Pupuk Organik (PO)</option>
                            <select>
                            @error('varTanggal')<span class="error text-red ">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group  col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label  col-sm-3">Kecamatan<b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <select class=" form-control" >
                                <option>Tanah(TH)</option>
                                <option>Pupuk Organik (PO)</option>
                            <select>
                            @error('varTanggal')<span class="error text-red ">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group  col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label  col-sm-3">Kelurahan Desa<b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <select class=" form-control" >
                                <option>Tanah(TH)</option>
                                <option>Pupuk Organik (PO)</option>
                            <select>
                            @error('varTanggal')<span class="error text-red ">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label  col-sm-3">Tanggal Pengujian<b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <input type="date" wire:model.defer='varNomor_Surat' class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror" placeholder=" Jenis Kemasan  ">
                            @error('varFile') <span class=" text-red">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 row">
            <div class="card card-outline card-primary">
                <div class="card-header ">
                    <h5 class="card-title">Identitas  <b>Contoh</b></h5>
                </div>
                <div class="card-body row">
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label  col-sm-3"> Jumlah Contoh <b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <input type="text" wire:model.defer='varNomor_Surat' class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror" placeholder=" Jumlah Contoh">
                        @error('varPerihal')<span class=" text-red">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label  col-sm-3"> Jenis Contoh <b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <input type="text" wire:model.defer='varNomor_Surat' class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror" placeholder=" Jenis Contoh">
                        @error('varPerihal')<span class=" text-red">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label  col-sm-3"> Berat Contoh <b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <input type="text" wire:model.defer='varNomor_Surat' class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror" placeholder=" Berat Contoh">
                        @error('varPerihal')<span class=" text-red">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label  col-sm-3">Bentuk Contoh<b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <input type="text" wire:model.defer='varNomor_Surat' class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror" placeholder=" Bentuk Contoh">
                        @error('varFile') <span class=" text-red">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label  col-sm-3">Kondisi Contoh<b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <input type="text" wire:model.defer='varNomor_Surat' class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror" placeholder=" Kondisi Kemasan">
                        @error('varFile') <span class=" text-red">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label  col-sm-3">Jenis Kemasan<b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <input type="text" wire:model.defer='varNomor_Surat' class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror" placeholder=" Jenis Kemasan  ">
                        @error('varFile') <span class=" text-red">{{ $message }}</span> @enderror
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="card card-outline card-primary">
                <div class="card-header ">
                    <h5 class="card-title">FORM <b>PERMOHONAN ANALISIS</b></h5>
                </div>
                <div class="card-body">
                <table class="table tabel-sm table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="60">No.</th>
                            <th width="200" class="text-center">Kode Contoh / Sampel (Customer)</th>
                            <th width="200" class="text-center">Kode Lab</th>
                            <th width="200" class="text-center">Paremeter Uji</th>
                            <th width="200" class="text-center">Keterangan</th>
                            <th width="200" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $sampel as $no=>$data )
                        <tr>
                            <td>{{ $no+1 }}.</td>
                            <td><input wire:model='kodeSampel.{{ $no }}' type="text"  class="form-control form-control-sm rounded-0"></td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                            @if($no===0)
                                <td class="text-center"><a class="btn btn-primary" wire:click="addSampel('{{ $no }}')">+</a></td>
                            @else
                                <td class="text-center"><a class="btn btn-danger" wire:click="removeSampel({{ $no }})"><i class="fa fa-trash"></i></a></td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12">
            <a class=" btn-md btn btn-danger btn=flat rounded-0 float-right" style="margin-right:15px;"><span aria-hidden="true">x</span> Batal</a>
            <button class=" btn-md btn btn-primary rounded-0 btn=flat float-right" style="margin-right:15px;"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
        </div>
    </form>
</div>
<script>
    window.addEventListener('alert', event => {
        Swal.fire({
            text: event.detail.text,
            title: event.detail.title,
            icon: event.detail.icon,
            showConfirmButton: false,
            timer: event.detail.timer,
            buttons: false,
        });
    });
</script>
