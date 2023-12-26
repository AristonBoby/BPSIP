<div wire:ignore.self class="modal fade" id="modalEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
            <h6 class="modal-title" id="staticBackdropLabel"><b>EDIT ANALISA</b></h6>
            <div wire:loading>
                <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>

        </div>
        <form  class="form-horizontal" wire:submit.prevent='update()'>
        <div class="modal-body" wire:loading.remove>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label ">ID <i class="text-danger">*</i></label>
                        <div class="col-md-9">
                            <input type="text" wire:model="idView" class="form-control" id="recipient-name" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Jenis Analisa <i class="text-danger">*</i></label>
                        <div class="col-md-9">
                            <input type="text" wire:model="jenis" class="form-control  @error('jenis') is-invalid @enderror"  id="recipient-name">
                            @error('jenis') <span class=" text-red">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label ">Status <i class="text-danger">*</i></label>
                        <div class="col-md-9">
                        <select wire:model="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="">=== Pilih Salah Satu ===</option>
                            <option value=1>Aktif</option>
                            <option value=0>Tidak Aktif</option>
                        </select>
                        @error('status') <span class=" text-red">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info btn-sm text-sm "><i class=" fas fa-edit text-xs"></i> Edit</button>
            <button type="button" class="btn btn-danger btn-sm text-sm " data-dismiss="modal"><span class="text-xs fa fa-times"></span> Batal</button>
        </div>
        </form>
        </div>
    </div>
</div>
