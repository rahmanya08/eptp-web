@extends('layouts.master-menu')

@section('title', 'Dashboard')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
@endpush

@push('profile')
    <a href="#">
        <img src="{{ asset('img/Murat.jpeg') }}">
        {{-- //<img src="{{ asset('storage/images/users/'.$identities->image) }}"> --}}
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
                    <a class="active" href="{{ route('index') }}">Dashboard</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn-download">
            <i class='bx bxs-download'></i>
            <span class="text">Download PDF</span>
        </a>
    </div>
    <ul class="box-info">
        <li>
            <i class='bx bxs-user-check'></i>
            <span class="text">
                <h3>200</h3>
                <p>Users</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group'></i>
            <span class="text">
                <h3>500</h3>
                <p>Registrant</p>
            </span>
        </li>
        <li>
            <i class='bx bx-calendar-edit'></i>
            <span class="text">
                <h3>5</h3>
                <p>Schedule</p>
            </span>
        </li>
    </ul>

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
                        <th>Name</th>
                        <th>Test</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('img/ian (82).jpg') }}">
                            <p>Ian Somerhalder</p>
                        </td>
                        <td>TOEFL</td>
                        <td><span class="status completed">Finish</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('img/Akin Akinozu.jpg') }}">
                            <p>Akin Akinozu</p>
                        </td>
                        <td>TOEFL</td>
                        <td><span class="status almost">Soon</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('img/Can Yaman.jpg') }}">
                            <p>Can Yaman</p>
                        </td>
                        <td>TOEFL</td>
                        <td><span class="status un-completed">Start</span></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <!--<div class="todo">
            <div class="head">
                <h3>Recent Data</h3>
                <i class='bx bx-plus'></i>
                <i class='bx bx-filter'></i>
            </div>
            <ul class="todo-list">
                <li class="complete">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </li>
                <li class="complete">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </li>
                <li class="un-complete">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </li>
                <li class="un-complete">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </li>
            </ul>
        </div>-->

    </div>

</main>

@endsection



        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

