@extends('layouts.master-menu')

@section('title', 'User Identity ')

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
                    <a class="active" href="{{ route('identity') }}">Identity</a>
                </li>
            </ul>
        </div>
    </div>
        <form action="{{ route('identity') }}" method="post">
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
                            <input type="text" placeholder="Enter Name" name="name" id="name" @error('name') is-invalid @enderror required value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{  $message  }}
                            </div>
                            @enderror
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
                            <input type="date" name="birth" @error('birth') is-invalid @enderror required value="{{ old('birth') }}">
                            @error('birth')
                            <div class="invalid-feedback">
                                {{  $message  }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="identity">Identity Type</label><br>
                            <div class="radio_btn">
                                <input type="radio" name="identity" id="ktp" value="KTP">
                                <label for="ktp">KTP</label>
                                <input type="radio" name="identity" id="ktm" value="KTM">
                                <label for="ktm">KTM</label>
                            </div>
                        </div>
                    </div>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="id_number">Identity Number</label>
                            <input type="text" name="id_number" @error('id_number') is-invalid @enderror required value="{{ old('id_number') }}">
                        </div>
                        @error('id_number')
                        <div class="invalid-feedback">
                            {{  $message  }}
                        </div>
                        @enderror
                    </div>
                    <h1>Test</h1>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="status">Category</label>
                            <select id="roleSelect" aria-label="Default select example">
                                <option selected>Choose Categori</option>
                                <option value="1">Students</option>                                       
                                <option value="2">Public</option>      
                            </select>
                        </div>
                    </div>
                    <div class="row-right">
                        <div class="col-right">
                            <div class="input-warp">
                                <div class="input-warp hidden student-fields">
                                    <select aria-label="Default select example">
                                        <option selected>Major</option>
                                        <option value="1">T. Infromatika</option>
                                        <option value="2">T. Listrik</option>
                                        <option value="3">T. Elektro</option>
                                        <option value="3">T. Mesin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-right">
                            <div class="input-warp">
                                <div class="input-warp hidden student-fields">
                                    <select  aria-label="Default select example">
                                        <option selected>Study Program</option>
                                        <option value="1">D3-TI</option>
                                        <option value="2">D3-TL</option>
                                        <option value="3">D3-TE</option>
                                        <option value="3">D3-TM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-right">
                            <div class="input-warp">
                                <div class="input-warp hidden student-fields">
                                    <select aria-label="Default select example">
                                        <option selected>Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="3">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1>Contact</h1>
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
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="phonenum">Phone Number</label>
                            <input type="text" name="phonenum" id="phonenum" @error('phonenum') is-invalid @enderror required value="{{ old('phonenum') }}">
                            @error('phonenum')
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

