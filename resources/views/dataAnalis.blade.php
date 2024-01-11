@extends('layouts.app')

@section('header')
DATA ANALISA <b>SAMPEL</b>
@endsection

@section('navigator')
    <livewire:layouts.navigator>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <livewire:data-analis.tbl-data-analis>
        </div>
    </div>
@endsection


