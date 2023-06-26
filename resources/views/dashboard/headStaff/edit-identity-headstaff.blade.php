@extends('layouts.master-menu')

@section('title', 'Staff Identity ')

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
                    <a href="{{ route('indexheadStaff') }}">Dashboard</a>
                </li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li>
                    <a class="active" href="{{ route('saveUpdate') }}">Profile</a>
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
        <form action="{{ route('saveUpdate') }}" method="post" enctype="multipart/form-data">
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
                    <h1>Office</h1>
                    <div class="row-right">
                        <div class="input-warp">
                            <label for="status">Position</label>
                            @if ($user->user_identity && $user->user_identity->position)
                                <input readonly type="text" name="position"  id="position" value="{{ $user->user_identity->position }}">
                            @else
                                <input readonly type="text" name="position"  id="position" value="Head Staff">
                            @endif 
                        </div>
                    </div> 
                        <div class="row-right">
                            <div class="input-warp">
                                <label for="id_number">NIP</label>
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

