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
        <i class='bx bx-x' id="icon" onclick="hideAlert()"></i>
    </div>
    @endif
    <form class="report-box" action="{{ route('reportStaff') }}" method="post">
        @csrf
        <p style="margin-top: 10px">Laporkan hasil tes dengan memilih jadwal tes yang telah selesai dan <span style="font-style: italic">see detail</span>
        untuk melihat daftar peserta.</p>
        <div class="row">
            <div class="col">
                <label for="">Test Date</label>
                <select name="date_test" id="date_test">
                        <option value="">Select Test Date</option>
                        @foreach ($tests as $test)
                            <option value="{{ $test->id }}">{{\Carbon\Carbon::parse($test->date_test)->format('l, F d, Y')}}</option>
                        @endforeach
                </select>
            </div>
            <div style="width: 50%">
                <label for="">Result Reported</label>
                <div class="done">
                    <input type="checkbox" name="report" id="done" value="1">
                    <label for=""><span style="font-style: italic">Done</span></label>
                </div>
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
                        <th>Assist By</th>
                        <th>Status</th>
                        <th>Validation</th>
                        <th>Validate By</th>
                        <th>See Details</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($reports as $tests)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($tests->date_test)->format('l, F d, Y')}}</td>
                            <td>{{$tests->name}}</td>
                            @if ($tests->report == 1 )
                                <td><span class="status Active">{{ $tests->report = 'Reported'}}</span></td>
                            @else
                                <td><span class="status In-Active">{{ $tests->report = 'Un-Reported'}}</span></td>
                            @endif
                            @if ($tests->date_report != null)
                            <td><span class="status Active">validated at {{ $tests->date_report}}</span></td>
                            @else
                            <td><span class="status In-Active">Un-Validated</span></td>
                            @endif
                            @if ($tests->date_report != null)
                                @foreach ($headstaff as $validator)
                                    <td>{{ $validator->name}}</td>  
                                @endforeach
                            @else
                                <td><span class="status In-Active">Un-Validated</span></td>
                            @endif
                            <td>
                                <span><a href={{route('Reported', $tests->id)}} class="btn-edit" style="color: white">See Details</a></span>
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
    <script src="{{ asset('js/table2excel.js') }}"></script>
@endpush

