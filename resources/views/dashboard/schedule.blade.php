@extends('layouts.master-menu')

@section('title', 'Schedules')

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
                    <a class="active" href="{{ route('schedule') }}">Schedule</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="date" name="date" id="date" >
        </div>
        <div class="col">
            <select name="type" id="test-type">
                <option value="option1">Select Test Type</option>
                <option value="option2">TOEFL</option>
                <option value="option3">TOEIC</option>
            </select>
        </div>
        <div class="col">
            <a href="#" class="btn-add">
                <span class="text">Add</span>
            </a>
            <a href="#" class="btn-add">
                <span class="text">Edit</span>
            </a>
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
                        <th>Date</th>
                        <th>Type</th>
                        {{-- <th>Participant</th> --}}
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>03</td>
                        <td>10-05-2023</td>
                        <td>TOEFL</td>
                        {{-- <td>
                            <div class="animated-progress progress-blue">
                                <span data-progress="90"></span>
                            </div>
                        </td> --}}
                        <td><span class="status completed">Finish</span></td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>20-05-2023</td>
                        <td>TOEFL</td>
                        {{-- <td>
                            <div class="animated-progress progress-blue">
                                <span data-progress="90"></span>
                            </div>
                        </td> --}}
                        <td><span class="status almost">Soon</span></td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>10-05-2023</td>
                        <td>TOEIC</td>
                        {{-- <td>
                            <div class="animated-progress progress-blue">
                                <span data-progress="90"></span>
                            </div>
                        </td> --}}
                        <td><span class="status un-completed">Start</span></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection



        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

