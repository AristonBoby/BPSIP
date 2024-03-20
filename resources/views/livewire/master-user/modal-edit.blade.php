<div wire:ignore.self class="modal fade" id="modaledit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-address-card" aria-hidden="true"></i> Detail </b></h6>
                    <div wire:loading>
                        <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
                    </div>
                    <button type="button btn-default text-white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
            </div>
        <div class="modal-body row" wire:loading.hide>
         
        </div>
        <div class="modal-footer">
            <a  data-target="#modalStatus" data-toggle="modal" class="btn btn-warning btn-sm text-sm"><i class="fa fa-edit"></i> Status Pemeriksaan</a>
            <a  data-toggle="modal" data-target="#modalDelete" wire:click="deleteId('{{$data->id}}')" class="btn btn-danger btn-sm text-sm"><i class="fa fa-trash"></i> Hapus Permintaan</a>
            <a type="button" href="print/permohonan/{{ $data->id }}" target="_blank"class="btn btn-sm btn-primary"><span class="text-xs fa fa-print"></span> Print Permohonan</a>
            <button type="button" wire:click='close' class="btn btn-default btn-sm text-sm" data-dismiss="modal"><span class="text-xs fa fa-times"></span> Tutup</button>
        </div>
    </div>
</div>

