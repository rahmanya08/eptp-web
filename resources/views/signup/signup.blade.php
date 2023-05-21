@extends('layouts.master-auth')

@section('title', 'SignUp')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/auth-theme.css') }}">
@endpush

@section('main-content')

    <section>
        <div class="form-box signup  lg-5">
            <div class="form-value">
                <form action="{{ route('signup') }}" method="post">
                    @csrf
                    <h2>SignUp</h2>
                    <div class="input-box">
                        <i class='bx bx-envelope' ></i>
                        <input type="email" name="email" @error('email') is-invalid @enderror required value="{{ old('email') }}">
                        <label for="">Email</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{  $message  }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-box">
                        <i class='bx bx-lock-open'></i>
                        <input type="password" name="password" @error('password') is-invalid @enderror required>
                        <label for="">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{  $message  }}
                        </div>
                        @enderror
                    </div>
                    <!--<div class="input-box">
                        <i class='bx bx-lock-open'></i>
                        <input type="password" name="confirm" @error('confirm') is-invalid @enderror required>
                        <label for="">Confirm Password</label>
                        @error('confim')
                        <div class="invalid-feedback">
                            {{  $message  }}
                        </div>
                        @enderror
                    </div>-->
                    <div class="forget">
                        <label for=""><input type="checkbox" name="forget" id="forget">Remember Me <a href="#">Forget Password</a></label>  
                    </div>
                    <button type="submit" onclick="return getData()">SignUp</button>
                    <div class="register">
                        <p>Already have an account? <a href="{{ route('signin') }}">SignIn</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/auth.js') }}"></script>
@endpush
