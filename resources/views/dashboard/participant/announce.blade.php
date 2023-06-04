@extends('layouts.master-menu')

@section('title', 'Announcment')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
@endpush

@push('profile')
    @foreach ($identities as $identity)
        @if ($identity->image != null)
            <img src="{{ asset('storage/images/users/'.$identity->image) }}">
        @else
            <img src="{{ asset('img/nopic.png') }}" alt="" id="profile">
        @endif
    @endforeach
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
                        <h1>{{ $result->skor}}</h1>
                    @endforeach
                        <p>You can download the certificate below</p>
                </div>
                <div>
                    @foreach ($results as $result)
                    <a href="{{ asset('storage/file/certif/'.$result->sertif_url) }}" class="btn-download">
                        <i class='bx bxs-download'></i>
                        <span class="text">Download PDF</span>
                    </a>
                    @endforeach
                </div>
            </div>
            
        </main>
@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

