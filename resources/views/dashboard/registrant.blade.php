@extends('layouts.master-menu')

@section('title', 'Registration Data')

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
                    <a href="{{ route('indexStaff') }}">Dashboard</a>
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
                        <th>No Registration</th>
                        <th>Name</th>
                        <th>Test Type</th>
                        <th>Test Date</th>
                        <th>Validate by Head Staff</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $registrant)
                    <tr>
                        <td>{{$registrant->registration}}</td>
                        <td>{{$registrant->name }}</td>
                        <td>{{$registrant->type_test }}</td>
                        <td>{{$registrant->date_test }}</td>
                        @if ($registrant->date_validation !== null )
                            <td><span class="status Active">Validate at: {{$registrant->date_validation}}</span></td>
                        @else
                            <td><span class="status In-Active">Un-Validate</span></td>
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
@endpush
