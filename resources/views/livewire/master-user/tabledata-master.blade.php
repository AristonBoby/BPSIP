
    <div class="card card-default">
        <div class="card-header">
            <h5 class="card-title">Data Master User</h5>
        </div>
        <div class="card-body">
            <form wire:submit="filterPencarian" >
                <div class="float-right col-md-12 row mb-2">
                    <div class="form-group col-md-3 row">
                    </div>
                    <div class="form-group col-md-4 row">
                        <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <select type="text" wire:model="status" class="form-control form-control-sm">
                                    <option value="1" >User Aktif</option>
                                    <option value="0">User Terhapus</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-md-5 row">
                        <label class="col-md-3">Pencarian </label>
                        <div class="col-md-9">
                            <div class="input-group input-group-sm ">
                                <input type="text" class="form-control" wire:model="pencarian" placeholder="Pencarian">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i> Cari</button>
                                </span>                        
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-bordered table-sm table-hover table-striped text-sm">
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
                    @forelse( $query as $no=> $data)
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
                                @if($data->role == 0)
                                    <span class="badge bg-danger">Dihapus</span>
                                @elseif($data->role == 2)
                                    <span class="badge bg-warning">Admin</span>
                                @elseif($data->role == 3)
                                    <span class="badge bg-warning">Pendaftaran</span>
                                @elseif($data->role == 4)
                                    <span class="badge bg-primary">Verifikasi Hasil</span>
                                @elseif($data->role == 5)
                                    <span class="badge bg-success">Petugas Lab</span>
                                @endif
                            </td>
                            <td width="100" class="text-center">
                                @if($data->role == 0 )
                                    <button wire:click="btlHapus('{{$data->id}}')" data-toggle="modal"  data-target="#modalBtlHapus" class="btn btn-warning text-sm btn-xs" type="button"><i class="fa fa-undo"></i> Kembalikan</button>
                                @else
                                    <a wire:click="getData('{{$data->id}}')" data-toggle="modal" data-target="#modaledit" type="button" class="text-md text-dark"><i class="fas fa-edit"></i></a>
                                    <a type="button" data-toggle="modal" wire:click="idGet('{{ $data->id }}')" data-target="#modalPassword" class="ml-2 text-md text-dark"><i class=" fas fa-key"></i></a>
                                    <a type="button" data-toggle="modal" data-target="#modalHapus"  wire:click="idHapus('{{$data->id}}')" class="ml-2 text-md text-dark"><i class=" fa fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <td colspan='7' class="text-center">Data Tidak Ditemukan</td>
                    @endforelse
                </tbody>
                <tfoot>
                   
                </tfoot>
            </table>
            <div class="col-md-12 mt-4">
                <div class="float-right">
                    {{$query->links()}}
                </div>
            </div>
        </div>
        <livewire:master-user.modal-edit>
        <livewire:master-user.modalupdate-alamat>
        <livewire:master-user.modalbtl-hapus>
        <livewire:master-user.modal-password>
        <livewire:master-user.modal-hapus>
</div>

    </div>
