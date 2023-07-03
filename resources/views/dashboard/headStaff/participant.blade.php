@extends('layouts.master-menu')

@section('title', 'Dashboard')

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
                    <a href="{{ route('indexheadStaff') }}">Dashboard</a>
                </li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li>
                    <a class="active" href="{{ route('participant') }}">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
    @if (session()->has('success'))
    <div class="alert alrt-success" role="alert" id="alert">
        <i class='bx bxs-check-circle'></i>
        {{ session('success') }}
        <i class='bx bx-x' id="icon" style="cursor: pointer" onclick="hideAlert()"></i>
    </div>
    @endif
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Participant</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Reg.Num</th>
                        <th>Test Date</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tb_regist as $registrant)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/images/users/'.$registrant->image) }}">
                            <p>{{$registrant->name }}</p>
                        </td>
                        <td>{{ $registrant->registration }}</td>
                        <td>{{ $registrant->date_test }}</td>
                        @if ($registrant->is_payed == 1)
                            <td>Payed</td>
                        @endif

                        @if ($registrant->date_validation !== null )
                            <td><span class="status Active">Validate at: {{$registrant->date_validation}}</span></td>
                        @else
                            <td><span class="status In-Active">Un-Validate</span></td>
                        @endif
                        <td>
                            <span><a href={{"/menu-participants/edit/".$registrant['id']}} class="btn-edit" style="color: white">Validate</a></span>
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

