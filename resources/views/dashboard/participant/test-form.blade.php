@extends('layouts.master-menu')

@section('title', 'Test')

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
                    <a class="active" href="{{ route('create') }}">Test Payment</a>
                </li>
            </ul>
        </div>
    </div>
    @if (session()->has('failed'))
        <div class="alert alrt-danger" role="alert" id="alert">
            <i class='bx bx-x-circle'></i>
            {{ session('failed') }}
            <i class='bx bx-x' id="icon" style="cursor: pointer" onclick="hideAlert()"></i>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alrt-success" role="alert" id="alert">
            <i class='bx bxs-check-circle'></i>
            {{ session('success') }}
            <i class='bx bx-x' id="icon" style="cursor: pointer" onclick="hideAlert()"></i>
        </div>
    @endif
    <form action="{{ route('create') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- <h3 style="margin-top:10px">Choose your schedule test!</h3> --}}
        <p style="margin-left: 5px">Please make a payment 
            to the account number in the name of PNC (098765433) 
            and upload the proof in the column below.</p>
        <div class="test-part">
            <label for="schedule" class="form-label">Choose Schedule & Upload Proof of Payment</label>           
            <select class="form-select" name="test_id" id="schedule">
                @foreach ($capactiy as $date => $date_test)
                    <option value="{{$date}}">{{\Carbon\Carbon::parse($date_test)->format('l, F d, Y')}}</option>
                @endforeach
            </select>
        </div>
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


