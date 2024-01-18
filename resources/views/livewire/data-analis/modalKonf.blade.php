<div wire:ignore.self class="modal fade" id="modalKonn" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-address-card" aria-hidden="true"></i> Detail </b></h6>
        </div>
        <div class="modal-body" wire:loading.remove>
            <div class="row">
                @forelse ($detailItem as $query)
                <div class="row invoice-info">
                    <div class="col-sm-6 col-md-6 col-lg-4 invoice-col">
                       <strong> Detail Pemohon </strong><br>
                        Nama :
                        <Strong>{{ $query->name }}</Strong>
                        <br>
                        No Hp : <strong>{{ $query->no_tlpn }}</strong>
                        <br>

                        <address class="text-uppercase">
                            Alamat :<strong>
                            {{ $query->alamat }} {{ $query->namaKelurahan }} {{ $query->namaKecamatan }}
                            {{ $query->namaKota }} {{ $query->namaProvinsi }}</strong>
                        </address>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 invoice-col">
                        <strong>Detail Sampel</strong>
                        <address>
                            Jumlah Contoh : <strong> {{ $query->jumContoh }} </strong><br>
                            Jenis Contoh : <strong> {{ $query->jumContoh }} </strong><br>
                            Berat Contoh : <strong> {{ $query->beratContoh }} </strong><br>
                            Bentuk Contoh : <strong> {{ $query->bentukContoh }} </strong><br>
                            Kondisi Contoh : <strong> {{ $query->kondisiContoh }} </strong><br>
                            Jenis Kemasan : <strong> {{ $query->jenisKemasan }} </strong><br>
                        </address>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 invoice-col">
                        <strong> Nomor SPK : {{ $query->no_spk }}</strong><br>
                        <strong> Tanggal : {{ $query->tanggal}}  </strong>

                        <address>

                        </address>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-sm btn-success">Konfirmasi</button>
            <button type="button" wire:click='close' class="btn btn-danger btn-sm text-sm" data-dismiss="modal"><span class="text-xs fa fa-times"></span> Tutup</button>
        </div>
    </div>
</div>
