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
                        <a class="active" href="{{ route('updateAccount') }}">Setting</a>
                    </li>
                </ul>
            </div>
        </div>
        @if (session()->has('success'))
        <div class="alert alrt-success" role="alert" id="alert">
            {{ session('success') }}
            <i class='bx bx-x' id="icon" onclick="hideAlert()"></i>
        </div>
        @endif
        <form action="{{ route('updateAccount') }}" method="post">
            @csrf
            <h2 style="margin-top: 50px">Edit Account</h2>
            <div class="account-box">
                <div class="input-box">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" required value="{{ old('name', auth()->user()->name) }}">
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required value="{{ old('email', auth()->user()->email) }}">
                </div>
                <div class="input-box password-box">
                    <i class='bx bx-lock-open' onclick="myFunction()" style="cursor: pointer"></i>
                    <label for="password">Password</label>
                    <input type="password" name="pass" id="pass" value="{{ old('password')}}">
                </div>
                <button type="submit" class="edit-btn"  onclick="return getData()">Save Changes</button>
            </div>
        </form>
        {{-- <form action="{{ route('account') }}" method="post">
            @method('put')
            @csrf
            <h2 style="margin-top: 50px">Identity</h2>
            <div class="identity-box">
                <div class="text-box">
                    <input type="text" name="identity_num" id="identity_num" required value="{{ old('identity_num', $user->identity_num) }}" >
                </div>
                <div class="text-box">
                    <input type="text" name="phone" id="phone"  required value="{{ old('phone', $user->phone) }}" >
                </div>
                <div class="text-box">
                    <input type="text" name="address" id="address" required value="{{ old('address', $user->address) }}" >
                </div>
                <div class="btn-edit">
                    <a href="#">
                        <span class="text">Save Changes</span>
                    </a>
                </div>
            </div>
        </form> --}}
</main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

