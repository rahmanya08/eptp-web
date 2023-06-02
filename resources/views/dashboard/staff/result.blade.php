@extends('layouts.master-menu')

@section('title', 'Result & Certification')

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
                    <a class="active" href="{{ route('result') }}">Result</a>
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
    <form action="{{ route('result') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row-4">
            <div class="col">
                <select class="form-select" name="user_id" id="name">
                    @foreach ($users as $user)
                        <option value="{{ $user->user_id }}">{{  $user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="number" name="skor" id="skor" placeholder="Add Score...." >
            </div>
            <div class="col-file">
                <input type="file" name="sertif_url" id="sertif_url" accept=".pdf">
            </div>
            <div class="col">
                <button type="submit" class="btn-upload" onclick="return getData()">Add</button>
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
                        <th>Name</th>
                        <th>Score</th>
                        <th>Attacment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($results as $result)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $result->name }}</td>
                            <td>{{ $result->skor }}</td>
                            <td>{{ $result->sertif_url }}</td>
                            @if ($result->result_skor == 1 )
                                <td>{{ $result->result_status = 'Passed'}}</td> 
                            @else
                                <td>{{ $result->result_status = 'Failed'}}</td>
                            @endif
                            <td><a href="#">Success</a></td>
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

