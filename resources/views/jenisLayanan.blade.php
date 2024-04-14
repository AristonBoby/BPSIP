@extends('layouts.guest')

@section('navigator')
    @include('layouts.guestView.navigator')
@endsection

@section('slide')
<div>
<div class="card card-defaulr">
    <div class="card-body"><h5 >Jenis Layanan</h5></div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
        @foreach($query as $data)
            <div class="col-lg-12">
                <div class="card shadow bg-white rounded">
                    <div class="card-header">
                        <span class="card-title text-center"><b>{{$data->jenis_pengujian}}</b></span>
                    </div>
                    <div class="col-md-12 row">
                        @foreach($data->analisaSampel as $da)
                        <div class="col-md-6 mt-3">
                            <div class="card card-primary card-outline shadow">
                                <div class="card-header">
                                    <span class="card-title"><b>{{$da->jenis_analisa}}</b></span>
                                </div>
                                <div class="card-body">
                                <h5 class="pb-3 text-center"><b>ITEM PEMERIKSAAN</b></h5>
                                <ul class="list-group list-group-unbordered mb-3">
                                    @foreach($da->jenisPemeriksaanSampel as $no=>$value) 
                                    <li style="margin:-9px;" class="list-group-item">
                                        <span>{{$no+1}}. </span>
                                        <span class=" text-dark">{{$value->itemPemeriksaan}}</span>
                                        <span class="text-dark float-right">{{formatRupiah($value->harga)}}</span > 
                                    </li>
                                    @endforeach
                                    <li class="list-group-item">
                                        <b class="text-lg">Total</b>
                                        <b class=" text-lg text-dark float-right">{{formatRupiah($da->jenisPemeriksaanSampel->sum('harga'))}}</b>
                                    </li>
                                </ul>
                                <div class="ribbon-wrapper ribbon-xl">
                                    <div class="ribbon bg-success text-lg">
                                        PROMOSI dddd
                                    </div>
                                </div>
                                </div>
                            </div>    
                        </div>
                        @endforeach
                    </div>   
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div>
@endsection


