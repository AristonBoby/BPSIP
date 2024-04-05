@extends('layouts.guest')

@section('navigator')
    @include('layouts.guestView.navigator')
@endsection

@section('slide')
<div class="card card-defaulr">
    <div class="card-body"><h5 >Jenis Layanan</h5></div>
</div>
@foreach($query as $data)
<div class="card">
    <div class="card-body">
        <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow bg-white rounded">
                    
                        <div class="card-header">
                            <span class="card-title">{{$data->jenis_pengujian}}</span>
                        </div>
                        <div class="card-body">
                        @foreach($data->analisaSampel as $da)
                                {{$da->}}
                        @endforeach
                        </div>       
                    </div>
                </div>
           
            <div class="col-lg-4">
                <div class="card shadow bg-white rounded">
                    <div class="card-header">
                        <span class="card-title">Analisa Tanah</span>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow bg-white rounded">
                    <div class="card-header">
                        <span class="card-title">Analisa Tanah</span>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="card shadow bg-white rounded">
                    <div class="card-header">
                        <span class="card-title">Analisa Tanah</span>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

