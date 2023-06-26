@extends('layouts.master-menu')

@section('title', 'User Data')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
@endpush

@push('profile')
    @foreach ($identities as $identity)
        @if ($identity->image != null)
            <img src="{{ asset('storage/images/users/'.$identity->image) }}">
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
                    <a href="{{ route('indexAdmin') }}">Dashboard</a>
                </li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li>
                    <a class="active" href="{{ route('user') }}">User Data</a>
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
                        <th>Email</th>
                        {{-- <th>Password</th> --}}
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="tabel">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->email }}</td>
                        {{-- <td>{{ $user->password }}</td> --}}
                        <td>{{ $user->role }}</td>
                        @if ($user->status_user == 1)
                        <td><span class="status Active">{{ $user->status_user = 'Active' }}</span></td>
                        @else
                        <td><span class="status In-Active">{{ $user->status_user = 'Non-Active' }}</span></td>
                        @endif
                        <td>
                            <span><a href={{"/menu-user-data/status/".$user['id']}} class="btn-edit" style="color: white">Unactive</a></span>
                        </td> 
                        {{-- <td>
                            <form action="{{ route('unactive') }}" method="post" class="changed-btn">
                                @csrf
                                <button type="submit" class="btn-edit" style="width: auto">
                                    Unactive
                                </button>
                            </form>
                        </td> --}}
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
