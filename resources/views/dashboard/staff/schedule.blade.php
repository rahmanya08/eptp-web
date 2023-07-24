@extends('layouts.master-menu')

@section('title', 'Schedules')

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

@php
    use Carbon\Carbon;
@endphp

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
                    <a class="active" href="{{ route('schedule') }}">Schedule</a>
                </li>
            </ul>
        </div>
    </div>
    @if (session()->has('failed'))
        <div class="alert alrt-danger" role="alert" id="alert">
            <i class='bx bx-x-circle'></i>
            {{ session('failed') }}
            <i class='bx bx-x' id="icon" style="cursor: pointer" onclick="hideAlert()"></i>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alrt-success" role="alert" id="alert">
            <i class='bx bxs-check-circle'></i>
            {{ session('success') }}
            <i class='bx bx-x' id="icon" style="cursor: pointer" onclick="hideAlert()"></i>
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
                <input type="time" name="time_test" id="time" @error('time_test') is-invalid @enderror required value="{{ old('time_test') }}">
                @error('time_test')
                    <div class="invalid-feedback">
                        {{  $message  }}
                    </div>
                @enderror
            </div>
            <div class="col">
                <select name="type_test" id="test-type">
                    <option value="toefl">TOEFL-ITP</option>
                    <option value="eptp">EPT-P</option>
                </select>
            </div>
            {{-- <div class="col">
                <input type="text" readonly name="user_id" id="user_id" @error('user_id') is-invalid @enderror required value="{{auth()->user()->name}}">
            </div> --}}
            <div class="col">
                <button type="submit" onclick="showToast()" onclick="return getData()">Add</button>
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
                        <th>Time</th>
                        <th>Type</th>
                        <th>Staff</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $schedule->date_test }}</td>
                        <td>
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $schedule->time_test)->format('H:i') }}
                        </td>                        
                        <td>{{ $schedule->type_test }}</td>
                        <td>{{ $schedule->name }}</td>
                        @if ($schedule->status_test == 0)
                             <td><span class="status Active">{{ $schedule->status_test = 'Active' }}</span></td>    
                        @else
                             <td><span class="status In-Active">{{ $schedule->status_test = 'Expired' }}</span></td>    
                        @endif
                       <td>
                        <a style="cursor: pointer" class="btn-edit" href={{route('editSchedule', $schedule->id)}}>Disable</a>
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

