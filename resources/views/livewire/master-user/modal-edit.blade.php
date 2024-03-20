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
                    
                    <div class="form-group row">
                        <label class="form-label col-md-2"> Nama </label>
                        <div class="col-md-10">
                            <input type="text" wire:model="nama" class="form-control" placeholder="Masukan Nama Anda">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-md-2"> Email </label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" wire:model="email" placeholder="Masukan Email Anda">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-md-2"> No.Hp </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" wire:model="no_Hp" placeholder="Masukan Nomor Hp Anda">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-md-2"> Alamat </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" wire:model="alamat" placeholder="Masukan Nomor Hp Anda">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

