<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title"> <b>Table</b> Jenis Analisa</h5>
    </div>
    <div class="card-body">
    <div class="col-12 mb-4">
                <div class="callout callout-warning">
                    <h5>
                        <i class="fas fa-info"></i>
                        CATATAN :
                    </h5>
                   Jika ada pembaruan / perubahan terkait item pemeriksaan / harga dapat menghapus daftar harga yang ingin ubah
                </div>
            </div>
        <div class="col-md-12 col-sm-12 col-lg-12 mb-4">
            <a wire:click='perbarui()' class="btn btn-sm mb-4 btn-primary float-right btn-flat"><i class="fas fas-refresh"></i>Perbarui</a>
        </div>
        <table class="table text-sm table-sm table-hover table-striped p-0 mb-3">
            <thead>
            <tr>
                <th>NO.</th>
                <th>JENIS ANALISA</th>
                <th width="">JENIS PEMERIKSAAN</th>
                <th width="">ITEM PEMERIKSAAN</th>
                <th width="">HARGA</th>
            </tr>
            </thead>
            <tbody>
                <tr wire:loading>
                    <td>Loading...</td>
                </tr>
                @foreach ($query as $no=>$data)
                    <tr>
                        <td>{{ $query->firstItem() + $no }}. </td>
                        <td>{{ $data->jenis_pengujian }}</td>
                        <td>{{ $data->jenis_analisa }}</td>
                        <td>{{ $data->jenis }}</td>
                        <td ><b><span id="amount">{{ formatRupiah($data->harga) }}</span></b> </td>
                        <td>
                            <a data-toggle="modal" wire:click='' data-target="#modalView" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-md-12 mt-3 float-right">
            <span class="text-sm float-left">Showing {{$query->currentPage()}} - {{$query->lastPage()}} of {{$query->total()}} </span>
            <div class="float-right">
                {{$query->links()}}
            </div>
        </div>
    </div>
    @include('livewire.jenis-pemeriksaan.modalView')
    @include('livewire.jenis-pemeriksaan.modalDelete')
</div>

