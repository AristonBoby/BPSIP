<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title"><b>Tabel</b> Jenis Analisa Sampel  <span wire:loading class="badge bg-success text-xs"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading... </span></h5>
    </div>
    <div class="card-body ">
        <div class="col-lg-4 float-right mb-3 ">      
            <div class="input-group col-md-12 input-group float-right mb-1">
                <select wire:model.live="filter" class="col-md-3 form-control">
                    <option value='0'>Aktif</option>
                    <option value='1'>Dihapus</option>
                </select>
                <input type="text"  wire:model.live="cari" name="table_search" class="form-control float-right" placeholder="Pencarian">
                <div class="input-group-append">
                    <button wire:click='cariData()'type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-sm table-sm table-hover text-center table-striped p-0">
                <thead class="text-uppercase">
                    <tr>
                        <th>No.</th>
                        <th>Jenis Analisa</th>
                        <th>Kategori Analisa</th>
                        <th>TGL PEMBUATAN</th>
                        <th>USER PEMBUATAN</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">*</th>
                    </tr>
                </thead>
                <tr wire:loading>
                        <td>Loading... </td>
                    </tr>
                <tbody wire:loading.remove>
                
                @forelse($data as $no=>$query)
                    <tr>
                        <td>{{ $data->firstItem() + $no }}. </td>
                        <td>{{ $query->jenis_pengujian }}</td>
                        <td>{{ $query->jenis_analisa }}</td>
                        <td>{{ $query->created_at }}</td>
                        <td>{{$query->name}}</td>
                        <td class="text-center"><label class="badge bg-success">Aktif</label></td>
                        <td class="text-center">
                            @if($filter == 0)
                                <a data-toggle="modal" data-target="#modalEdit" class="btn btn-primary btn-sm" wire:click="getData('{{$query->id}}')">Edit</a>
                                <a data-toggle="modal" data-target="#modalHapus" class="btn btn-danger btn-sm" wire:click="getData('{{$query->id}}')">Hapus</a>
                            @elseif($filter==1)
                                <a data-toggle="modal" data-target="#modalBatalHapus" class="btn btn-success btn-sm" wire:click="getData('{{$query->id}}')"><i class="fa fa-undo" aria-hidden="true"></i> Batal Hapus</a>
                                <a data-toggle="modal" data-target="#modalHapus" class="btn btn-danger btn-sm" wire:click="getData('{{$query->id}}')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus Permanen</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">DATA TIDAK DITEMUKAN</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mt-3 float-right">
            <span class="text-sm float-left">Showing {{$data->currentPage()}} - {{$data->lastPage()}} of {{$data->total()}} </span>
            <div class="float-right">
                {{$data->links()}}
            </div>
        </div>
    </div>
        @include('livewire.analisa-sampel.modalEdit')
        @include('livewire.analisa-sampel.modalHapus')
        @include('livewire.analisa-sampel.modalBtlHapus')

    </div>
</div>
</div>
