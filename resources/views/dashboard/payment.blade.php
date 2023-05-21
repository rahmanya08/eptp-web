@extends('layouts.master-menu')

@section('title', 'Payment')

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
                    <a class="active" href="{{ route('payment') }}">Payment</a>
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
                        <th>Name</th>
                        <th>Date</th>
                        <th>Attacment</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Validator</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>Ian Somerhalder</p>
                        </td>
                        <td>10-05-2023</td>
                        <td>
                            <span>Filename.jpg<a href="#">view</a></span>
                        </td>
                        <td><span class="status Active">Verified</span></td>
                        <td>
                            <span><button class="btn-act">Verify</button></span>
                        </td>
                        <td>ID User as Staff</td>
                    </tr>
                    <tr>
                        <td>
                            <p>Akin Akinozu</p>
                        </td>
                        <td>10-05-2023</td>
                        <td>
                            <span>Filename.jpg<a href="#">view</a></span>
                        </td>
                        <td><span class="status Active">Verified</span></td>
                        <td>
                            <span><button class="btn-act">Verify</button></span>
                        </td>
                        <td>ID User as Staff</td>
                    </tr>
                    <tr>
                        <td>
                            <p>Can Yaman</p>
                        </td>
                        <td>20-05-2023</td>
                        <td>
                            <span>Filename.jpg<a href="#">view</a></span>
                        </td>
                        <td><span class="status In-Active">Unverified</span></td>
                        <td>
                            <span><button class="btn-act">Verify</button></span>
                        </td>
                        <td>ID User as Staff</td>
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
