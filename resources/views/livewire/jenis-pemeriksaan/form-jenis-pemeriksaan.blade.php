<div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Form</b> Jenis Analisa</h5>
        </div>

        <div class="card-body row">

            <div class="form-group col-lg-12 col-md-12 col-sm-12 row" >
                <label class="control-label col-sm-4">Jenis Analisa <b class='text-red'>*</b></label>
                <div class="col-sm-8">
                    <select class="form-control" wire:model.live='jenisPengujian'>
                        <option value="">--Pilih Salah Satu--</option>
                        @foreach ( $query as $data)
                            <option value="{{ $data->id }}" >{{ $data->jenis_pengujian }}</option>
                        @endforeach
                    </select>
                     @error('varFile') <span class=" text-red">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 row" >
                <label class="control-label col-sm-4">Ketegori Pengujian <b class='text-red'>*</b></label>
                <div class="col-sm-8">
                    <select class="form-control" wire:model='analisa'>
                        <option value="">--Pilih Salah Satu---</option>
                        @foreach ( $analisaSampel as $data)
                        <option value="{{ $data->id }}" >{{ $data->jenis_analisa }}</option>
                        @endforeach
                    </select>
                     @error('varFile') <span class=" text-red">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 row" >
                <label class="control-label col-sm-4">Item Pengujian <b class='text-red'>*</b></label>
                <div class="col-sm-8">
                    <input type="text" wire:model.defer='varNomor_Surat' class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror" placeholder="Jenis Pengujian Sampel">
                     @error('varFile') <span class=" text-red">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 row" >
                <label class="control-label col-sm-4">Biaya <b class='text-red'>*</b></label>
                <div class="col-sm-8">
                    <input type="text" wire:model.defer='varNomor_Surat' class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror" placeholder="Jenis Pengujian Sampel">
                     @error('varFile') <span class=" text-red">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 row">
                <label class="control-label col-sm-4">Status <b class='text-red'>*</b></label>
                <div class="col-sm-8">
                    <select class="form-control rounded-0  @error('varNomor_Surat') is-invalid @enderror">
                        <option>Aktif</option>
                        <option>Tidak</option>
                    </select>
                        @error('varFile') <span class=" text-red">{{ $message }}</span> @enderror
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-sm btn-primary float-right">Simpan</button>
        </div>

    </div>
