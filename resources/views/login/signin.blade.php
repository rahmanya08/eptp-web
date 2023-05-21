@extends('layouts.master-auth')

@section('title', 'SignIn')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/auth-theme.css') }}">
@endpush

@section('main-content')

    <section>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            {{ session('success') }}
            <i class='bx bx-x' id="icon" onclick="hideAlert()"></i>
        </div>
        @endif
        @if (session()->has('LoginErorr'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            {{ session('LoginErorr') }}
            <i class='bx bx-x' id="icon" onclick="hideAlert()"></i>
        </div>
        @endif
        <div class="form-box lg-5">
            <div class="form-value">
                <form action="{{ route('signin') }}" method="post">
                    @csrf
                    <h2>SignIn</h2>
                    <div class="input-box">
                        <i class='bx bx-envelope' ></i>
                        <input type="email" name="email" id="email" @error('email') is-invalid @enderror required value="{{ old ('email') }}" autofocus>
                        <label for="email">Email</label>
                        @error('email') 
                            <div class="invlaid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <i class='bx bx-lock-open'></i>
                        <input type="password" name="password" id="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox" name="forget" id="forget">Remember Me <a href="#">Forget Password</a></label>  
                    </div>
                    <button type="submit">SignIn</button>
                    <div class="register">
                        <p>Don't have an account yet? <a href="{{ route('signup') }}">SignUp</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/auth.js') }}"></script>
@endpush
