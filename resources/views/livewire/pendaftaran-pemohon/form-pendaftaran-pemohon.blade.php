<div class="register-page" style="margin-top:-100px;">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h3"><b>PENDAFTARAN</b> LABORATORIUM</a>
            </div>
            <div class="card-body">
                <form wire:submit="store()">
                    <p class="login-box-msg">MASUKAN DATA ANDA</p>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model='nama' placeholder="Nama Lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" wire:model="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control @error('noHp') is-invalid @enderror" placeholder="No HP" wire:model="noHp">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-whatsapp fa-lg fa-solid" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    @error('noHp') <a class="text-red text-sm">{{ $message }}</a> @enderror
                    <div class="input-group mb-2">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" wire:model="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    @error('password') <a class="text-red text-sm">{{ $message }}</a> @enderror
                    <div class="input-group mb-2">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" wire:model="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    @error('password') <a class="text-red text-sm">{{ $message }}</a> @enderror
                    <div class="input-group mb-2">
                        <select type="text" class="form-control @error('prov') is-invalid @enderror" wire:model.live="prov">
                            <option>-- Pilih Provinsi --</option>
                            @foreach ($provinsi as $data)
                                <option value="{{ $data->id }}">{{$data->namaProvinsi}}</option>
                            @endforeach

                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <select type="text" class="form-control @error('city') is-invalid @enderror" wire:model.live="city">
                            <option>-- Pilih Kab/Kota --</option>
                            @forelse ($kota as $data)
                                <option value="{{ $data->id }}">{{$data->namaKota}}</option>
                            @empty

                            @endforelse
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                    <select type="text" class="form-control @error('kec') is-invalid @enderror" wire:model="kec">
                            <option>-- Pilih Kecamatan --</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                    <select type="text" class="form-control @error('kel') is-invalid @enderror" wire:model="kel">
                            <option>-- Pilih Desa / Kelurahan --</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <textarea type="text" class="form-control" wire:model="alamat"></textarea>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </div>
                    <a href="{{route('login')}}"class="text-center mt-2">Klik disini jika sudah memiliki akun</a>
                </form>
            </div>
        </div>
    </div>
</div>
