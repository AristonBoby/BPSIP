<div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="col-label">Form Pendaftaran User</h5>
        </div>
        <div class="card-body">
            <form wire:submit="create">
                <div class="form-group row">
                    <label class="control-label col-lg-3  text-sm">Nama</label>
                    <div class="col-md-9">
                        <input wire:model='name' type="text" class="form-control form-control-sm text-sm @error('name') is-invalid @enderror" placeholder="Masukan Nama User" wire:model="nama">
                        @error('name') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-3 text-sm">Email</label>
                    <div class="col-md-9">
                        <input wire:model='email'type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Masukan Email User" wire:model="email">
                        @error('email') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-3  text-sm">No.Hp</label>
                    <div class="col-md-9">
                        <input wire:model='no_hp' type="text" class="form-control form-control-sm  @error('no_hp') is-invalid @enderror" placeholder="Masukan Nomor HP" wire:model="noHp">
                        @error('no_hp') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-3  text-sm">Password</label>
                    <div class="col-md-9">
                        <input wire:model='pass' type="password" class="form-control  form-control-sm @error('pass') is-invalid @enderror" placeholder="Masukan Password" wire:model="password">
                        @error('pass') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-3  text-sm">Re Password</label>
                    <div class="col-md-9">
                        <input wire:model='re_pass' type="password" class="form-control form-control-sm @error('re_pass') is-invalid @enderror" placeholder="Masukan password Ulang">
                        @error('re_pass') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-3  text-sm">Provinsi</label>
                    <div class="col-md-9">
                        <select class="form-control form-control-sm @error('provinsi_id') is-invalid @enderror" wire:model.live='provinsi_id'>
                            <option value="" selected>-- Pilih Salah Satu --</option>
                            @forelse ( $provinsi as $prov )
                                <option value="{{ $prov->id }}">{{ $prov->namaProvinsi }}</option>
                            @empty
                                <option value="">Gagal Menggambil Data</option>
                            @endforelse
                        </select>
                        @error('provinsi_id') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-3  text-sm">Kota/Kab</label>
                    <div class="col-md-9">
                        <select class="form-control form-control-sm @error('kota_id') is-invalid @enderror" wire:model.live='kota_id'>
                            <option value="" selected>-- Pilih Salah Satu --</option>
                            @forelse ( $kota as $kot )
                                <option value="{{ $kot->id }}">{{ $kot->namaKota }}</option>
                            @empty
                                <option value="">Gagal Menggambil Data Kabupaten dan Kota</option>
                            @endforelse
                        </select>
                        @error('kota_id') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-3  text-sm">Kecamatan</label>
                    <div class="col-md-9">
                        <select class="form-control form-control-sm @error('kec_id') is-invalid @enderror" wire:model.live='kec_id'>
                            <option value="" selected>-- Pilih Salah Satu --</option>
                            @forelse ( $kecamatan as $kec )
                                <option value="{{ $kec->id }}">{{ $kec->namaKecamatan }}</option>
                            @empty
                                <option value="">Gagal Menggambil Data Kabupaten dan Kota</option>
                            @endforelse
                        </select>
                        @error('kec_id') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-3  text-sm">Desa / Kel</label>
                    <div class="col-md-9">
                        <select class="form-control form-control-sm @error('kel_id') is-invalid @enderror" wire:model.live='kel_id'>
                            <option value="" selected>-- Pilih Salah Satu --</option>
                            @forelse ( $kelurahan as $kel )
                                <option value="{{ $kel->id }}">{{ $kel->namaKelurahan }}</option>
                            @empty
                                <option value="">Gagal Menggambil Data Kabupaten dan Kota</option>
                            @endforelse
                        </select>
                        @error('kel_id') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-3  text-sm">Alamat</label>
                    <div class="col-md-9">
                        <textarea class="form-control form-control-sm @error('alamat') is-invalid @enderror" wire:model='alamat'></textarea>
                        @error('alamat') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="col-md-12">
                        <a class="btn btn-default btn-sm float-right ml-2" wire:click='resetForm()'><i class="fa fa-times text-xs"></i> Batal</a>
                        <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-save text-xs"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
