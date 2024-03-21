<div wire:ignore.self class="modal fade" id="modalupdateAlamat" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-address-card" aria-hidden="true"></i> Update Alamat User </b></h6>
                    <button type="button btn-default" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times text-white"></i></span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <form wire:submit="update">
                        <div class="form-group row">
                            <label class="form-label col-md-3"> Provinsi </label>
                            <div class="col-md-9">
                                <select class="form-control @error('idProvinsi') is-invalid @enderror" wire:model.live="idProvinsi">
                                    <option value="">-- Pilih Salah Satu --</option>
                                    @foreach($provinsi as $query)
                                    <option value="{{$query->id}}">{{$query->namaProvinsi}}</option>
                                    @endforeach
                                </select>
                                @error('idProvinsi') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-md-3"> Kab/Kota </label>
                            <div class="col-md-9">
                                <select class="form-control @error('idKota') is-invalid @enderror" wire:model.live="idKota">
                                    <option>-- Pilih Salah Satu --</option>
                                    @foreach($kota as $value)
                                    <option value="{{$value->id}}">{{$value->namaKota}}</option>
                                    @endforeach
                                </select>
                                @error('idKota') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-md-3"> Kecamatan </label>
                            <div class="col-md-9">
                                <select class="form-control @error('idKec') is-invalid @enderror" wire:model.live='idKec'>
                                    <option>-- Pilih Salah Satu --</option>
                                    @foreach($kecamatan as $kec)
                                    <option value="{{$kec->id}}">{{$kec->namaKecamatan}}</option>
                                    @endforeach
                                </select>
                                @error('idkec') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-md-3 " > Kelurahan </label>
                            <div class="col-md-9">
                                <select class="form-control @error('idKel') is-invalid @enderror" wire:model='idKel'>
                                    <option>-- Pilih Salah Satu --</option>
                                    @foreach($kelurahan as $kel)
                                    <option value="{{$kel->id}}">{{$kel->namaKelurahan}}</option>
                                    @endforeach
                                </select>
                                @error('idKel') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-flat btn-sm btn-default ml-2 float-right" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp;Batal</button>
                            <button type="submit" class="btn btn-sm btn-success btn-flat float-right"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

