<div wire:ignore.self class="modal fade" id="modalView" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h6 class="modal-title" id="staticBackdropLabel"><b>VIEW ITEM</b></h6>
            <div wire:loading>
                <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form  class="form-horizontal" wire:submit.prevent='update()'>
            <div class="col-md-12">

            </div>
        <div class="modal-body" wire:loading.remove>
            <div class="row">
                <table class="table table-hover table-sm table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Item Pemeriksaan</th>
                            <th>HARGA</th>
                            <th>USER</th>
                            <th>TGL PEMBUATAN</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($modalItem)
                            @forelse ($modalItem as $no=>$data )
                                <tr>
                                    <td>{{ 1+$no }}.</td>
                                    <td>{{ $data->itemPemeriksaan }}</td>
                                    <td><b>{{ formatRupiah($data->harga) }}</b></td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td><a class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            @empty

                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info btn-sm text-sm "><i class=" fas fa-eye text-xs"></i> Edit</button>
            <button type="button" class="btn btn-danger btn-sm text-sm " data-dismiss="modal"><span class="text-xs fa fa-times"></span> Batal</button>
        </div>
        </form>
        </div>
    </div>
</div>
