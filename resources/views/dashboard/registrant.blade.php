@extends('layouts.master-menu')

@section('title', 'Registrant Data')

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
                    <a class="active" href="{{ route('registrant') }}">Registrant Data</a>
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
                        <th>Name</th>
                        <th>Category</th>
                        <th>Test Type</th>
                        <th>Schedule</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>Ian Somerhalder</p>
                        </td>
                        <td>Staff</td>
                        <td>TOEFL</td>
                        <td>10-05-2023</td>
                        <td>
                            <span><button class="btn-act">Disable</button></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Akin Akinozu</p>
                        </td>
                        <td>Student</td>
                        <td>TOEFL</td>
                        <td>10-05-2023</td>
                        <td>
                            <span><button class="btn-act">Disable</button></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Can Yaman</p>
                        </td>
                        <td>Student</td>
                        <td>TOEFL</td>
                        <td>20-05-2023</td>
                        <td>
                            <span><button class="btn-act">Disable</button></span>
                        </td>
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
