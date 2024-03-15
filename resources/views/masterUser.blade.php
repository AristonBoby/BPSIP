@extends('layouts.app')

@section('header')
Data User
@endsection

@section('navigator')
    <livewire:layouts.navigator>
@endsection

@section('content')
    <div class="col-md-12">
       <div class="card card-primary card-outline col-md-4">
            <div class="card-header">
                <h5 class="col-label">Form Pendaftaran User</h5> 
            </div>
            <div class="card-body">
                <form wire:submit="formUser">
                    <div class="form-group row">
                        <label class="control-label col-lg-3">Nama</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" wire:model="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-lg-3">Email</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" wire:model="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-lg-3">No.Hp</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" wire:model="noHp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-lg-3">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" wire:model="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-lg-3">Re Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" wire:model="re_password">
                        </div>
                    </div>
                </form>
            </div>
       </div>
    </div>
@endsection
