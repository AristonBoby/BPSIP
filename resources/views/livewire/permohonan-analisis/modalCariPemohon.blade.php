<div wire:ignore.self class="modal fade" id="modalCariPemohon" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
            <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-address-card" aria-hidden="true"></i> PENCARIAN DATA PEMOHON</b></h6>
            <div wire:loading>
                <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>

        </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label ">Pencarian <i class="text-danger">*</i></label>
                            <div class="col-md-9">
                                <input type="text" ="idView" wire:model.live='cari' class="form-control" id="recipient-name" placeholder="Pencarian Berdasarkan Nama dan No Telepon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                @forelse($cariUser as $key => $data)
                <tr>
                        <td>{{ $cariUser->firstItem() + $key}}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->userPemohon->no_tlpn ?? '' }}</td>
                        <td><a class="btn btn-primary btn-xs" data-dismiss="modal" wire:click="selectUser('{{ $data->id }}')"><i class="fa fa-plus"></i></a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">DATA TIDAK DITEMUKAN</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm text-sm" wire:click='batal' data-dismiss="modal"><span class="text-xs fa fa-times"></span> Tutup</button>
        </div>
    </div>
</div>
