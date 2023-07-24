@extends('layouts.master-menu')

@section('title', 'Report Detail')

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
            <h1>Report Detail</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('saveValidate') }}">Report Detail</a>
                </li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li>
                    <a class="active" href="{{ route('saveValidate') }}">Report</a>
                </li>
            </ul>
        </div>
        <button onclick="exportToExcel()" class="btn-download" style="border: none">
            <i class='bx bxs-download'></i>
            <span class="text">Download XLS</span>
        </button>
    </div>
    @if (session()->has('success'))
    <div class="alert alrt-success" role="alert" id="alert">
        <i class='bx bxs-check-circle'></i>
        {{ session('success') }}
        <i class='bx bx-x' id="icon" onclick="hideAlert()"></i>
    </div>
    @endif
    <div class="table-data" id="table-data">
        <div class="order">
            <div class="head">
                <h3>Participant List</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table class="table">
                <thead>
                     @foreach ($info as $data)
                        @if ($data->date_report !== null)
                            <th>Test Date: {{ $data->date_test }}</th>
                            <th>Reported By: {{ $data->name }}</th>
                            <th>Validate At: {{ $data->date_report}}</th> 
                            @foreach ($headstaff as $validator)
                                <th>Validate By: {{ $validator->name}}</th>  
                            @endforeach 
                        @endif              
                    @endforeach
                </thead>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Study Program</th>
                        <th>Reg. Number</th>
                        <th>Participant Status</th>
                        <th>Score</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($reports as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name}}</td>
                            @if ( $data->study_program == 'Study Program')
                                <td>-</td>
                            @else
                                <td>{{ $data->study_program}}</td>
                            @endif
                            <td>{{ $data->registration }}</td>
                            <td>{{ $data->category }}</td>
                            <td>{{ $data->skor }}</td>
                            @if ($data->is_passed == 1 )
                                <td>{{ $data->is_passed = 'Success'}}</td> 
                            @else
                                <td>{{ $data->is_passed = 'Failed'}}</td>
                            @endif
                        </tr> 
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="btn-back">
        <a href="{{ route('reportStaff') }}">Back</a>
    </div>
</main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/table2excel.js') }}"></script>
@endpush

