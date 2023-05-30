@extends('layouts.master-menu')

@section('title', 'Payment')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
@endpush

@push('profile')
    <a href="#">
        <img src="{{ asset('img/Murat.jpeg') }}">
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
                    <a class="active" href="{{ route('payment') }}">Payment</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Data</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Participant</th>
                        <th>Date</th>
                        <th>Attacment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        @foreach ($users as $user)
                             <td value="{{ $user->id }}" >{{$user->name}}</td>
                        @endforeach
                        @foreach ($schedules as $schedule)
                            <td value="{{ $schedule->id }}" >{{$schedule->date_test}}</td>
                        @endforeach
                        <td>{{$payment->pay_url}}</td>
                        @if ($payment->is_payed == 1)
                            <td><span class="status Active">{{ $payment->is_payed = 'Verified' }}</span></td>
                        @else
                        <td><span class="status In-Active">{{ $payment->is_payed = 'Unverified' }}</span></td>
                        @endif
                        <td>
                            <span><button class="btn-act">Verify</button></span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</main>

@endsection

        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush
