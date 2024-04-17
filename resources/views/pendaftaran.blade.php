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
            <form action="{{route('guest.daftar')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="label-control">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukan nama anda"> 
                </div>
                <div class="form-group">
                    <label class="label-control">Email</label>
                    <input type="email" class="form-control" placeholder="Masukan email anda"> 
                </div>
                <div class="form-group">
                    <label class="label-control">No HP</label>
                    <input type="text" class="form-control" placeholder="Masukan nama anda"> 
                </div>
                <div class="form-group">
                    <label class="label-control">Alamat</label>
                    <input type="text" class="form-control" placeholder="Masukan nama anda"> 
                </div>
                <div class="form-group">
                    <label class="label-control">Password</label>
                    <input type="password" class="form-control" placeholder="Password"> 
                </div>
                <div class="form-group">
                    <label class="label-control">Ulangi Password</label>
                    <input type="password" class="form-control" placeholder="Ulangi Password"> 
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn-primary"> Daftar </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection