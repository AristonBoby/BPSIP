<div class="col-lg-12 ">
    <form wire:submit='store' class=" form-horizontal">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="card card-outline card-primary">
                <div class="card-header ">
                    <h5 class="card-title"><i class="fa fa-address-card" aria-hidden="true"></i> FORM <b>IDENTITAS PERMOHONAN ANALISIS</b></h5>
                    <button type="button" data-toggle="modal" data-target="#modalCariPemohon" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus"></i> <b>Data Pemohon</b></button>
                </div>
                <div class="card-body row">
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                        <label class=" control-label col-sm-3 text-uppercase">Nama Pemohon <b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <input type="text" wire:model='namaPemohon' class="form-control rounded-0  @error('namaPemohon') is-invalid @enderror" placeholder=" Nama Pemohon" disabled>
                            @error('namaPemohon') <span class=" text-red error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label col-sm-3">No. Telp (HP) <b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <input type="text" wire:model='noTlpn' class="form-control rounded-0  @error('noTlpn') is-invalid @enderror" placeholder=" Nomor Telepon (HP)" disabled>
                            @error('noTlpn')<span class="error is_invalid  text-red"> {{ $message }} </span>@enderror
                        </div>
                    </div>
                    <div class="form-group  col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label col-sm-3">Alamat<b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <textarea wire:model='alamat' placeholder="Alamat" class="text-uppercase form-control @error('kel') is-invalid @enderror" disabled/></textarea>
                            @error('alamat')<span class="error text-red ">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label  col-sm-3">Tanggal Pengujian<b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                            <input type="text" wire:model.live='tanggal' class="form-control rounded-0  @error('tanggal') is-invalid @enderror" placeholder="Tanggal" disabled>
                            @error('tanggal') <span class=" text-red">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="card card-outline card-primary">
                <div class="card-header ">
                    <h5 class="card-title"><i class="fa fa-flask" aria-hidden="true"></i> FORM <b>IDENTITAS CONTOH</b></h5>
                </div>
                <div class="card-body row">
                    <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                        <label class="control-label col-sm-3"> Nomor SPK <b class='text-red'>*</b></label>
                        <div class="col-sm-7">
                           <input type="text" wire:model='nomorSpk' class=" form-control @error('nomorSpk') is-invalid @enderror" placeholder="Nomor SPK" @disabled($form)>
                            @error('nomorSpk') <span class="error is-invalid text-red"> {{ $message }} </span> @enderror
                        </div>
                    </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label col-sm-3"> Jenis Pengujian Sampel <b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <select wire:model.live='jenisPengujian' class=" form-control @error('jenisPengujian') is-invalid @enderror" @disabled($form)>
                            <option value="">-- Pilih Salah Satu --</option>
                            @foreach ($analisa as $data )
                            <option value="{{ $data->id }}">{{ $data->jenis_pengujian}}</option>
                            @endforeach
                        <select>
                        @error('jenisPengujian') <span class=" error is-invalid text-red"> {{ $message }} </span> @enderror
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label  col-sm-3"> Jumlah Contoh <b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <input type="text" wire:model.defer='jumContoh' class="form-control rounded-0  @error('jumContoh') is-invalid @enderror" placeholder=" Jumlah Contoh" @disabled($form)>
                        @error('jumContoh')<span class=" text-red">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label  col-sm-3"> Jenis Contoh <b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <input type="text" wire:model='jenisContoh' class="form-control rounded-0  @error('jenisContoh') is-invalid @enderror" placeholder=" Jenis Contoh" @disabled($form)>
                        @error('jenisContoh')<span class=" text-red">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label  col-sm-3"> Berat Contoh <b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <input type="text" wire:model.defer='beratContoh' class="form-control rounded-0  @error('beratContoh') is-invalid @enderror" placeholder=" Berat Contoh" @disabled($form)>
                        @error('beratContoh')<span class=" text-red">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label  col-sm-3">Bentuk Contoh<b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <input type="text" wire:model.defer='bentukContoh' class="form-control rounded-0  @error('bentukContoh') is-invalid @enderror" placeholder=" Bentuk Contoh" @disabled($form)>
                        @error('bentukContoh') <span class=" text-red">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label  col-sm-3">Kondisi Contoh<b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <input type="text" wire:model.defer='kondisiContoh' class="form-control rounded-0  @error('kondisiContoh') is-invalid @enderror" placeholder=" Kondisi Kemasan" @disabled($form)>
                        @error('kondisiContoh') <span class=" text-red">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12 row">
                    <label class="control-label  col-sm-3">Jenis Kemasan<b class='text-red'>*</b></label>
                    <div class="col-sm-7">
                        <input type="text" wire:model.defer='jenisKemasan' class="form-control rounded-0  @error('jenisKemasan') is-invalid @enderror" placeholder=" Jenis Kemasan" @disabled($form)>
                        @error('jenisKemasan') <span class=" text-red">{{ $message }}</span> @enderror
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="card card-outline card-primary">
                <div class="card-header ">
                    <h5 class="card-title"><i class="fa fa-flask" aria-hidden="true"></i> FORM <b>ITEM PENGUJIAN</b></h5>
                </div>
                <div class="card-body">
                    <table class="table tabel-sm table-striped table-hover table-bordered">
                        <thead>
                            <tr class="text-uppercase">
                                <th width="60">No.</th>
                                <th width="200" class="text-center">Kode Contoh / Sampel (Customer) <b class='text-red'>*</b></th>
                                <th width="200" class="text-center">Kode Lab <b class='text-red'>*</b></th>
                                <th width="200" class="text-center">Paremeter Uji <b class='text-red'>*</b></th>
                                <th width="200" class="text-center">Keterangan</th>
                                <th width="200" class="text-center">Biaya</th>
                                <th width="200" class="text-center">Item Pengujian</th>
                                <th width="200" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $sampel as $no=>$data )
                            <tr>
                                <td>{{ $no+1 }}.</td>
                                <td><input placeholder="Kode Sampel" wire:model='kodeSampel.{{ $no }}' type="text"  class="form-control form-control-sm rounded-0" @disabled($form)></td>
                                <td><input placeholder="Kode Lab" type="text" class="form-control form-control-sm rounded-0" @disabled($form)></td>
                                <td>
                                    <select class="form-control form-control-sm rounded-0" wire:model.live='idpemeriksaan.{{$no}}' @disabled($form)>
                                        <option>-- Pilih Salah Satu --</option>
                                        @forelse ($itemPengujian as $data )
                                            <option value="{{$data->id}}">{{ $data->jenis_analisa }}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </td>
                                <td><textarea placeholder="Keterangan" type="text" class="form-control form-control-sm rounded-0" @disabled($form)></textarea></td>
                                <td><input wire:model.live='getharga.{{$no}}'></td>
                                @if($no===0)
                                    <td class="text-center"><button type="button" class="btn btn-primary" wire:click="addSampel('{{ $no }}')" @disabled($form)>+</button></td>
                                @else
                                    <td class="text-center"><button type="button" class="btn btn-danger" wire:click="removeSampel({{ $no }})" @disabled($form)><i class="fa fa-trash" ></i></button></td>
                                @endif

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <button type="button" class=" btn-md btn btn-danger  float-right" style="margin-right:15px;" @disabled($form)><i class="fa fa-times" aria-hidden="true"></i> Batal</button>
                        <button class=" btn-md btn btn-primary  float-right" style="margin-right:15px;" @disabled($form)><i class="fa fa-save" aria-hidden="true" ></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('livewire.permohonan-analisis.modalCariPemohon')
</div>
<script>
    window.addEventListener('alert', event => {
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
