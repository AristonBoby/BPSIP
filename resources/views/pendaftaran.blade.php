@extends('layouts.guest')

@section('navigator')
    @include('layouts.guestView.navigator')
@endsection

@section('slide')


<div>
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
                    <label class="label-control"><i class="text-danger">*</i>Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukan nama anda">
                </div>
                <div class="form-group">
                    <label class="label-control"><i class="text-danger">*</i>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Masukan email anda">
                </div>
                <div class="form-group">
                    <label class="label-control"><i class="text-danger">*</i>No HP</label>
                    <input type="text" class="form-control" name="no_hp" placeholder="Masukan HP anda">
                </div>

                <div class="form-group">
                    <label class="label-control">*Provinsi</label>
                    <select class="form-control select2-hidden-accessible rounded-0" id="provinsi" style="width:100%;  font-size:1.2em;"  tabindex="-1" aria-hidden="true">
                      
                    </select>
                </div>
                <div class="form-group">
                    <label class="label-control">*kota</label>
                    <select class="form-control  rounded-0" id="kota" style="width:100%;  font-size:1.2em;"  tabindex="-1" aria-hidden="true">
                      
                    </select>
                </div>
                <div class="form-group">
                    <label class="label-control"><i class="text-danger">*</i> Alamat</label>
                    <input type="text" class="form-control" placeholder="Masukan nama anda">
                </div>
                <div class="form-group">
                    <label class="label-control"><i class="text-danger">*</i> Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="label-control"> <i class="text-danger">*</i> Ulangi Password</label>
                    <input type="password" class="form-control" name="rePassword" placeholder="Ulangi Password">
                </div>
                <div class="form-group mt-5">
                    <button type="submit" id="daftar" class="form-control btn-primary"> Daftar </button>
                </div>

            </form>
        </div>
    </div>

    <script type="text/javascript">
        $('#daftar').click(function(e){
            alert('ddd');
        });


        $(document).ready(function(){
            $('#provinsi').select2({
                theme: "classic",
                 minimumInputLength:2,
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
        });
    </script>
</div>
@endsection

