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
                            @if($data->status == 1 )
                            <span class="text-center badge bg-info">   Sampel telah di terima</span>
                        @elseif($data->status == 2)
                            <span class="text-center badge bg-warning">Sampel belum di terima</span>
                        @elseif($data->status == 3)
                            <span class="text-center badge bg-primary">Sampel sedang dalam Proses Pemeriksaan</span>
                        @elseif($data->status == 4)
                            <span class="text-center badge bg-success">Sampel selesai diperiksa</span>
                        @endif
                        </b>
                        <h5  class="float-right"> <b>TOTAL {{ formatRupiah($data->itemAnalisa->sum('harga')) }}</b></h5>
                    </div>
                    <div class="col-md-12">
                        <h5><b>No.SPK : {{$data->no_spk}}</b></h5>
                    </div>
                </div>
                <div class="col-lg-12 row">
                    <div class="col-lg-6 mt-3">
                        <div class="form-group col-lg-12 row" style="margin-bottom:-4px;">
                            <label class="control-label col-lg-2">Nama</label>
                            <label class="control-label col-lg-1">:</label>
                            <div class="col-lg-9">
                                <label class="control=label">{{ $data->dataUser->name}}</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 row" style="margin-bottom:-4px;">
                            <label class="control-label col-lg-2">No. Tlpn</label>
                            <label class="control-label col-lg-1">:</label>
                            <div class="col-lg-9">
                                <label class="control=label">{{ $data->dataUser->userPemohons->no_tlpn}}</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 row" style="margin-bottom:-4px;">
                            <label class="control-label col-lg-2">Email</label>
                            <label class="control-label col-lg-1">:</label>
                            <div class="col-lg-9">
                                <label class="control=label">{{ $data->dataUser->email}}</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 row"  style="margin-bottom:-5px;">
                            <label class="control-label col-lg-2">Alamat</label>
                            <label class="control-label col-lg-1">:</label>
                            <div class="col-lg-9">
                                <label class="control=label">
                                    {{ $data->dataUser->userPemohons->alamat}},
                                    {{ $data->dataUser->userPemohons->kelurahan->namaKelurahan}},
                                    {{ $data->dataUser->userPemohons->kelurahan->kecamatan->namaKecamatan}},
                                    {{ $data->dataUser->userPemohons->kelurahan->kecamatan->kota->namaKota}},
                                    {{ $data->dataUser->userPemohons->kelurahan->kecamatan->kota->provinsi->namaProvinsi}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group col-lg-12 row">
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Jumlah Contoh</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{ $data->jumContoh }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Berat Contoh</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{ $data->beratContoh }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Kondisi Contoh</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{ $data->kondisiContoh }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Jenis Kemasan</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{ $data->jenisKemasan }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Bentuk Contoh</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{ $data->bentukContoh }}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 row">
                                <label class="control-label col-lg-7">Jenis Kemasan</label>
                                <label class="control-label col-lg-1">:</label>
                                <div class="col-lg-4">
                                    <label>{{ $data->jenisKemasan }}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-12 mt-4">
                    <table class="table-hover table-sm table-bordered border-0 table mt-2">
                        <thead>
                            <tr class="text-center text-sm">
                                <th width=250>KODE CONTOH (CUSTOMER)</th>
                                <th>KODE LAB</th>
                                <th>PAREMETER UJI</th>
                                <th>ITEM PENGUJIAN</th>
                                <th>BIAYA</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->itemAnalisa as $item )
                                <tr>
                                    <td>{{ $item->kodeSampel }}</td>
                                    <td>{{ $item->kodeLab }}</td>
                                    <td>{{ $item->analisaSampel->jenis_analisa }}</td>
                                    <td>
                                        <table class="table table-sm">
                                            <tbody>
                                            @foreach ( $item->transaksiAnalisa as $jenisPem )
                                             <tr>
                                                <td style="border:0px;" width=70%>{{ $jenisPem->tblJenisPemeriksaan->itemPemeriksaan }}</td>
                                                <td style="border:0px;"><b>{{ formatRupiah($jenisPem->tblJenisPemeriksaan->harga) }}</b></td>
                                             </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                       <b> {{ formatRupiah($item->harga) }}</b>
                                    </td>
                                    <td>{{ $item->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan=4 class="text-right"><b>TOTAL</b></td>
                                <td colspan=2 class="text-left"><b>{{ formatRupiah($data->itemAnalisa->sum('harga')) }}</b></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @empty
                <td>ss</td>
            @endforelse
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm text-sm"><i class="fa fa-trash"></i> Hapus Permintaan</button>
            <a type="button" href="dd" target="_blank"class="btn btn-sm btn-primary"><span class="text-xs fa fa-print"></span> Print Permohonan</a>
            <button type="button" wire:click='close' class="btn btn-default btn-sm text-sm" data-dismiss="modal"><span class="text-xs fa fa-times"></span> Tutup</button>
        </div>
    </div>
</div>

