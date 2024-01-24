<div>
   <div class="card">
        <div class="card-body row">
            <div class="col-md-3 mb-3">
                <div class="form-group row">
                    <label class=" col-md-3 col-form-label text-sm">Tanggal</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control float-right mb-3 form-control-sm" placeholder="Pencarian">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="form-group row">
                    <label class=" col-md-3 col-form-label text-sm">Jenis Pengujian</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control float-right mb-3 form-control-sm" placeholder="Pencarian">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="form-group row">
                    <label class=" col-md-3 col-form-label text-sm">Pencarian</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control float-right mb-3 form-control-sm" placeholder="Pencarian">
                    </div>
                </div>
            </div>
            <table class="table table-striped table-sm table-bordered p-0 table-hover">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>No. SPK</th>
                        <th>Nama Pengirim</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Jenis Pengujian Sampel</th>
                        <th>Jenis Pemeriksaan Sampel</th>
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
                        <td class="text-center">{{ $data->tblpermintaan->no_spk }}</td>
                        <td class="text-center">{{ $data->tblpermintaan->dataUser->name }}</td>
                        <td class="text-center">{{ $data->tblpermintaan->dataUser->userPemohons->no_tlpn }}</td>
                        <td class="text-center">{{ $data->tblpermintaan->dataUser->userPemohons->alamat }}</td>
                        <td class="text-center">{{ $data->analisaSampel->jenis_analisa }}
                        </td>
                        <td class="text-center">
                            @foreach ( $data->transaksiAnalisa as $da)
                                <ul>
                                    @foreach ($da->tblJenisPemeriksaan as $jenisPemeriksaan)
                                            <li style="margin-bottom:-20px;"> {{ $jenisPemeriksaan->itemPemeriksaan }} : {{ formatRupiah($jenisPemeriksaan->harga) }}</li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </td>
                        <td class="text-center">{{ $data->tblpermintaan->tanggal }}</td>
                        <td class="text-center text-md">
                            @if($data->tblpermintaan->status_daftar == 1 )
                                <span class="text-center badge bg-success">Online</span>
                            @elseif( $data->tblpermintaan->status_daftar == 2)
                                <span class="text-center badge bg-warning">Offline</span>
                            @endif
                        </td>
                        <td class="text-center text-md">
                            @if($data->tblpermintaan->status == 1 )
                                <span class="text-center badge bg-info">Sampel telah di terima petugas pendaftaran</span>
                            @elseif($data->tblpermintaan->status == 2)
                                <span class="text-center badge bg-warning">Sampel belum di terima</span>
                            @elseif($data->tblpermintaan->status == 3)
                                <span class="text-center badge bg-primary">Sampel sedang dalam Proses Pemeriksaan</span>
                            @elseif($data->tblpermintaan->status == 4)
                                <span class="text-center badge bg-success">Sampel selesai diperiksa</span>
                            @endif
                        </td>
                        <td>
                            <a data-toggle="modal" wire:click='itemAnalisaModal("{{ $data->permintaan_analisas_id }}")' class="btn btn-sm btn-info" data-target="#modalDetail" ><i class="fa fa-eye"></i></a>
                            <a data-toggle="modal" wire:click='itemAnalisaModal("{{ $data->permintaan_analisas_id }}")' class="btn btn-sm btn-warning" data-target="#modalKonn" ><i class="fa fa-eye"></i> Approve</a>
                            <a data-toggle="modal" class="btn btn-sm btn-danger" data-target="#modalDelete" ><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
                    @empty

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <
    @include('livewire.data-analis.modalDetail')
    @include('livewire.data-analis.modalKonf')
    @include('livewire.data-analis.modalDel')
</div>
