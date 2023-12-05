@extends('layouts.app')

@section('header')
FORM ANALISA <b>SAMPEL</b>
@endsection

@section('navigator')
    <livewire:layouts.navigator>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12">
                <livewire:analisa-sampel.form-analisa-sampel>
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12">
                <livewire:analisa-sampel.table-analisa-sampel>
        </div>
    </div>
@endsection


