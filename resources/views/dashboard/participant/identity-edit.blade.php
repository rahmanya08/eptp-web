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
                    <a class="active" href="{{ route('saveOrUpdate') }}">Pofile</a>
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
        <form action="{{ route('saveOrUpdate') }}" method="post" enctype="multipart/form-data">
           @csrf
            <div class="row-from">
                <div class="column left">
                    @include("partials.up-profile")
                </div>
                <div class="column right">
                    <h1>Personal</h1>
                    @if ($user->user_identity && $user->user_identity->id)
                        <input type="hidden" name="id" value="{{ $user->user_identity->id }}">
                    @else
                        <input type="hidden" name="id" value="">
                    @endif
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="gender">Gender</label><br>
                            <div class="radio_btn">
                                @if ($user->user_identity && $user->user_identity->gender)
                                    <input type="radio" name="gender" id="male" value="male"  {{ $user->user_identity->gender == 'male' ? 'checked' :'' }} required>
                                    <label for="male">Male</label>
                                    <input type="radio" name="gender" id="female"  value="female" {{ $user->user_identity->gender == 'female' ? 'checked' : ''}} required>
                                    <label for="female">Female</label>
                                @else
                                    <input type="radio" name="gender" id="male" value="male" required>
                                    <label for="male">Male</label>
                                    <input type="radio" name="gender" id="female"  value="female" required>
                                    <label for="female">Female</label>
                                @endif  
                            </div>
                        </div>
                    </div>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="birth">Birth Date</label>
                            @if ($user->user_identity && $user->user_identity->birth_date)
                                <input type="date" name="birth_date" @error('birth_date') is-invalid @enderror required value="{{ $user->user_identity->birth_date}}">
                            @else
                                <input type="date" name="birth_date" value="">
                            @endif 
                            @error('birth_date')
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
                                @if ($user->user_identity && $user->user_identity->identity_type)
                                    <input type="radio" name="identity_type" id="ktp" value="ktp"  {{ $user->user_identity->identity_type == 'ktp' ? 'checked' :'' }} required>
                                    <label for="ktp">KTP</label>
                                    <input type="radio" name="identity_type" id="ktm"  value="ktm" {{ $user->user_identity->identity_type == 'ktm' ? 'checked' :'' }} required>
                                    <label for="ktm">KTM</label>
                                @else
                                    <input type="radio" name="identity_type" id="ktp" value="KTP">
                                    <label for="ktp">KTP</label>
                                    <input type="radio" name="identity_type" id="ktm" value="KTM">
                                    <label for="ktm">KTM</label>
                                @endif  
                            </div>
                        </div>
                    </div>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="id_number">Identity Number</label>
                            @if ($user->user_identity && $user->user_identity->identity_num)
                                <input  type="text" name="identity_num" @error('identity_num') is-invalid @enderror required value="{{$user->user_identity->identity_num}}">
                            @else
                                <input type="text" name="identity_num" value="">
                            @endif  
                        </div>
                        @error('identity_num')
                        <div class="invalid-feedback">
                            {{  $message  }}
                        </div>
                        @enderror
                    </div>
                    <h1>Test</h1>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="status">Category</label>
                            @if ($user->user_identity && $user->user_identity->category)
                                <select name="category">
                                    <option value="{{ $user->user_identity->category }}" {{ $user->user_identity->position == $user->user_identity->id ? 'selected' : ''}}>{{ $user->user_identity->category }}</option>       
                                    {{-- <option value="2">Staff</option>
                                    <option value="1">Head Staff</option> --}}
                                </select>
                            @else
                                <select name="category" id="roleSelect">
                                    <option selected>Choose Category</option>
                                    <option value="1">Student</option>       
                                    <option value="2">Employee</option>
                                    <option value="3">Public</option>                                       
                                </select>
                            @endif 
                        </div>
                    </div>
                    <div class="row-right">
                        <div class="col-right">
                            <div class="input-warp">
                                <div class="input-warp hidden student-fields">
                                    <select name="major" aria-label="Default select example">
                                        <option selected>Major</option>
                                        <option value="T. Infromatika">T. Infromatika</option>
                                        <option value="T. Listrik">T. Listrik</option>
                                        <option value="T. Elektro">T. Elektro</option>
                                        <option value="T. Mesin">T. Mesin</option>
                                        <option value="T. Lingkungan">T. Lingkungan</option>
                                        <option value="Agroindustri">Agroindustri</option>
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
                                        <option value="D4-TPPL">D4-TPPL</option>
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
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1>Contact</h1>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="phonenum">Phone Number</label>
                            @if ($user->user_identity && $user->user_identity->phone)
                                <input type="text" name="phone" id="phone" @error('phone') is-invalid @enderror required value="{{ $user->user_identity->phone }}">
                            @else
                                <input type="text" name="phone" value="">
                            @endif  
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
                            @if ($user->user_identity && $user->user_identity->address)
                                <input type="text-area" name="address" id="address" @error('address') is-invalid @enderror required value="{{ $user->user_identity->address }}">
                            @else
                                <input type="text" name="address" value="">
                            @endif 
                            @error('address')
                            <div class="invalid-feedback">
                                {{  $message  }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="save-btn"  onclick="return getData()">Update</button>
                </div>
            </div>

        </form>
</main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

