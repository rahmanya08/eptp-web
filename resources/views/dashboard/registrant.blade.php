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
                        <th>ID Participant</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Test Type</th>
                        <th>Schedule</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($identities as $identity)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$identity->category }}</td>
                        @foreach ($users as $user)
                            <td>{{$user->name}} </td>  
                        @endforeach
                        @foreach ($schedules as $schedule)
                            <td>{{$schedule->type_test}}</td>
                            <td>{{$schedule->date_test}}</td>       
                        @endforeach
                        <td>
                            <span><button class="btn-act">Disable</button></span>
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
