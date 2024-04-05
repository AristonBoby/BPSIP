@extends('layouts.guest')

@section('navigator')
    @include('layouts.guestView.navigator')
@endsection

@section('slide')
    <div class="card">
        <div class="card-header">
            <h5>JENIS LAYANAN</h5>
        </div>
        <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <h5>Inbox</h5>
                        <span class="text-xs" style="margin-top:10px;"><i>Sabtu, 07 November 2023</i></span>
                        <hr>
                        <div>
                            <span>jssjkjskjskjkjk</span>
                        <div>
                    </a>
                </li>
                <a href="#" class="nav-link">
                        <i class="fas fa-inbox"></i> Inbox
                        <span class="badge bg-primary float-right">12</span>
                </a>
            </ul>
        </div>
    </div>
@endsection
