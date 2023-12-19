<div class="card">
    <div class="card-header">
        <label class="card-title">Table Jenis Analisa</label>
    </div>
    <div class="card-body">
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
                            <a data-toggle="modal" wire:click="detailItem('{{$data->analisa_sampel_id }}')" data-target="#modalView" class="btn btn-primary btn-sm"><span class="fa fa-edit"></span></a>
                            <a class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>

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
</div>

