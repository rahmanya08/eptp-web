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
    @if (session()->has('success'))
        <div class="alert alrt-success" role="alert" id="alert">
            {{ session('success') }}
            <i class='bx bx-x' id="icon" onclick="hideAlert()"></i>
        </div>
    @endif
    <form action="{{ route('schedule') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <input type="date" name="date_test" id="date" @error('date_test') is-invalid @enderror required value="{{ old('date_test') }}">
                @error('date_test')
                    <div class="invalid-feedback">
                        {{  $message  }}
                    </div>
                @enderror
            </div>
            <div class="col">
                <select name="type_test" id="test-type">
                    <option value="toefl">TOEFL</option>
                    <option value="ibt">IBT</option>
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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $schedule->date_test }}</td>
                        <td>{{ $schedule->type_test }}</td>
                        @if ($schedule->status_test == 1)
                            <td>{{ $schedule->status_test = 'Active' }}</td>
                        @else
                            <td>{{ $schedule->status_test = 'Non-Active' }}</td>
                        @endif
                       <td>
                        <a href="#">Disable</a>
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
