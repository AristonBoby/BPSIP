@extends('layouts.app')
@section('header')
MASTER DATA <b>USER</b>
@endsection
@section('navigator')
    <livewire:layouts.navigator>
@endsection


@section('content')
    <div class="col-md-12 row">
        <div class=" col-md-4">
            <livewire:master-user.masteruser-table>
        </div>
        <div class="col-md-8">
            <livewire:master-user.tabledata-master>
        </div>
    </div>
@endsection
<script>
    window.addEventListener('alert', event => {
        $('#modalView').modal('hide');
        $('#modalDelete').modal('hide');
        $('#modaledit').modal('hide');
        $('#modalupdateAlamat').modal('hide');
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
