
@extends('layouts.master-auth')

@section('title', 'Signup')

@push('custom-css')
    <link rel="stylesheet" href="{{ asset('css/auth-css.css') }}">
@endpush

@section('container')
        <div class="tab show">
            <img src="#" alt="">
                <h2><span class=" las la-globe-africa"></span><span>Language Center</span> 
                </h2>
                <h1>Create Account</h1>
                <p>Use your email address for register account</p>
                @csrf
                <div class="form-auth">
                    <input type="text" name="name" placeholder="Name">
                </div>
                <div class="form-auth">
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="form-auth">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="auth-btn">
                <button type="button">Sign Up</button>
                </div>
                <p>Already have a account ? <a href="{{ route('login') }}">Login </a></p>
        </div>
@endsection

@push('child-js')
    <script src="{{ asset('js/auth.js') }}"></script>
@endpush