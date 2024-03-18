
    <div class="card card-default">
        <div class="card-header">
            <h5 class="card-title">Data Master User</h5>
        </div>
        <div class="card-body">
            <table class="table table-sm hover stripped text-sm">
                <thead>
                    <tr>
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
                    @forelse ( $query as $no=>$data)
                        <tr>
                            <td>{{ $query->firstitem()+$no }}.</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $query->userPemohons->no_tlpn }}</td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
