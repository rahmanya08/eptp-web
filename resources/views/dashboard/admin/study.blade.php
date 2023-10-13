@extends('layouts.master-menu')

@section('title', 'Study')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
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
                    <a href="{{ route('indexAdmin') }}">Dashboard</a>
                </li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li>
                    <a class="active" href="{{ route('indexStudy') }}">Study Program</a>
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
    <form action="{{ route('storeStudy') }}" method="post">
        @csrf
        <div class="row-study">
            <div class="col">
                <label for="">Study Program</label>
                <input type="input" name="name_study" id="name_study" @error('name_study') is-invalid @enderror  value="{{ old('name_study') }}">
                @error('name_study')
                    <div class="invalid-feedback">
                        {{  $message  }}
                    </div>
                @enderror
            </div>
            <div class="col-btn">
                <button type="submit" style="cursor: pointer" onclick="showToast()" onclick="return getData()">Add</button>
            </div>
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
                        <th>Study Program</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($study as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name_study}}</td>
                       <td>
                            {{-- <a style="cursor: pointer" class="btn-edit" href={{route('editStudy', $data->id)}}>Edit Data</a> --}}
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

