
<div class=" col-lg-4 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-default">
            <div class="card-header ">
                <h5 class="card-title">FORM DOKUMEN</h5>
            </div>
            <div class="card-body">
                <form wire:submit='simpan' class="form-horizontal">

                    <div class="form-group row">
                        <label class="control-label text-sm col-sm-4"> Judul Dokumen <b class='text-red'>*</b></label>
                        <div class="col-sm-8">
                            <input type="text" wire:model.defer='varAsal_Surat'class="form-control rounded-0 @error('varAsal_Surat') is-invalid @enderror" placeholder="Judul Dokumen">
                            @error('varAsal_Surat') <span class=" text-xs error is-invalid text-red"> {{ $message }} </span> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class=" control-label text-sm col-sm-4"> Nomor Dokumen <b class='text-red'>*</b></label>
                        <div class="col-sm-8">
                            <input type="text" wire:model.defer='varNomor_Surat' class="form-control rounded-0 form-control-sm @error('varNomor_Surat') is-invalid @enderror" placeholder=" Nomor Dokumen">
                            @error('varNomor_Surat') <span class="text-sm text-red error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label text-sm col-sm-4">Jenis Dokumen <b class='text-red'>*</b></label>
                        <div class="col-sm-8">
                            <select wire:model.defer='varJenis_Surat'class="form-control rounded-0 form-control-sm @error('varJenis_Surat') is-invalid @enderror">
                                <option value="" selected>--Pilih Salah Satu--</option>
                                <option value="rahasia">Rahasia</option>
                                <option value='segera'>Segera</option>
                                <option value="biasa">Biasa</option>
                            </select>
                            @error('varJenis_Surat')<span class="error is_invalid text-sm text-red"> {{ $message }} </span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label text-sm col-sm-4">Tanggal Surat <b class='text-red'>*</b></label>
                        <div class="col-sm-8">
                            <input wire:model.defer='varTanggal' type="date" class="form-control form-control-sm rounded-0 @error('varTanggal')is-invalid @enderror">
                            @error('varTanggal')<span class="error text-red text-sm">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label text-sm col-sm-4"> Keterangan <b class='text-red'>*</b></label>
                        <div class="col-sm-8">
                            <textarea wire:model='varPerihal' class="form-control form-control-sm rounded-0 @error('varPerihal')is-invalid @enderror"></textarea>
                            @error('varPerihal')<span class="text-sm text-red">{{ $message }}</span>@enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="control-label text-sm col-sm-4">File Dokumen<b class='text-red'>*</b></label>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" placeholder="File Dokumen" class="custom-file-input @error('varFile')is-invalid @enderror" wire:model="varFile" id="customFile">
                                <label class="custom-file-label" for="customFile">{{ $namaAsliFile }}</label>
                            </div>
                            <span class="text-sm text-default"><i>File yang di upload max 5 MB</i><br></span>
                            @error('varFile') <span class="text-sm text-red">{{ $message }}</span> @enderror
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
