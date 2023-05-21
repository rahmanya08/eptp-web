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
                    <a class="active" href="{{ route('identity') }}">User Identity</a>
                </li>
            </ul>
        </div>
    </div>
        <form action="action_page.php">
            @csrf
            @include("partials.up-profile")
            <div class="container-form">
              <h1>Personal</h1>
              <p>Please fill in this form to continue the registration</p>
              <div class="input-warp">
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" id="name" required>
              </div>
              <div class="input-warp">
                <label for="gender"><b>Gender</b></label>
                <input type="radio" placeholder="Choose Gender" name="gender" id="gender"  value="female" required>
                <label for="male">Female</label>
                <input type="radio" placeholder="Choose Gender" name="gender" id="gender" value="male" required>
                <label for="male">Male</label>
              </div>
              <div class="input-warp">
                <label for="birth"><b>Birth Date</b></label>
                <input type="date" placeholder="brithdate" name="birth" id="psw-repeat" required>
              </div>
              <div class="input-warp">
                    <div class="row">
                        <div class="col">
                            <label for="identity">Identity Type</label><br>
                            <div class="radio_btn">
                                <input type="radio" name="identity" id="ktp" value="KTP">
                                <label for="ktp">KTP</label>
                                <input type="radio" name="identity" id="ktm" value="KTM">
                                <label for="ktm">KTM</label>
                            </div>
                        </div>
                        <div class="input_warp">
                            <label for="id_number">Identity Number</label>
                            <input type="id_number" name="id_number">
                        </div>
                    </div>
              </div>
              <div class="input-warp">
                <label for="status">Status</label>
                <select id="roleSelect" aria-label="Default select example">
                    <option selected>Choose Status</option>
                    <option value="1">Students</option>                                       
                    <option value="2">Public</option>      
                </select>
              </div>
              <div class="input-warp">
                <div class="row">
                    <div class="col">
                        <div class="input_warp hidden student-fields">
                            <select aria-label="Default select example">
                                <option selected>Major</option>
                                <option value="1">T. Infromatika</option>
                                <option value="2">T. Listrik</option>
                                <option value="3">T. Elektro</option>
                                <option value="3">T. Mesin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input_warp hidden student-fields">
                            <select  aria-label="Default select example">
                                <option selected>Study Program</option>
                                <option value="1">D3-TI</option>
                                <option value="2">D3-TL</option>
                                <option value="3">D3-TE</option>
                                <option value="3">D3-TM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input_warp hidden student-fields">
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
                 <button type="submit" class="registerbtn">Save</button>
            </div>
        </form>
</main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

