@extends('layouts.master-menu')

@section('title', 'Test Card')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
@endpush

@push('profile')
    <a href="#">
        {{-- <img src="{{ asset('storage/users' . $identity->image) }}"> --}}
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
                    <a class="active" href="{{ route('testcard') }}">Test Card</a>
                </li>
            </ul>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alrt-success" role="alert" id="alert">
            {{ session('success') }}
            <i class='bx bx-x' id="icon" onclick="hideAlert()"></i>
        </div>
    @endif
    <form action="{{ route('testcard') }}" method="" enctype="">
        <div class="test-card">
            <div class="kop">
                <h1>Test Card</h1>
                <h4>UPT Bahasa Politeknik Negeri Cilacap</h4>
            </div>
            <div class="row card">
                <div class="column-card right-side">
                  <div class="photo">
                        <img src="{{ asset('img/Akin Akinozu.jpg') }}">
                  </div>
                </div> 
                <div class="column-card left-side">
                    <table class="table">
                        <tbody>
                            @foreach ($identities as $identity)
                                <tr>
                                    <th scope="row">Registration Number:</th>
                                    <td colspan="2">{{$identity->created_at->format('Ymd His')}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Name:</th>
                                    <td colspan="2">{{ auth()->user()->name }}</td>
                                </tr>  
                                {{-- @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">Name:</th>
                                        <td colspan="2">{{ $user->name }}</td>
                                    </tr>  
                                @endforeach --}}
                                <tr>
                                    <th scope="row">Birth Date:</th>
                                    <td colspan="2">{{$identity->birth_date}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone:</th>
                                    <td colspan="2">{{$identity->phone}}</td>
                                </tr>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <th scope="row">Schedule:</th>
                                        <td colspan="2">{{$schedule->date}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            
                            
                            
                        </tbody>
                      </table>
                </div>
            </div>
            <button class="btn-download">Download</button>
        </div>
        {{-- <button type="submit" class="save-btn"  onclick="return getData()">Submit</button> --}}
    </form>
</main>
@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush


