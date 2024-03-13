<div wire:ignore.self class="modal fade" id="modalStatus" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
            <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-flask" aria-hidden="true"></i> Status Sampel </b></h6>
            <div wire:loading>
                <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>

        </div>
        <div class="modal-body row" wire:loading.hide>
            <form class="form-horizontal col-md-12" wire:submit='updatePemerikasaan'>
                <div class="form-group col-md-12 col-sm-12 col-lg-12 row">
                    <label class="control-label col-md-5 text-sm">Update Status Pemeriksaan</label>
                    <div class="col-md-7">
                        <select class="form-control form-control-sm">
                            <option value="2">Sampel Belum di Terima</option>
                            <option value="1">Sampel telah di Terima</option>
                            <option value="3">Sampel sedang dalam Proses Pemeriksaan</option>
                            <option value="3">Sampel selesai diperiksa</option>
                        </select>
                    </div>
                </div>
                <div class="float-right">
                    <button class="btn btn-primary btn-sm float-left mr-1">Update</button>
                    <a data-dismiss="modal" class="btn btn-default btn-sm float-left"><i class="fa fa-times"></i> Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

