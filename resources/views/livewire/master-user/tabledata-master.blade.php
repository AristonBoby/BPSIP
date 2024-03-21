
    <div class="card card-default">
        <div class="card-header">
            <h5 class="card-title">Data Master User</h5>
        </div>
        <div class="card-body">
            <table class="table table-sm hover stripped text-sm">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor HP</th>
                        <th>Alamat</th>
                        <th>Jenis Akun</th>
                        <th>*</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $query as $no=> $data)
                        <tr>
                            <td>{{ $query->firstitem()+$no }}.</td>
                            <td width="200">{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>@if(!empty($data->userPemohons->no_tlpn)){{ $data->userPemohons->no_tlpn }}@endif</td>
                            <td>
                                @if(!empty($data->userPemohons->kelurahan->kecamatan->kota->provinsi)){{ $data->userPemohons->kelurahan->kecamatan->kota->provinsi->namaProvinsi }},@endif
                                @if(!empty($data->userPemohons->kelurahan->kecamatan->kota)){{ $data->userPemohons->kelurahan->kecamatan->kota->namaKota }},@endif
                                @if(!empty($data->userPemohons->kelurahan->kecamatan)){{ $data->userPemohons->kelurahan->kecamatan->namaKecamatan }},@endif
                                @if(!empty($data->userPemohons->kelurahan->namaKelurahan)){{ $data->userPemohons->kelurahan->namaKelurahan }},@endif
                                @if(!empty($data->userPemohons->alamat)){{ $data->userPemohons->alamat }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if($data->role == 2)
                                    <span class="badge bg-danger">Admin</span>
                                @elseif($data->role == 3)
                                    <span class="badge bg-warning">Pendaftaran</span>
                                @elseif($data->role == 4)
                                    <span class="badge bg-primary">Verifikasi Hasil</span>
                                @elseif($data->role == 5)
                                    <span class="badge bg-success">Petugas Lab</span>
                                @endif
                            </td>
                            <td width="100" class="text-center">
                                <a wire:click="getData('{{$data->id}}')" data-toggle="modal" data-target="#modaledit" type="button" class="text-md text-dark"><i class="fas fa-edit"></i></a>
                                <a type="button" class="ml-2 text-md text-dark"><i class=" fas fa-key"></i></a>
                                <a type="button" class="ml-2 text-md text-dark"><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <livewire:master-user.modal-edit>
        <livewire:master-user.modalupdate-alamat>

    </div>
