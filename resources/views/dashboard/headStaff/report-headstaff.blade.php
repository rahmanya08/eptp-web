@extends('layouts.master-menu')

@section('title', 'Report')

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
                    <a class="active" href="{{ route('report') }}">Report</a>
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

    <div class="table-data" id="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Data</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Test Date</th>
                        <th>Assist By</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Validation</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($reports as $data)
                        <tr>
                            <td>{{$data->date_test  }}</td>
                            <td>{{$data->name}}</td>
                            @if ($data->report == 1 )
                                <td><span class="status Active">{{ $data->report = 'Reported'}}</span></td>
                            @else
                                <td><span class="status In-Active">{{ $data->report = 'Un-Reported'}}</span></td>
                            @endif
                            @if ($data->date_report != null)
                            <td><span class="status Active">validated at {{ $data->date_report}}</span></td>
                            @else
                            <td><span class="status In-Active">Un-Validated</span></td>
                            @endif
                            <td>
                                <span><a href={{route('validateReport', $data->id)}} class="btn-edit" style="color: white">See Details</a></span>
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

