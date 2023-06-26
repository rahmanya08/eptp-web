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
                            <th>Assist By: {{ $data->name }}</th>
                            <th>Validate At: {{ $data->date_report}}</th>  
                        @endif              
                    @endforeach
                </thead>
                <thead>

                    <tr>
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
                        @foreach ($reports as $data)
                        <tr>
                            <td>{{ $data->registration }}</td>
                            <td>{{ $data->name}}</td>
                            @if ( $data->major == 'Major' && $data->study_program == 'Study Program' && $data->semester == 'Semester' )
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            @else
                                <td>{{ $data->major }}</td>
                                <td>{{ $data->study_program}}</td>
                                <td>{{ $data->semester }}</td>
                            @endif
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
    <form action="{{ route('saveValidate') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($test->date_report == null)
            <input type="hidden" name="test_id" value="{{ $test->id }}">
            <div>
                <input type="checkbox" name="checkbox" value="1">
                <label for="date_report">Already Checked</label>
            </div>
            <div>
                <button style="cursor: pointer" type="submit" class="btn-upload" onclick="return getData()">Validate</button>
            </div>
        @endif
    </form>
</main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/table2excel.js') }}"></script>
@endpush

