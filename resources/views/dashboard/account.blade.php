@extends('layouts.master-menu')

@section('title', 'Setting')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
@endpush

@push('profile')
    <a href="#">
        <img src="{{ asset('img/Akin Akinozu.jpg') }}">
    </a>
@endpush

@section('main-content')
<main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('index') }}">Dashboard</a>
                    </li>
                    <li>
                        <i class='bx bx-chevron-right'></i>
                    </li>
                    <li>
                        <a class="active" href="{{ route('account') }}">Account</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sett-box">
            <div class="text-box">
                <input type="text" name="name" id="name" placeholder="Name" >
            </div>
            <div class="text-box">
                <input type="email" name="email" id="email" placeholder="Email" >
            </div>
            <div class="text-box">
                <input type="password" name="pass" id="pass" placeholder="Password" >
            </div>
            <div>
                <a href="#" class="btn-save" >
                    <span class="text">Save Changes</span>
                </a>
            </div>
        </div>
</main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

