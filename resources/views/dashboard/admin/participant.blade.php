@extends('layouts.master-menu')

@section('title', 'Participant Data')

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
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('indexAdmin') }}">Dashboard</a>
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
                        <th>No</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Brith</th>
                        <th>KTP/KTM</th>
                        <th>Identity Number</th>
                        <th>Category</th>
                        <th>Major</th>
                        <th>Study Program</th>
                        <th>Semester</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participant as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->birth_date}}</td>
                        <td>{{ $student->identity_type }}</td>
                        <td>{{ $student->identity_num }}</td>
                        <td>{{ $student->category }}</td>
                        <td>{{ $student->major }}</td>
                        <td>{{ $student->study_program }}</td>
                        <td>{{ $student->semester}}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->address }}</td>
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
