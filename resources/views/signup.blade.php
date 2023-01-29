
@extends('layouts.master-auth')

@section('title', 'Signup')

@push('custom-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('container')
        <div class="tab show">
            <img src="#" alt="">
                <h1>Create Account</h1>
                <p>Use your email address for register account</p>
                @csrf
                <div class="form mrgn">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" placeholder="Name">
                </div>
                <div class="form mrgn">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="form mrgn">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="signup">
                <button type="button">Sign Up</button>
                </div>
                <p>Already have a account ? <a href="{{ route('login') }}">Login </a></p>
        </div>
@endsection

@push('child-js')
    <script src="{{ asset('js/auth.js') }}"></script>
@endpush