<div wire:ignore.self class="modal fade" id="modalPassword" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-address-card" aria-hidden="true"></i> Perbarui Password User </b></h6>
                    <button type="button btn-default" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times text-white"></i></span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <form wire:submit="passwordUpdate">
                        <div class="col-md-12 text-center mb-4">
                            <b><span class="text-center m-4">PERBARUI PASSWORD</span></b>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-3 text-sm form-label">Password </label>
                                <div class="col-md-9">
                                    <input type="password" wire:model='password' class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password') <span class="text-red text-sm">{{ $message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 text-sm form-label">Re Password</label>
                                <div class="col-md-9">
                                    <input type="password" wire:model='rePassword' class="form-control @error('password') is-invalid @enderror" placeholder="Re-Password">
                                    @error('rePassword') <span class="text-red text-sm">{{ $message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="col-md-12">
                                    <div class="col-md-12 float-left">
                                    <button type="button" class=" float-right btn btn-sm btn-default" class="close" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                                        <button type="submit" class=" float-right btn btn-sm btn-success mr-1"><i class="fas fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

