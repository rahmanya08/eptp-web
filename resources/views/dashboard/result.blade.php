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
    <div class="row-4">
        <div class="col">
            <input type="search" name="name" id="name" placeholder="Type a name...." >
        </div>
        <div class="col">
            <input type="number" name="score" id="score" placeholder="Add Score...." >
        </div>
        <div class="col-file">
            <input type="file" name="certif" id="certif" accept=".pdf">
        </div>
        <div class="col">
            <a href="#" class="btn-upload" >
                <span class="text">Upload</span>
            </a>
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
                        <th>Name</th>
                        <th>Score</th>
                        <th>Attacment</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Akin Akinozu</td>
                        <td>500</td>
                        <td>
                            <span>Filename.pdf<a href="#">view</a></span>
                        </td>
                        <td><span class="status passed">Passed</span></td>
                    </tr>
                    <tr>
                        <td>Burak Deniz</td>
                        <td>510</td>
                        <td>
                            <span>Filename.pdf<a href="#">view</a></span>
                        </td>
                        <td><span class="status passed">Passed</span></td>
                    </tr>
                    <tr>
                        <td>Halil Bozdag</td>
                        <td>300</td>
                        <td>
                            <span>Filename.pdf<a href="#">view</a></span>
                        </td>
                        <td><span class="status failed">Failed</span></td>
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

