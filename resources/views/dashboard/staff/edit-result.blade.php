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
        <h1>Schedule Status</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alrt-success" role="alert" id="alert">
        {{ session('success') }}
        <i class='bx bx-x' id="icon" onclick="hideAlert()"></i>
    </div>
    @endif
    <form action="{{ route('updateResult') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="row-4">
            <div class="col">
                <select class="form-select" name="user_id" id="name">
                    @foreach ($users as $user)
                        <option value="{{ $user->user_id }}">{{  $user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="number" name="skor" id="skor" value="{{ $data->skor }}" >
            </div>
            <div class="col">
                <select class="form-select" name="is_passed" id="is_passed">
                    <option>Status</option>
                    <option value="0">Failed</option>
                    <option value="1">Success</option>
                </select>
            </div>
            <div class="col-file">
                <input type="file" name="sertif_url" id="sertif_url" accept=".pdf">
            </div>
            <div class="col">
                <button type="submit" class="btn-upload" onclick="return getData()">Update</button>
            </div>
        </div>
    </form>
</main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

