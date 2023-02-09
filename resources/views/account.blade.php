@extends('layouts.master-menu')

@section('title', 'Account')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-css.css') }}">
@endpush

@push('user')
    <div class="user-wrapper">
        <img src="{{ asset('img/Murat.jpeg') }}" width="40px" height="40px" alt="">
        <div>
            <h4>Murat Boz</h4>
            <small>Administrator</small>
        </div>
    </div>
@endpush

@section('main-content')
        <main>
            <div class="Pins">
                <div class="pin-card">
                    <h3>Changes Your Account</h3>
                    <div class="form-auth">
                        <input type="text" name="name" placeholder="Name">
                    </div>
                    <div class="form-auth">
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-auth">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div>
                        <button class="save-btn">Save Changes</button>
                    </div>
                </div>
            </div>
            
        </main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/menu.js') }}"></script>
@endpush

