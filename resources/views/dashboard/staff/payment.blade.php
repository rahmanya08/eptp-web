@extends('layouts.master-menu')

@section('title', 'Payment')

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
                    <a href="{{ route('indexStaff') }}">Dashboard</a>
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
    @if (session()->has('success'))
    <div class="alert alrt-success" role="alert" id="alert">
        {{ session('success') }}
        <i class='bx bx-x' id="icon" onclick="hideAlert()"></i>
    </div>
    @endif
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
                        <th>Test</th>
                        <th>Attacment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $payment->name}}</td>
                        <td>{{ $payment->date_test }}</td>
                        <td>{{ $payment->pay_url}}</td>
                            @if ($payment->is_payed == 1)
                                <td><span class="status Active">{{ $payment->is_payed = 'Verified' }}</span></td>
                            @else
                            <td><span class="status In-Active">{{ $payment->is_payed = 'Unverified' }}</span></td>
                            @endif
                        <td>
                            <a href={{"/menu-payment/edit/".$payment['id']}}>Verify</a>
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
    <script>
    function updateStatus(statusId) {
    $.ajax({
        url: '/status/update/' + statusId,
        type: 'PUT',
        success: function(response) {
        if (response.success) {
            alert('Status updated successfully!');
        } else {
            alert('Status update failed!');
        }
        },
        error: function() {
        alert('An error occurred while updating the status.');
        }
    });
    }
    </script>    
@endpush
