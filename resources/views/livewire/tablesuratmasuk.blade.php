    <div class="col-md-12 col-sm-12 col-lg-8">
        <div class="card">
            <div class="card-default">
                <div class="card-header">
                    <h5 class="card-title"> DOKUMEN</h5>
                    <div wire:loading>
                        <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
                        </div>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <span class="input-group-append">
                                <span type="button" class="form-control rounded-0 form-control-sm "><i class="text-xs fa fa-calendar" aria-hidden="true"></i></span>
                            </span>
                            <input type="date" class="form-control rounded-0">
                                <span class="input-group-append">
                                    <button wire:click='refresh' type="button" class="btn btn-primary"><i class="text-xs fa fa-sync-alt" aria-hidden="true"></i> REFRESH</button>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover table-stripped" style="text-transform: uppercase;">
                        <thead class="text-sm">
                            <tr>
                                <th class="text-center">NO.</th>
                                <th class="text-center">ASAL Surat</th>
                                <th class="text-center">NOMOR DOKUMEN</th>
                                <th class="text-center">TGL. DOKUMEN</th>
                                <th class="text-center">KETERANGAN</th>
                                <th class="text-center">*</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm uppercase"  wire:loading.remove>
                            @forelse($data as $no=>$query)
                                <tr>
                                    <td width="10" class="text-center">{{ $data->firstItem() + $no }}.</td>
                                    <td width="200" class="text-center">{{ $query->asal_surat }}</td>
                                    <td width="200" class="text-center">{{ $query->nomor_surat }}</td>
                                    <td width="100"class="text-center">{{ $query->tanggal }}</td>
                                    <td width='200' class="text-center">{{ $query->perihal }}</td>
                                    <td class="text-center" width="150">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                        <a target='_blank' class="btn btn-primary btn-sm"href="/viewedokumen/{{ $query->id }}"><i class="fa fa-eye"></i></a>
                                        <a data-toggle="modal" wire:click="confirmDelete('{{$query->id}}')" data-target="#deleteModal" class="btn btn-danger btn-sm"><i class="ion-trash-a"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">DOKUMEN TIDAK DITEMUKAN</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div wire:ignore class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Hapus dokumen </h5>
                        </div>
                        <div class="modal-body">
                            Apakah anda ingin menghapus dokumen ?
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default btn-sm" data-dismiss="modal"><i class="ion-close"></i> Batal</button>
                            <button wire:click='hapus' data-dismiss="modal"class="btn btn-danger btn-sm"><i class="ion-trash-a"></i> Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
