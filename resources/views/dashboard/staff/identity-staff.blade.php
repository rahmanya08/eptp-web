@extends('layouts.master-menu')

@section('title', 'Staff Identity ')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
@endpush

@push('profile')
    <a href="#">
        <img src="{{ asset('img/Murat.jpeg') }}">
        {{-- <img src="{{ asset('storage/images/users/'.$identities->image) }}"> --}}
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
                    <a class="active" href="{{ route('identityStaff') }}">Identity</a>
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
        <form action="{{ route('identityStaff') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row-from">
                <div class="column left">
                    @include("partials.up-profile")
                </div>
                <div class="column right">
                    <h1>Personal</h1>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="name">Name</label>
                            <input readonly type="text"  name="name" id="name" value="{{ auth()->user()->name }}">
                        </div>
                    </div>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="gender">Gender</label><br>
                            <div class="radio_btn">
                                <input type="radio" name="gender" id="male" value="male" required >
                                <label for="male">Male</label>
                                <input type="radio" name="gender" id="female" value="female" required>
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="birth">Birth Date</label>
                            <input type="date" name="birth_date" @error('birth_date') is-invalid @enderror required value="{{ old('birth_date') }}">
                            @error('birth_date')
                            <div class="invalid-feedback">
                                {{  $message  }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row-right">
                        <div class="input-warp">
                            <label for="identity">Identity Type</label><br>
                            <div class="radio_btn">
                                <input type="radio" name="identity_type" id="ktp" value="KTP">
                                <label for="ktp">KTP</label>
                                <input type="radio" name="identity_type" id="ktm" value="KTM">
                                <label for="ktm">KTM</label>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="id_number">NIP</label>
                            <input  type="text" name="identity_num" @error('identity_num') is-invalid @enderror required value="{{ old('identity_num') }}">
                        </div>
                        @error('identity_num')
                        <div class="invalid-feedback">
                            {{  $message  }}
                        </div>
                        @enderror
                    </div>
                    <h1>Office</h1>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="status">Position</label>
                            <select name="position" aria-label="Default select example">
                                <option selected>Choose Position</option>
                                <option value="1">Head Staff</option>       
                                <option value="2">Staff</option>
                                {{-- <option value="3">Public</option>--}}
                            </select>
                        </div>
                    </div>
                    {{-- <div class="row-right">
                        <div class="col-right">
                            <div class="input-warp">
                                <div class="input-warp hidden student-fields">
                                    <select name="major" aria-label="Default select example">
                                        <option selected>Major</option>
                                        <option value="T. Infromatika">T. Infromatika</option>
                                        <option value="T. Listrik">T. Listrik</option>
                                        <option value="T. Elektro">T. Elektro</option>
                                        <option value="T. Mesin">T. Mesin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-right">
                            <div class="input-warp">
                                <div class="input-warp hidden student-fields">
                                    <select name="study_program"  aria-label="Default select example">
                                        <option selected>Study Program</option>
                                        <option value="D3-TI">D3-TI</option>
                                        <option value="D3-TL">D3-TL</option>
                                        <option value="D3-TE">D3-TE</option>
                                        <option value="D3-TM">D3-TM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-right">
                            <div class="input-warp">
                                <div class="input-warp hidden student-fields">
                                    <select name="semester" aria-label="Default select example">
                                        <option selected>Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="3">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <h1>Contact</h1>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="phonenum">Phone Number</label>
                            <input type="text" name="phone" id="phone" @error('phone') is-invalid @enderror required value="{{ old('phone') }}">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{  $message  }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="address">Address</label>
                            <input type="text-area" name="address" id="address" @error('address') is-invalid @enderror required value="{{ old('address') }}">
                            @error('address')
                            <div class="invalid-feedback">
                                {{  $message  }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="save-btn"  onclick="return getData()">Save</button>
                </div>
            </div>

        </form>
</main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

