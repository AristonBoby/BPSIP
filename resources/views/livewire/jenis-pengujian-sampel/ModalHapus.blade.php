<div wire:ignore.self class="modal fade" id="modalHapus" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h6 class="modal-title" id="staticBackdropLabel"><b>PENGAJUAN PENGHAPUSAN</b></h6>
            <div wire:loading>
                <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" wire:loading.remove>
            <span style="font-family: Sans-serif;" class="text-danger">Apakah Anda Ingin Mengajukan Penghapusan Data Analisa?</span>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-sm text-sm" wire:click="delete()"><i class=" fas fas fa-light fa-trash-alt text-xs"></i> Ajukan Penghapusan</button>
            <button type="button" class="btn btn-default btn-sm text-sm " data-dismiss="modal"><span class="text-xs fa fa-times"></span> Batal</button>
        </div>
        </form>
        </div>
    </div>
</div>
