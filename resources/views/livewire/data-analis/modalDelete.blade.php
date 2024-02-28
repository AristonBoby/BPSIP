<div wire:ignore.self class="modal fade" id="modalDelete" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
            <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-trash" aria-hidden="true"></i> Hapus </b></h6>

        </div>
        <div class="modal-body">
            <b>Apakah anda ingin menghapus data ?</b>
        </div>

        <div class="modal-footer">
            <button type="button" wire:click='hapus' class="btn btn-danger btn-sm text-sm" data-dismiss="modal"> Hapus</button>
            <button type="button" wire:click='close' class="btn btn-default btn-sm text-sm" data-dismiss="modal">Batal</button>
        </div>
    </div>
</div>
</div>

