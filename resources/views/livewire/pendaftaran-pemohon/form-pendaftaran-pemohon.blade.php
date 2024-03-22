<div class="register-page" style="margin-top:-50px;">
    <div class="register-box">
        <div class="card shadow-lg card-outline card-primary">
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
                    @error('nama') <a class="text-red text-sm">{{ $message }}</a> @enderror
                    <div class="input-group mb-2">
                        <input type="text" class="form-control @error('varEmail') is-invalid @enderror" placeholder="Email" wire:model="varEmail">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    @error('varEmail') <a class="text-red text-sm">{{ $message }}</a> @enderror
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
                    @error('prov') <a class="text-red text-sm">{{ $message }}</a> @enderror
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
                    @error('city') <a class="text-red text-sm">{{ $message }}</a> @enderror
                    <div class="input-group mb-2">
                    <select type="text" class="form-control @error('kec') is-invalid @enderror" wire:model.live="kec">
                            <option>-- Pilih Kecamatan --</option>
                            @forelse ($kecamatan as $data)
                                <option value="{{ $data->id }}">{{$data->namaKecamatan}}</option>
                            @empty
                            @endforelse
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    @error('kec') <a class="text-red text-sm">{{ $message }}</a> @enderror
                    <div class="input-group mb-2">
                    <select type="text" class="form-control @error('kel') is-invalid @enderror" wire:model="kel">
                            <option>-- Pilih Desa / Kelurahan --</option>
                            @forelse ($kelurahan as $data)
                                <option value="{{ $data->id }}">{{$data->namaKelurahan}}</option>
                            @empty
                            @endforelse
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    @error('kel') <a class="text-red text-sm">{{ $message }}</a> @enderror
                    <div class="input-group mb-2">
                        <textarea type="text" class="form-control" wire:model="alamat" placeholder="Alamat"></textarea>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    @error('alamat') <a class="text-red text-sm">{{ $message }}</a> @enderror
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        <a href="{{route('login')}}" type="submit" class="btn btn-success btn-block">Klik disini login</a>
                    </div>
                    <a href="{{route('login')}}"class="text-center mt-2">Lupa Password</a>
                </form>
            </div>
        </div>
    </div>
</div>
