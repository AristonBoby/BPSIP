<div wire:ignore.self class="modal fade" id="modalPassword" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-address-card" aria-hidden="true"></i> Update Alamat User </b></h6>
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
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 text-sm form-label">Re Password</label>
                                <div class="col-md-9">
                                    <input type="password" wire:model='rePassword' class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button class="form-control btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                    <button class="form-control btn-sm btn-default mt-2"><i class="fas fa-times"></i> Batal</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

