@extends('layouts.master-menu')

@section('title', 'User Identity ')

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
                    <a href="{{ route('indexParticipant') }}">Dashboard</a>
                </li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li>
                    <a class="active" href="{{ route('showProfile') }}">Profile</a>
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
        <form action="{{ route('showProfile') }}" method="post" enctype="multipart/form-data">
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
                        <a style="cursor: pointer" class="btn-edit" href={{route('editProfile', Auth::user()->id)}}>Update</a>
                    </div>
                </div>
                <div class="column right">
                    <h1>Personal Info</h1>
                    <div class="row-right">
                        <table class="table">
                            <tbody>
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
                                <th scope="row">Identity Number</th>
                                @foreach ($data as $identitas)
                                    <td>:{{ $identitas->identity_num }}</td>
                                @endforeach 
                              </tr>
                              <tr>
                                <th scope="row">Catgeory</th>
                                @foreach ($data as $identitas)
                                    <td>:{{ $identitas->category }}</td>
                                @endforeach 
                              </tr>
                              @foreach ($data as $identitas)
                              @if ($identitas->category == 'Student')
                                <tr>
                                    <th scope="row">Major</th>
                                    <td>:{{ $identitas->major }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Study Program</th>
                                    <td>:{{ $identitas->study_program }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Semester</th>
                                    <td>:{{ $identitas->semester }}</td>
                                </tr>  
                              @endif
                              @endforeach 
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

