@extends('layouts.master-menu')

@section('title', 'Announcment')

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
                            <a class="active" href="{{ route('announce') }}">Announcment</a>
                        </li>
                    </ul>
                </div>
            </div>        
            <div class="boxs">
                <div class="box-header">
                        <h1>Congratulations For Your Achivments</h1>
                        <i class='bx bxs-check-circle'></i>
                </div>
                <div class="box-body">
                    @foreach ($results as $result)
                        <h1 value="{{ $result->user_id }}">{{  $result->skor}}</h1>
                    @endforeach
                        <p>You can download the certificate below</p>
                </div>
                <div>
                    <a href="#" class="btn-download">
                        <i class='bx bxs-download'></i>
                        <span class="text">Download PDF</span>
                    </a>
                </div>
            </div>
            
        </main>
@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

