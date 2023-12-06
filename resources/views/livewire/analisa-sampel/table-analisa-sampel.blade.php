<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title"><b>Tabel</b> Jenis Analisa Sampel  <span wire:loading class="badge bg-success text-xs"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading... </span></h5>
       
    </div>
    <div class="card-body table-responsive">
        <div class="col-lg-12">
            <div class="input-group col-md-3 input-group float-right mb-1">
                <input type="text"  wire:model="cari" name="table_search" class="form-control float-right" placeholder="Pencarian">
                <div class="input-group-append">
                    <button wire:click='cariData()'type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </div>
        </div>
        <table class="table text-sm table-sm table-hover text-center table-striped p-0">
            <thead class="text-uppercase">
                <tr>
                    <th>No.</th>
                    <th>Kategori Pengujian</th>
                    <th>Jenis Analisa Sampel</th>
                    <th>TGL PEMBUATAN</th>
                    <th>USER PEMBUATAN</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">*</th>
                </tr>
            </thead>
            <tbody>
            @forelse($data as $no=>$query)
                <tr>
                    <td>{{ $data->firstItem() + $no }}. </td>
                    <td>{{ $query->jenis_pengujian }}</td>
                    <td>{{ $query->jenis_analisa }}</td>
                    <td>{{ $query->created_at }} / {{$query->name}}</td>
                    <td class="text-center"><label class="badge bg-success">Aktif</label></td>
                    <td class="text-center">
                        <a data-toggle="modal" data-target="#modalEdit" class="btn btn-primary btn-sm" wire:click="getData('{{$query->id}}')">Edit</a>
                        <a data-toggle="modal" data-target="#modalHapus" class="btn btn-danger btn-sm"  wire:click="getData('{{$query->id}}')">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">DATA TIDAK DITEMUKAN</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="col-md-12 mt-3 float-right">
            <span class="text-sm float-left">Showing {{$data->currentPage()}} - {{$data->lastPage()}} of {{$data->total()}} </span>
            <div class="float-right">
                {{$data->links()}}
            </div>
        </div>
    </div>
        @include('livewire.analisa-sampel.modalEdit')
        @include('livewire.analisa-sampel.modalHapus')
    </div>

</div>
