<div class=" col-lg-12 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-outline-primary">
            <div class="card-header ">
                <h5 class="card-title">FORM <b>PERMOHONAN ANALISIS</b></h5>
            </div>
            <div class="card- col-md-12">
                <form wire:submit='simpan' class="row form-horizontal">
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
                                <option>Tanah(TH)</option>
                                <option>Pupuk Organik (PO)</option>
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
                    <div class="col-md-12 mb-3">
                         <div class="card card-warning">
                            <div class="card-header">
                                <h5 class="card-title">Identitas <b>Contoh</b>
                            </div>
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

                    <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label  col-sm-3">Tanggal Pengujian<b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <input type="date" wire:model.defer='varNomor_Surat' class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror" placeholder=" Jenis Kemasan  ">
                            @error('varFile') <span class=" text-red">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <span class="card-title">Data Sampel</span>
                            </div>
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
                                    <tr>
                                        <td>1.</td>
                                        <td><input type="text" class="form-control form-control-sm rounded-0"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td class="text-center"><a class="btn btn-primary">+</a></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td><input type="text" class="form-control form-control-sm rounded-0"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td class="text-center"><a class="btn btn-primary">+</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <button class=" btn-sm btn btn-primary float-right"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
                        <a class=" btn-sm btn btn-danger float-right" style="margin-right:5px;"><span aria-hidden="true">x</span> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
