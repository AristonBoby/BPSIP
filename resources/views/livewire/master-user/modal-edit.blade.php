<div wire:ignore.self class="modal fade" id="modaledit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-address-card" aria-hidden="true"></i> Update Data User </b></h6>
                    <div wire:loading>
                        <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
                    </div>
                    <button type="button btn-default" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times text-white"></i></span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <h4 class="text-center mb-5">Update Data User</h4>
                    </div>
                    <form wire:submit="update">
                        <div class="form-group row">
                            <label class="form-label col-md-2"> Nama </label>
                            <div class="col-md-10">
                                <input type="text" wire:model="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama Anda">
                                @error('nama') <a class="text-red text-sm">{{ $message }}</a> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-md-2"> Email </label>
                            <div class="col-md-10">
                                <input type="email" class="@error('email') is-invalid @enderror form-control" wire:model="email" placeholder="Masukan Email Anda">
                                @error('email') <a class="text-red text-sm">{{ $message }}</a> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-md-2"> No.Hp </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" wire:model="no_Hp" placeholder="Masukan Nomor Hp Anda">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-md-2"> Provinsi </label>
                            <div class="col-md-10">
                                <select class="form-control" disabled>
                                    <option value="">{{$prov_id}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-md-2"> Kab/Kota </label>
                            <div class="col-md-10">
                                <select class="form-control" disabled>
                                    <option value="{{$kota_id}}">{{$kota_id}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-md-2"> Kecamatan </label>
                            <div class="col-md-10">
                                <select class="form-control" disabled >
                                    <option value="">{{$kec_id}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-md-2"> Desa/Kelurahan </label>
                            <div class="col-md-10">
                                <select class="form-control"disabled>
                                    <option>{{$kelurahan}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-md-2"> Alamat </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" wire:model="alamat" placeholder="Masukan Nomor Hp Anda">
                            </div>
                        </div>
                        <div class="form-group"> 
                            <button type="button" class="btn btn-default float-right" data-dismiss="modal"><i class="fa fa-times"></i>Batal</button>
                            <button type="submit" class="btn btn-success float-right mr-2" ><i class="fas fa-save"></i> Simpan</button>
                            <button type="button" wire:click="iduserAlamat('{{$no_Hp}}')" data-toggle="modal" data-target="#modalupdateAlamat" class="btn btn-warning btn-sm btn-flat float-left mr-2" ><i class="fas fa-save"></i> Update Data Alamat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

