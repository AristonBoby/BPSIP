@extends('layouts.app')

@section('header')
Data User
@endsection

@section('navigator')
    <livewire:layouts.navigator>
@endsection

@section('content')
    <div class="col-md-12 row">
        <livewire:master-user.masteruser-table>
        <livewire:master-user.tabledata-master>
    </div>
@endsection
<script>
    window.addEventListener('alert', event => {
        $('#modalView').modal('hide');
        $('#modalDelete').modal('hide');

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
