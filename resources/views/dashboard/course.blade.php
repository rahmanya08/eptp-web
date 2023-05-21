@extends('layouts.master-menu')

@section('title', 'Course')

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
                    <a class="active" href="{{ route('course') }}">Course</a>
                </li>
            </ul>
        </div>
    </div>
    <ul class="box-info">
        <li class="retry">
            <i class='bx bx-repeat'></i>
            <span class="text">
                <h3>Retake</h3>
                <p>the test</p>
            </span>
        </li>
    </ul>
</main>
@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush


