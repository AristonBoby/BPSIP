<div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Form</b> Jenis Pengujian Sampel</h5>
        </div>
        <div class="card-body row">
            <form wire:submit="create" class="col-md-12">

                <div class="form-group col-lg-12 col-md-12 col-sm-12 row">
                    <label class="control-label col-sm-4 text-sm">Jenis Analisa<b class='text-red'>*</b></label>
                    <div class="col-sm-8">
                        <select wire:model="varJenis" class="text-sm form-control-sm form-control rounded-0  @error('varJenis') is-invalid @enderror">
                            <option value='' selected >--Pilih Salah Satu--</option>
                            @forelse($pengujian as $query)
                            <option value='{{$query->id}}'>{{$query->jenis_pengujian}}</option>
                            @endforeach
                        </select>
                        @error('varJenis') <span class="text-xs text-red" style="margin-top:-2px;">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12 row" style="margin-bottom:-2px;">
                   <label class="control-label text-sm col-sm-4">Kategori Pengujian Sampel<b class='text-red'>*</b></label>
                        <div class="col-sm-8">
                            <input type="text" wire:model.defer='varAnalisa' class="form-control form-control-sm rounded-0  @error('varAnalisa') is-invalid @enderror" placeholder="Kategori Pengujian Sampel">
                            @error('varAnalisa') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                        </div>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12 row text-sm">
                    <label class="control-label col-sm-4 ">Status <b class='text-red'>*</b></label>
                    <div class="col-sm-8">
                        <select wire:model="varStatus" class="form-control-sm form-control rounded-0  @error('varStatus') is-invalid @enderror">
                            <option value='1'>Aktif</option>
                            <option value="0">Tidak</option>
                        </select>
                            @error('varStatus') <span class=" text-red">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button class="btn btn-sm btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <script>
    window.addEventListener('alert', event => {
        $('#modalBatalHapus').modal('hide');
        $('#modalHapus').modal('hide');
        $('#modalEdit').modal('hide');
        

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
