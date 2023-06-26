@extends('layouts.master-menu')

@section('title', 'Staff Identity ')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
@endpush

@push('profile')
    @foreach ($data as $identitas)
        @if ($identitas->image != null)
            <img src="{{ asset('storage/images/users/'.$identitas->image) }}">
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
                    <a class="active" href="{{ route('staffProfile') }}">Identity</a>
                </li>
            </ul>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alrt-success" role="alert" id="alert">
            <i class='bx bxs-check-circle'></i>
            {{ session('success') }}
            <i class='bx bx-x' id="icon" onclick="hideAlert()"></i>
        </div>
    @endif
        <form action="{{ route('staffProfile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="profile-box">
                <div class="column left">
                    <div class="preview-pic">
                        <div class="photo">
                            @foreach ($data as $identitas)
                                @if ($identitas->image != null)
                                    <img src="{{ asset('storage/images/users/'.$identitas->image) }}">
                                @else
                                    <img src="{{ asset('img/nopic.png') }}" alt="" id="profile">
                                @endif
                            @endforeach
                        </div>
                        <a style="cursor: pointer" class="btn-edit" href={{route('editStaff', Auth::user()->id)}}>Update</a>
                    </div>
                </div>
                <div class="column right">
                    <h3>Personal Info</h3>
                    <div class="row-right">
                        <table class="table">
                            <tbody class="head-tbl">
                              <tr>
                                <th scope="row">Name</th>
                                @foreach ($data as $identitas)
                                <td>:{{ $identitas->name }}</td>
                                @endforeach 
                              </tr>
                              <tr>
                                <th scope="row">Email</th>
                                @foreach ($data as $identitas)
                                <td>:{{ $identitas->email }} </td>
                                @endforeach 
                              </tr>
                              <tr>
                                <th scope="row">Birth Date</th>
                                @foreach ($data as $identitas)
                                <td>:{{ $identitas->birth_date }} </td>
                                @endforeach 
                              </tr>
                              <tr>
                                <th scope="row">NIP</th>
                                @foreach ($data as $identitas)
                                <td>:{{ $identitas->identity_num }}</td>
                                @endforeach 
                              </tr>
                              <tr>
                                <th scope="row">Phone</th>
                                @foreach ($data as $identitas)
                                <td>:{{ $identitas->phone }}</td>
                                @endforeach 
                              </tr>
                              <tr>
                                <th scope="row">Address</th>
                                @foreach ($data as $identitas)
                                <td>:{{ $identitas->address }}</td>
                                @endforeach 
                              </tr>
                              <tr>
                                <th scope="row">Position</th>
                                @foreach ($data as $identitas)
                                <td>:{{ $identitas->position }}</td>
                                @endforeach 
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>

        </form>
</main>

@endsection
        
@push('child-js')
   <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

