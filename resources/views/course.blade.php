@extends('layouts.master-menu')

@section('title', 'Dashboard')

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
            <!--first-content-->
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>01</h1>
                        <span> <a href="{{ route('test-register') }}">Re-Test</a></span>
                    </div>
                    <div>
                        <span class="las la-reply"></span>
                    </div>
                </div>
            </div>
        </main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/menu.js') }}"></script>
@endpush

