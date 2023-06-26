@extends('layouts.master-menu')

@section('title', 'Result & Certification')

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
                        @foreach ($detail_tests as $detailtest)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $detailtest->name }}</td>
                            <td>{{ $detailtest->skor }}</td>
                            <td>{{ $detailtest->sertif_url }}</td>
                            @if ($detailtest->is_passed == 1 )
                                <td>{{ $detailtest->is_passed = 'Success'}}</td> 
                            @else
                                <td>{{ $detailtest->is_passed = 'Failed'}}</td>
                            @endif

                            <td><a href={{ "/menu-result/edit/".$detailtest['id']}}>Update</a></td>
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

