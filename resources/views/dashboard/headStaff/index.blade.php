@extends('layouts.master-menu')

@section('title', 'Dashboard')

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
                    <a href="{{ route('indexheadStaff') }}">Dashboard</a>
                </li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li>
                    <a class="active" href="{{ route('indexheadStaff') }}">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
    <ul class="box-info">
        <li>
            <i class='bx bxs-group'></i>
            <span class="text">
                <h3>{{ $regist }}</h3>
                <p>Registrant</p>
            </span>
        </li>
        <li>
            <i class='bx bx-calendar-edit'></i>
            <span class="text">
                <h3>{{ $schedule }}</h3>
                <p>Schedule</p>
            </span>
        </li>
        <li>
            <i class='bx bx-calendar-edit'></i>
            <span class="text">
                <h3>{{ $payment }}</h3>
                <p>Payment</p>
            </span>
        </li>
    </ul>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Active Schedule</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Responsibility</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tb_schedule as $schedule)
                    <tr>
                        <td>{{ $schedule->date_test}}</td>
                        <td>{{ $schedule->type_test}}</td>
                        <td>{{ $schedule->name }}</td>
                    </tr>      
                    @endforeach
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

