@extends('layouts.master-auth')

@section('title', 'Thanks')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
<link rel="stylesheet" href="{{ asset('css/popup-modal.css') }}">
@endpush

@section('main-content')
<section>
    <div class="popup center">
        <div class="icon">
            <i class='bx bxs-check-circle'></i>
        </div>
        <div class="title">
            Thank for Register!
        </div>
        <div class="desc">
            <p>{{ $message }}</p>
        </div>
        <div class="redirect-btn">
            <a href="{{ route('indexParticipant') }}" id="redirect-popup-btn">
                Dashboard
            </a>
        </div>
    </div> 
</section>
@endsection
        
@push('child-js')
    <script src="{{ asset('js/auth.js') }}"></script>
@endpush
