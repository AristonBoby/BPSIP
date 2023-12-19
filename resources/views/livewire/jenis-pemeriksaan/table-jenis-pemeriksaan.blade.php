<div class="card">
    <div class="card-header">
        <label class="card-title">Table Jenis Analisa</label>
    </div>
    <div class="card-body">
        <table class="table text-sm table-sm table-hover table-striped p-0">
            <thead>
            <tr>
                <th>No.</th>
                <th>Jenis Analisa</th>
                <th width="">Jenis Pemeriksaan</th>
                <th width="">Item</th>
                <th width="">HARGA</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($query as $no=>$data)
                    <tr>
                        <td>{{ $query->firstItem() + $no }}. </td>
                        <td>{{ $data->jenis_pengujian }}</td>
                        <td>{{ $data->jenis_analisa }}</td>
                        <td>{{ $data->jenis }}</td>
                        <td ><span id="amount">{{ formatRupiah($data->harga) }}</span> </td>
                        <td>
                            <a class="btn btn-primary btn-sm"><span class="fa fa-edit"></span></a>
                            <a class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>


    </script>
</div>

