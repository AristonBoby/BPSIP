@extends('layouts.guest')

@section('navigator')
    @include('layouts.guestView.navigator')
@endsection

@section('slide')
    @include('layouts.guestView.slider')
@endsection

@section('status')
    @include('layouts.guestView.status')
@endsection

@section('pengumuman')
    @include('layouts.guestView.pengumuman')
@endsection