<div wire:ignore.self class="modal fade" id="modalDetail" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
            <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-address-card" aria-hidden="true"></i> Detail </b></h6>
            <div wire:loading>
                <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>

        </div>
        <div class="modal-body row" wire:loading.hide>
            @forelse ( $detailModal as $data )
                <div class="col-lg-12 mb-2">
                    <div class="col-md-12 mb-1">
                        <b>Status :
                            @if($data->tblpermintaan->status == 1 )
                            <span class="text-center badge bg-info">   Sampel telah di terima</span>
                        @elseif($data->tblpermintaan->status == 2)
                            <span class="text-center badge bg-warning">Sampel belum di terima</span>
                        @elseif($data->tblpermintaan->status == 3)
                            <span class="text-center badge bg-primary">Sampel sedang dalam Proses Pemeriksaan</span>
                        @elseif($data->tblpermintaan->status == 4)
                            <span class="text-center badge bg-success">Sampel selesai diperiksa</span>
                        @endif
                        </b>
                        <h5  class="float-right"> <b>TOTAL {{ formatRupiah($data->harga) }}</b></h5>
                    </div>
                    <div class="col-md-12">
                        <h5><b>No.SPK : {{$data->tblpermintaan->no_spk}}</b></h5>
                    </div>
                </div>
                <div class="col-lg-12 row">
                    <div class="col-lg-4 mt-3">
                        <div class="form-group col-lg-12 row" style="margin-bottom:-4px;">
                            <label class="control-label col-lg-2">Nama</label>
                            <label class="control-label col-lg-1">:</label>
                            <div class="col-lg-9">
                                <label class="control=label">{{ $data->tblpermintaan->dataUser->name}}</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 row" style="margin-bottom:-4px;">
                            <label class="control-label col-lg-2">No. Tlpn</label>
                            <label class="control-label col-lg-1">:</label>
                            <div class="col-lg-9">
                                <label class="control=label">{{ $data->tblpermintaan->dataUser->userPemohons->no_tlpn}}</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 row" style="margin-bottom:-4px;">
                            <label class="control-label col-lg-2">Email</label>
                            <label class="control-label col-lg-1">:</label>
                            <div class="col-lg-9">
                                <label class="control=label">{{ $data->tblpermintaan->dataUser->email}}</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 row"  style="margin-bottom:-5px;">
                            <label class="control-label col-lg-2">Alamat</label>
                            <label class="control-label col-lg-1">:</label>
                            <div class="col-lg-9">
                                <label class="control=label">
                                    {{ $data->tblpermintaan->dataUser->userPemohons->alamat}},
                                    {{ $data->tblpermintaan->dataUser->userPemohons->kelurahan->namaKelurahan}},
                                    {{ $data->tblpermintaan->dataUser->userPemohons->kelurahan->kecamatan->namaKecamatan}},
                                    {{ $data->tblpermintaan->dataUser->userPemohons->kelurahan->kecamatan->kota->namaKota}},
                                    {{ $data->tblpermintaan->dataUser->userPemohons->kelurahan->kecamatan->kota->provinsi->namaProvinsi}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group col-lg-12 row">
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Jumlah Contoh</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{ $data->tblpermintaan->jumContoh }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Berat Contoh</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{ $data->tblpermintaan->beratContoh }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Kondisi Contoh</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{ $data->tblpermintaan->kondisiContoh }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Jenis Contoh</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{ $data->tblpermintaan->jenisContoh }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Bentuk Contoh</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{ $data->tblpermintaan->jenisContoh }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Jenis Kemasan</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{ $data->tblpermintaan->jenisContoh }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group col-lg-12 row">
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Jenis Pengujian Sampel</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{$data->analisaSampel->jenisPengujianSampel->jenis_pengujian}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <table class="table-hover table-bordered border-0 table mt-2">
                        <thead>
                            <tr class="text-center text-sm">
                                <th width=250>KODE CONTOH (CUSTOMER)</th>
                                <th>KODE LAB</th>
                                <th>PAREMETER UJI</th>
                                <th>ITEM PENGUJIAN</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $data->kodeSampel}}</td>
                                <td class="text-center">{{ $data->kodeLab}}</td>
                                <td class="text-center">{{ $data->analisaSampel->jenis_analisa}}</td>
                                <td>
                                    <ul>
                                        @foreach ( $data->transaksiAnalisa as $da )
                                            <li>{{ $da->tblJenisPemeriksaan->itemPemeriksaan }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    {{ $data->keterangan }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @empty
                <td>ss</td>
            @endforelse
        </div>
        <div class="modal-footer">
            <button type="button" wire:click='close' class="btn btn-danger btn-sm text-sm" data-dismiss="modal"><span class="text-xs fa fa-times"></span> Tutup</button>
        </div>
    </div>
</div>

