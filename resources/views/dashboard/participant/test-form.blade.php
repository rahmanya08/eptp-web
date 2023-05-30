@extends('layouts.master-menu')

@section('title', 'Test')

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
                    <a class="active" href="{{ route('create') }}">Test Payment</a>
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
    <form action="{{ route('create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h3 style="margin-top:10px">Choose your schedule test!</h3>
        <div class="test-part">
            <label for="schedule" class="form-label">Schedule</label>
            <select class="form-select" name="schedule_id" id="schedule">
                @foreach ($schedules as $schedule)
                <option value="{{ $schedule->id }}">{{  $schedule->date_test}}</option>
                @endforeach
            </select>
        </div>
        <p style="margin-left: 14px">After selecting the test schedule, please make a payment 
            to the account number in the name of PNC (098765433) 
            and upload the proof in the column below.</p>
        <div class="payment-part">
            <input type="file" name="pay_url" id="pay_url" accept="image/jpg,image/png,image/jpeg" />
        </div>
        <button type="submit" class="save-btn"  onclick="return getData()">Submit</button>
    </form>
</main>
@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush


