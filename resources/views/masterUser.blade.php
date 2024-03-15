@extends('layouts.app')

@section('header')
Data User
@endsection

@section('navigator')
    <livewire:layouts.navigator>
@endsection

@section('content')
    <div class="col-md-12">
       <div class="card card-primary card-outline col-md-3">
            <div class="card-header">
                <h5 class="col-label">Form Pendaftaran User</h5> 
            </div>
            <div class="card-body">
                <form wire:submit="formUser">
                    <div class="form-group row">
                        <label class="control-label col-lg-4">Nama</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" wire:model="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-lg-4">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" wire:model="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-lg-4">No.Hp</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" wire:model="noHp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-lg-4">Password</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" wire:model="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-lg-4">Re Password</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" wire:model="re_password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a class="btn btn-default float-right ml-2">Batal</a>
                            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
       </div>
    </div>
@endsection
