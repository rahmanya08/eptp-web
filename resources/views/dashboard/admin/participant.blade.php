@extends('layouts.master-menu')

@section('title', 'Participant Data')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
@endpush

@push('profile')
    <a href="#">
        <img src="{{ asset('img/Akin Akinozu.jpg') }}" alt="">
        {{-- <img src="{{ asset('storage/images/users'.$identity->image) }}"> --}}
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
                    <a class="active" href="{{ route('participant') }}">Participant Data</a>
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
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Brith</th>
                        <th>KTP/KTM</th>
                        <th>Identity</th>
                        <th>Category</th>
                        <th>Major</th>
                        <th>Study Program</th>
                        <th>Semester</th>
                        <th>Phone</th>
                        <th>Address</th>
                        {{-- <th>Status</th>
                        <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($identities as $identity)
                    <tr>
                        <td>{{ $identity->id }}</td>
                        @foreach ($users as $user)
                            <td>{{ $user->name }}</td>
                        @endforeach
                        <td>{{ $identity->gender }}</td>
                        <td>{{ $identity->birth_date}}</td>
                        <td>{{ $identity->identity_type }}</td>
                        <td>{{ $identity->identity_num }}</td>
                        <td>{{ $identity->category }}</td>
                        <td>{{ $identity->major }}</td>
                        <td>{{ $identity->study_program }}</td>
                        <td>{{ $identity->semester}}</td>
                        <td>{{ $identity->phone }}</td>
                        <td>{{ $identity->address }}</td>
                        {{-- <td><span class="status In-Active">Inactive</span></td> --}}
                        {{-- <td>
                            <span><button class="btn-act">Disable</button></span>
                        </td>  --}}
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
