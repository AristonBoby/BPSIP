@extends('layouts.app')

@section('header')
INPUT <b>DOKUMEN</b>
@endsection

@section('navigator')
    <livewire:layouts.navigator>
@endsection

@section('content')
        <livewire:dokumen.dokumen_table>
@endsection


