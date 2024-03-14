<div>
   <div class="card">
        <div class="card-header row">
            <form wire:submit='pencarian()' class="form-horizontal row col-md-12">
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="text-uppercase col-md-4 col-lg-4 col-sm-4 text-sm ">Tanggal</label>
                        <div class="input-group col-md-8">
                            <input type="date" wire:model='tgl' class=" form-control " placeholder="dd-mm-yyyy" >
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group row">
                        <label class=" col-md-3 col-form-label text-sm">Pencarian</label>
                        <div class="col-md-8">
                            <input type="text" wire:model='cari' class="form-control float-right form-control-sm" placeholder="Pencarian">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group col-md-12 row float-right">
                        <button type="submit"class="btn btn-sm  btn-primary"><i class="fa fa-search"></i> Cari</button>
                        <a type="button" style="margin-left:10px;" wire:click='resetPencarian()' class="btn btn-sm  btn-danger"><i class="fa fa-times"></i> Reset</a>
                    </div>
                </div>
                <div class="col-md-3" wire:loading>
                    Loading...
                </div>
            </form>
        </div>
        <div class="card-body row">
            <table class="table table-striped table-sm table-bordered p-0 table-hover">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>No. SPK</th>
                        <th>Nama Pengirim</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Jenis Pengujian Sampel</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Pendaftaran</th>
                        <th>Status</th>
                        <th>*</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($query as $no=>$data )
                    <tr>
                        <td class="text-center">{{ $query->firstItem()+$no }}</td>
                        <td width="150">{{ $data->no_spk }}</td>
                        <td class="">{{ $data->dataUser->name }}</td>
                        <td class="text-center">{{ $data->dataUser->userPemohons->no_tlpn }}</td>
                        <td width="400">{{ $data->dataUser->userPemohons->alamat }} ,
                                        {{ $data->dataUser->userPemohons->kelurahan->namaKelurahan }},
                                        {{ $data->dataUser->userPemohons->kelurahan->kecamatan->namaKecamatan }},
                                        {{ $data->dataUser->userPemohons->kelurahan->kecamatan->kota->namaKota }},
                                        {{ $data->dataUser->userPemohons->kelurahan->kecamatan->kota->provinsi->namaProvinsi }}
                        </td>
                        <td class="text-center">
                            <ul>
                                @foreach ( $data->itemAnalisa as $item )
                                    <li>{{ $item->analisaSampel->jenis_analisa }} {{ formatRupiah($item->harga) }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <b>{{ formatRupiah($data->itemAnalisa->sum('harga')) }}</b>
                       </td>
                        <td class="text-center">{{Carbon\Carbon::parse($data->tanggal)->format('d-m-Y')}}</td>
                        <td class="text-center text-md">
                            @if($data->status_daftar == 1 )
                                <span class="text-center badge bg-success">Online</span>
                             @elseif( $data->status_daftar == 2)
                                <span class="text-center badge bg-warning">Offline</span>
                            @endif
                        </td>
                        <td class="text-center text-md" width="50">
                            @if($data->status == 1 )
                                <span class="text-center badge bg-info">   Sampel telah di terima</span>
                            @elseif($data->status == 2)
                                <span class="text-center badge bg-warning">Sampel belum di terima</span>
                            @elseif($data->status == 3)
                                <span class="text-center badge bg-primary">Sampel sedang dalam Proses Pemeriksaan</span>
                            @elseif($data->status == 4)
                                <span class="text-center badge bg-success">Sampel selesai diperiksa</span>
                            @elseif($data->status == 5)
                            <span class="text-center badge bg-danger">Sampel ditolak</span>
                            @endif
                        </td>
                        <td>
                            <a data-toggle="modal" wire:click="itemAnalisaModal('{{$data->id}}')" class="btn btn-sm btn-primary" data-target="#modalDetail" ><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="11" class="text-center">Data tidak ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>

                </tfoot>
            </table>
            <div class="col-md-12 mt-3 float-right">
                <span class="text-sm float-left">Showing {{$query->currentPage()}} - {{$query->lastPage()}} of {{$query->total()}} Record</span>
                <div class="float-right">
                    {{$query->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.data-analis.modalDetail')
</div>
    @include('livewire.data-analis.modalDelete')
    @include('livewire.data-analis.modalStatus')
</div>
</div>

<script>
    window.addEventListener('alert', event => {
        $('#modalEdit').modal('hide');
        $('#modalHapus').modal('hide');

        Swal.fire({
            text: event.detail.text,
            title: event.detail.title,
            icon: event.detail.icon,
            showConfirmButton: false,
            timer: event.detail.timer,
            buttons: false,
        });
    });
</script>
