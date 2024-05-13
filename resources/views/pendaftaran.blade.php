@extends('layouts.guest')

@section('navigator')
    @include('layouts.guestView.navigator')
@endsection

@section('slide')


<div>
    @if ($message = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="card card-default ">
        <div class="card-body"><h5 >Pendaftaran</h5></div>
    </div>

    <div class="card">
        <div class="card-header">
            <span class="card-title">Pendaftaran User</span>
        </div>
        <div class="card-body">
            <form action="{{route('guest.daftar')}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label class="label-control"><i class="text-danger">*</i> Nama</label>
                    <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror " placeholder="Masukan nama anda" value="{{ old('name') }}">
                    @error('name') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label class="label-control @error('name') is-invalid @enderror"><i class="text-danger">*</i> Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan email anda" value="{{ old('email') }}">
                    @error('email') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label class="label-control"><i class="text-danger">*</i> No HP</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="Masukan HP anda"value="{{ old('no_hp') }}">
                    @error('no_hp') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="label-control "><i class="text-danger">*</i> Provinsi</label>
                    <select class="form-control rounded-0 @error('prov') is-invalid @enderror" id="provinsi" style="width:100%;  font-size:1.2em;"  name="prov" tabindex="-1" aria-hidden="true" value="{{ old('prov') }}">
                      
                    </select>
                    @error('prov') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="form-group ">
                    <label class="label-control"><i class="text-danger">*</i> Kota</label>
                    <select class="form-control  rounded-0 @error('no_hp') is-invalid @enderror" id="kota" style="width:100%;  font-size:1.2em;"  name="kota" tabindex="-1" aria-hidden="true" value="{{ old('kota') }}">
                      
                    </select>
                    @error('kota') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="form-group ">
                    <label class="label-control"><i class="text-danger">*</i> Kecamatan</label>
                    <select class="form-control  rounded-0 @error('no_hp') is-invalid @enderror" name=""id="kecamatan" style="width:100%;  font-size:1.2em;"  tabindex="-1" aria-hidden="true">
                      
                    </select>
                    @error('kec') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="form-group ">
                    <label class="label-control"><i class="text-danger">*</i> Kelurahan</label>
                    <select name="kelurahan" class="form-control  rounded-0 @error('kelurahan') is-invalid @enderror" name="kel" id="kelurahan" style="width:100%;  font-size:1.2em;"  tabindex="-1" aria-hidden="true">
                      
                    </select>
                    @error('kelurahan') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label class="label-control"><i class="text-danger">*</i> Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat anda">
                    @error('alamat') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label class="label-control"><i class="text-danger">*</i> Password</label>
                    <input type="password" name="pass" class="form-control @error('alamat') is-invalid @enderror " name="pass" placeholder="Password" value="{{ old('pass') }}">
                    @error('pass') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label class="label-control"> <i class="text-danger">*</i> Ulangi Password</label>
                    <input type="password" name="re-pass" class="form-control @error('re-pass') is-invalid @enderror " name="rePassword" placeholder="Ulangi Password" value="{{ old('re-pass') }}">
                    @error('re-pass') <span class=" text-red text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mt-5">
                    <button type="submit" id="daftar" class="form-control btn-primary"> Daftar </button>
                </div>

            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#provinsi').select2({
                theme: "classic",
                //minimumInputLength:2,
                placeholder: "--- Pilih Provinsi ---",
              //x  maximumSelectionLength: 2,
              //  allowClear: true,
                ajax: {
                        url:"{{route('guest.provinsi')}}",
                        processResults : function(data)
                        {
                            return {
                                results: $.map(data, function(item){
                                    return {
                                        id: item.id,
                                        text: item.namaProvinsi
                                    }
                                
                                })
                            }
                        }
                }

            });
            $('#provinsi').change(function(){
                let id = $('#provinsi').val();
                $('#kota').select2({
                    placeholder: "--- Pilih Kab/Kota ---",
                    theme: "classic",
                    ajax: {
                            url:"{{url('get/kota')}}/"+id,
                            processResults : function(data)
                            {
                                return {
                                    results: $.map(data, function(item){
                                        return {
                                            id: item.id,
                                            text: item.namaKota
                                        }
                                    
                                    })
                                }
                            }
                    }
                });
            });
            $('#kota').change(function(){
                let idKota = $('#kota').val();
                $('#kecamatan').select2({
                    placeholder: "--- Pilih Kecamatan ---",
                    theme: "classic",
                    ajax: {
                            url:"{{url('get/kec')}}/"+idKota,
                            processResults : function(data)
                            {
                                return {
                                    results: $.map(data, function(item){
                                        return {
                                            id: item.id,
                                            text: item.namaKecamatan
                                        }
                                    
                                    })
                                }
                            }
                    }
                });
            });
            $('#kecamatan').change(function(){
                let id= $('#kecamatan').val();
                $('#kelurahan').select2({
                    placeholder: "--- Pilih Kecamatan ---",
                    theme: "classic",
                    ajax: {
                            url:"{{url('get/kel')}}/"+id,
                            processResults : function(data)
                            {
                                return {
                                    results: $.map(data, function(item){
                                        return {
                                            id: item.id,
                                            text: item.namaKelurahan
                                        }
                                    
                                    })
                                }
                            }
                    }
                });
            });
        });
    </script>
    <script>
        window.addEventListener('alert', event => {
            $('#modalEdit').modal('hide');
            $('#modalHapus').modal('hide');
    
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
</div>
@endsection

