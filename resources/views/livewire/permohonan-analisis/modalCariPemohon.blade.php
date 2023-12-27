<div wire:ignore.self class="modal fade" id="modalCariPemohon" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
            <h6 class="modal-title" id="staticBackdropLabel"><b>PENCARIAN DATA PEMOHON</b></h6>
            <div wire:loading>
                <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>

        </div>
        <form  class="form-horizontal" wire:submit.prevent='pencarianPemohon'>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label ">Pencarian <i class="text-danger">*</i></label>
                            <div class="col-md-9">
                                <input type="text" ="idView" class="form-control" id="recipient-name" placeholder="Pencarian Berdasarkan Nama dan No Telepon">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button>Cari</button>
                </div>
            </div>
        </form>
        <table class="table table-sm mb-3">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No Telepon</th>
                    <th>*</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a></td>
                </tr>
            </tbody>
        </table>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info btn-sm text-sm "><i class=" fas fa-edit text-xs"></i> Edit</button>
            <button type="button" class="btn btn-danger btn-sm text-sm " data-dismiss="modal"><span class="text-xs fa fa-times"></span> Batal</button>
        </div>
    </div>
</div>
