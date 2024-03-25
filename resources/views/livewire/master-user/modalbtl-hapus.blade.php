<div>
<div wire:ignore.self class="modal fade" id="modalBtlHapus" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog bg-warning" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-load text-lg"></i> KEMBALIKAN USER</b></h6>
            </div>
            <form wire:submit="updateUser">
                <div class="col-sm-12 mt-4">
                    <div class="form-group row">
                        <label class="form-label col-md-4">Rule User</label>
                        <div class="col-md-8">
                            <select wire:model="roleType" class="form-control form-control-sm ">
                                <option value="">-- Pilih Salah Satu --</option>
                                <option value="2">-- Admin --</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" type="submit" class="btn btn-danger btn-sm text-sm" ><i class=" fas fas fa-light fa-trash-alt text-xs"></i> Hapus</button>
                    <button type="button" class="btn btn-default btn-sm text-sm " data-dismiss="modal"><span class="text-xs fa fa-times"></span> Batal</button>
                </div>
            </form>
    </div>
</div>
</div>

