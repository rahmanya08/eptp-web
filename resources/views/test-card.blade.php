@extends('layouts.master-form')

@section('title', 'Test Card')

@push('custom-css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('container')
        <form action="#">
        <div class="tab show">
            <img src="#" alt="">
                <h2>Test Card</h1>
                <h2>English Profiency Test - PNC</h2>
                <h2>EPT-P</h2>
                @csrf
                <div class="form">
                    <div class="container-img">
                        <div class="img-show">
                            <i class='bx bx-image-alt img'></i>
                        </div> 
                    </div>
                </div>
                <div class="form">
                    <label for="name" class="form-label">Registration Number</label>
                    <div class="fill-in"></div>
                </div>
                <div class="form">
                    <label for="name" class="form-label">Name</label>
                    <div class="fill-in"></div>
                </div>
                <div class="form">
                    <label for="Identitiy Number" class="form-label">Identitiy Number</label>
                    <div class="fill-in"></div>
                </div>
                <div class="form">
                    <label for="Gender" class="form-label">Gender</label>
                    <div class="fill-in"></div>
                </div>
                <div class="form">
                    <label for="Schedule" class="form-label">Schedule</label>
                    <div class="fill-in"></div>
                </div>
                <div class="download">
                <button type="button">Download</button>
                </div>
            </div>
        </form>
@endsection

@push('child-js')
    <script src="{{ asset('js/register.js') }}"></script>
@endpush