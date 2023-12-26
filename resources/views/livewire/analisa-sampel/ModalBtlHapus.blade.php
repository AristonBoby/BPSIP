<div wire:ignore.self class="modal fade" id="modalBatalHapus" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><b>KONFIRMASI</b></h5>
                <div wire:loading>
                    <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
                </div>

            </div>
            <div class="modal-body">
                <span>Apakah anda ingin mengembalikan data yang telah di hapus?</span>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" wire:click="btlHapus()"><i class="fa fa-undo" aria-hidden="true"></i> Kembalikan</a>
                <a class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Batal</a>
            </div>
        <div>

    </div>
</div>


