@extends('layouts.app')

@section('header')
JENIS ANALISA <b>SAMPEL</b>
@endsection

@section('navigator')
    <livewire:layouts.navigator>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12">
                <livewire:jenis-pemeriksaan.form-jenis-pemeriksaan>
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12">
                <livewire:analisa-sampel.table-analisa-sampel>
        </div>
    </div>
@endsection


