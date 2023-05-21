@extends('layouts.master-menu')

@section('title', 'User Data')

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
                    <a class="active" href="{{ route('user') }}">User Data</a>
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
                        <th>ID</th>
                        <th>Email</th>
                        <th>Password</th>
                        {{-- <th>Role</th> --}}
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>
                            <p>IanSomerhalder@gmail.com</p>
                        </td>
                        <td>TOEFL</td>
                        {{-- <td>Staff</td> --}}
                        <td><span class="status In-Active">Inactive</span></td>
                        <td>
                            <span><button class="btn-act">Disable</button></span>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>
                            <p>AkinAkinozu@gmail.com</p>
                        </td>
                        <td>TOEFL</td>
                        {{-- <td>Participant</td> --}}
                        <td><span class="status Active"> Active </span></td>
                        <td>
                            <span><button class="btn-act">Disable</button></span>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>
                            <p>CanYaman@gmail.com</p>
                        </td>
                        <td>TOEFL</td>
                        {{-- <td>Staff</td> --}}
                        <td><span class="status Active">Active</span></td>
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
