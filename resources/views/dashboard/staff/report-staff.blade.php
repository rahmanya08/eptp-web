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

@php
    use Carbon\Carbon;
@endphp

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
                    <a class="active" href="{{ route('reportStaff') }}">Report</a>
                </li>
            </ul>
        </div>
        <button onclick="exportToExcel()" class="btn-download" style="border: none">
            <i class='bx bxs-download'></i>
            <span class="text">Download PDF</span>
        </button>
    </div>
    @if (session()->has('success'))
    <div class="alert alrt-success" role="alert" id="alert">
        {{ session('success') }}
        <i class='bx bx-x' id="icon" onclick="hideAlert()"></i>
    </div>
    @endif
    <form class="report-box" action="{{ route('reportStaff') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <select name="date_test" id="date_test">
                        @foreach ($tests as $test)
                            <option value="">Select Test Date</option>
                            <option value="{{ $test->id }}">{{\Carbon\Carbon::parse($test->date_test)->format('l, F d, Y')}}</option>
                        @endforeach
                </select>
            </div>
            <div class="col check">
                <input type="checkbox" name="report" id="done" value="1">
                <label for="report">Done</label>
            </div>
            <div class="col">
                <button type="submit" style="cursor: pointer">Report</button>
            </div>
        </div>
    </form>
    <div class="table-data">
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
                        <th>Reg. Number</th>
                        <th>Name</th>
                        <th>Departement</th>
                        <th>Study Program</th>
                        <th>Semester</th>
                        <th>Score</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($detail_tests as $detailtest)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($detailtest->date_test)->format('l, F d, Y')}}</td>
                            <td>{{ $detailtest->registration}}</td>
                            <td>{{ $detailtest->name }}</td>
                            @if ( $detailtest->major == 'Major' && $detailtest->study_program == 'Study Program' && $detailtest->semester == 'Semester' )
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            @else
                                <td>{{ $detailtest->major }}</td>
                                <td>{{ $detailtest->study_program}}</td>
                                <td>{{ $detailtest->semester }}</td>
                            @endif
                            <td>{{ $detailtest->skor }}</td>
                            @if ($detailtest->is_passed == 1 )
                                <td>{{ $detailtest->is_passed = 'Success'}}</td> 
                            @else
                                <td>{{ $detailtest->is_passed = 'Failed'}}</td>
                            @endif
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
    <script src="{{ asset('js/table2excel.js') }}"></script>
@endpush

