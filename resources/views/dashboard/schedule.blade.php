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
    <form action="{{ route('schedule') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <input type="date" name="date" id="date" @error('date') is-invalid @enderror required value="{{ old('date') }}">
                @error('date')
                    <div class="invalid-feedback">
                        {{  $message  }}
                    </div>
                @enderror
            </div>
            <div class="col">
                <select name="type" id="test-type">
                    <option value="option1">Select Test Type</option>
                    <option value="option2">TOEFL</option>
                    <option value="option3">TOEIC</option>
                </select>
            </div>
            <div class="col">
                <button type="submit" onclick="return getData()">Add</button>
                <button type="submit" onclick="return getData()">Edit</button>
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
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $schedule->date_test }}</td>
                        <td>{{ $schedule->type_test }}</td>
                        <td><span class="status completed">Finish</span></td>
                    </tr>
                    @endforeach
                    {{-- <td>
                        <div class="animated-progress progress-blue">
                            <span data-progress="90"></span>
                        </div>
                    </td> --}}
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection



        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

