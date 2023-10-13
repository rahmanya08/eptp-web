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
    @if (session()->has('failed'))
    <div class="alert alrt-danger" role="alert" id="alert">
        <i class='bx bx-x-circle'></i>
        {{ session('failed') }}
        <i class='bx bx-x' id="icon" style="cursor: pointer" onclick="hideAlert()"></i>
    </div>
    @endif
    <form action="{{ route('updateResult') }}" method="post" enctype="multipart/form-data">
        @csrf
        <p style="margin-top: 20px"> Isi skor peserta yang telah dikonversi dan dihitung atau skor akhir dari setiap 
            <span style="font-style: italic">section</span> pada soal tes.
        <br>Dan unggah file sertifikat dengan ukuran maksimal <span style="font-weight: bold">5 MB</span></p>
        
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="row-4">
            <div class="col">
                <label for="">Score</label>
                <input type="text" name="skor" id="skor" required value="{{ old('skor',$data->skor) }}">
                @error('skor')
                   <div class="invalid-feedback">
                     {{  $message  }}
                   </div>
                @enderror
            </div>
            <div class="col col-file">
                <label for="">Certificate</label>
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

