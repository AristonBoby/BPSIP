<div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Tabel</b> Jenis Pengujian Sampel <span wire:loading class="badge bg-success text-xs"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span></h5>
        </div>
        <div class="card-body table-responsive">
            <div class="col-lg-12">
            <div class="input-group col-md-3 input-group float-right mb-1">
                    <select wire:model.live="filter">
                        <option value=0>Sumua Data</option>
                        <option value=1>Dihapus</option>
                    </select>
                </div>
                <div class="input-group col-md-3 input-group float-right mb-1">
                    <input type="text" wire:model='cari' class="form-control float-right" placeholder="Pencarian">
                    <div class="input-group-append">
                        <button type="submit" wire:click='tblRefresh()' class="btn btn-primary">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </div>
            </div>

            <table class="table text-sm table-sm table-hover table-striped p-0">
                <thead class="text-uppercase">
                    <tr>
                        <th>No.</th>
                        <th>Jenis Pengujian Sampel</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">TGL Pembuatan</th>
                        <th class="text-center">*</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($query as $index=>$data)
                        <tr>
                            <td>{{$query->firstItem() + $index}}.</td>
                            <td>{{$data->jenis_pengujian}}</td>
                            <td class="text-center">@if($data->status=='1')<span class="badge bg-success">Aktif</span>@elseif($data->status=='0')<span class="badge bg-danger">Tidak Aktif</span> @endif</td>
                            <td class="text-center" >{{$data->created_at}}</td>
                            <td class="text-center">
                                @if($filter == 0)
                                    <a class="btn btn-sm btn-warning" wire:click="getData('{{$data->id}}')" data-toggle="modal" data-target="#modalEdit"><i class="text-xs fa fa-edit"></i> Edit</a>
                                    <a class="btn btn-sm bg-danger" wire:click="getData('{{$data->id}}')" data-toggle ="modal" data-target="#modalHapus"s><i class="fas fa-light fa-trash-alt text-xs"></i> Hapus</a>
                                @elseif($filter == 1)
                                <a class="btn btn-sm btn-success" wire:click="restoreDelete('{{$data->id}}')" data-toggle="modal" data-target="#modalEdit"><i class="fa fa-undo" aria-hidden="true"></i> Batal Hapus</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Tidak Ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="col-md-12 mt-3 float-right">
                <div class="float-right">
                    {{$query->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.jenis-pengujian-sampel.ModalEdit')
    @include('livewire.jenis-pengujian-sampel.ModalHapus')
</div>
