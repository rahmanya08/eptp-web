@extends('layouts.master-menu')

@section('title', 'Announcment')

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
                    <div class="pin-header">
                        <h1>Your Score</h1>
                        <span class="las la-infinity"></span>
                    </div>
                    <div class="pin-body">
                        <span>550</span>
                    </div>
                </div>
                <div>
                    <h1>Congratulations For Your Achivments</h1>
                    <p>You can download the certificate below</p>
                    
                    <button class="download-btn">Download</button>
                </div>
            </div>
            
        </main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/menu.js') }}"></script>
@endpush

