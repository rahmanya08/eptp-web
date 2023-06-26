@extends('layouts.master-menu')

@section('title', 'Announcment')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
@endpush


@push('profile')
    @foreach ($profile as $img)
        @if ($img->image != null)
            <img src="{{ asset('storage/images/users/'.$img->image) }}">
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
                            <a href="{{ route('indexParticipant') }}">Dashboard</a>
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
                <h1>Certificate</h1>
                @foreach ($results as $result)
                <div class="box-header">
                    @if ($result->is_passed == 1 )
                        <h2>Congratulations For Your Achivments</h2>
                        <i class='bx bxs-check-circle'></i>
                    @else
                        <h2>Sorry, Your Score Doesn't Comply The Graduation Requirements </h2>
                        <i class='bx bx-x-circle'></i>
                    @endif 
                </div>
                <div class="box-body">
                    <h1>{{ $result->skor}}</h1>
                    <p>You can download the certificate below</p>
                </div>
                <div>
                    <a href="{{ asset('storage/file/certif/'.$result->sertif_url) }}" class="btn-download">
                        <i class='bx bxs-download'></i>
                        <span class="text">Download PDF</span>
                    </a>
                </div>
                @endforeach   
            </div>
        </main>
@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

