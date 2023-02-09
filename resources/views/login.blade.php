
@extends('layouts.master-auth')

@section('title', 'Login')

@push('custom-css')
    <link rel="stylesheet" href="{{ asset('css/auth-css.css') }}">
@endpush

@section('container')
    <div class="tab show">
        <img src="#" alt="">
            <h1>Welcome Back</h1>
            <p>Login with your email address</p>
            @csrf
            <div class="form-auth">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="form-auth">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="auth-btn">
                <button type="button">Login</button>
            </div>
        <p>Do you haven't a account ? <a href="{{ route('signup') }}">SignUp</a></p>
    </div>

@endsection

@push('child-js')
    <script src="{{ asset('js/auth.js') }}"></script>
@endpush
