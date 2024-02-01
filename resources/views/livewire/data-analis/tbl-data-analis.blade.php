<div>
   <div class="card">
        <div class="card-header row">
            <form wire:submit='pencarian()' class="form-horizontal row col-md-12">
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="text-uppercase col-md-4 col-lg-4 col-sm-4 text-sm ">Tanggal</label>
                        <div class="input-group col-md-8">
                            <input type="date" wire:model='tanggal' class=" form-control " placeholder="dd-mm-yyyy" >
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="form-group row">
                        <label class=" col-md-4 col-form-label text-sm">Jenis Pengujian</label>
                        <div class="col-md-8">
                            <select type="text" wire:model='jenis_analisa' class="form-control float-right form-control-sm">
                                <option value="" selected>--Pilih Salah Satu --</option>
                                @foreach ($itemjenisAnalisa as $value)
                                    <option value="{{ $value->id }}">{{ $value->jenis_analisa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class=" col-md-4 col-form-label text-sm">Pencarian</label>
                        <div class="col-md-8">
                            <input type="text" wire:model='cari' class="form-control float-right form-control-sm" placeholder="Pencarian">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group col-md-12 row">
                        <button type="submit"class="btn btn-sm  btn-primary"><i class="fa fa-search"></i> Cari</button>
                        <a type="button" style="margin-left:10px;" wire:click='resetPencarian()' class="btn btn-sm  btn-danger"><i class="fa fa-times"></i> Reset</a>
                    </div>
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
                        <th>Jenis Pemeriksaan Sampel</th>
                        <th>Tanggal</th>
                        <th>Pendaftaran</th>
                        <th>Status</th>
                        <th>*</th>
                    </tr>
                </thead>
                <tbody>
                    <tr wire:loading>
                        <td>Loading...</td>
                    </tr>
                    @forelse ($query as $no=>$data )
                    <tr wire:loading.remove>
                        <td class="text-center">{{ $query->firstItem()+$no }}</td>
                        <td class="text-center">{{ $data->id }}</td>
                        <td width="150">{{ $data->tblpermintaan->no_spk }}</td>
                        <td class="">{{ $data->tblpermintaan->dataUser->name }}</td>
                        <td class="text-center">{{ $data->tblpermintaan->dataUser->userPemohons->no_tlpn }}</td>
                        <td width="200">
                            {{ $data->tblpermintaan->dataUser->userPemohons->alamat }}, Kel/Desa
                            {{ $data->tblpermintaan->dataUser->userPemohons->kelurahan->namaKelurahan }}, Kecamatan
                            {{ $data->tblpermintaan->dataUser->userPemohons->kelurahan->kecamatan->namaKecamatan }},
                            {{ $data->tblpermintaan->dataUser->userPemohons->kelurahan->kecamatan->kota->namaKota }}, Provinsi
                            {{ $data->tblpermintaan->dataUser->userPemohons->kelurahan->kecamatan->kota->provinsi->namaProvinsi }}

                        </td>
                        <td class="text-center">{{ $data->analisaSampel->jenis_analisa }}
                        </td>
                        <td class="text-left" width="400">
                            @foreach ( $data->transaksiAnalisa as $da)
                                <ul>
                                    @foreach ($da->tblJenisPemeriksaan as $jenisPemeriksaan)
                                            <li style="margin-bottom:-20px;"> {{ $jenisPemeriksaan->itemPemeriksaan }} : <b>{{ formatRupiah($jenisPemeriksaan->harga) }}</b></li>
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
                        <td class="text-center text-md" width="50">
                            @if($data->tblpermintaan->status == 1 )
                                <span class="text-center badge bg-info">Sampel telah di terima</span>
                            @elseif($data->tblpermintaan->status == 2)
                                <span class="text-center badge bg-warning">Sampel belum di terima</span>
                            @elseif($data->tblpermintaan->status == 3)
                                <span class="text-center badge bg-primary">Sampel sedang dalam Proses Pemeriksaan</span>
                            @elseif($data->tblpermintaan->status == 4)
                                <span class="text-center badge bg-success">Sampel selesai diperiksa</span>
                            @endif
                        </td>
                        <td>
                            <a data-toggle="modal" wire:click="itemAnalisaModal({{$data->id}})" class="btn btn-sm btn-info" data-target="#modalDetail" ><i class="fa fa-eye"></i></a>
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
</div>

