@extends('layouts.master-menu')

@section('title', 'Test Card')

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
        <div class="left">
            <h2>Detail Participant</h2>
        </div>
    </div>
    <div>
        <table>
            <tbody>
                <tr>
                    <td rowspan="10">
                         <div class="photo-card">
                         @foreach ($image as $img)
                             @if ($img->image != null)
                                 <img src="{{ asset('storage/images/users/'.$img->image) }}">
                             @else
                                 <img src="{{ asset('img/nopic.png') }}" alt="" id="profile">
                             @endif
                         @endforeach
                         </div>
                       </td>
                     </tr>
                     <tr>
                       <th style="margin-top: 15px">Registration No</th>
                       @foreach ($data as $payment)
                          <td>:{{ $payment->registration}}</td>
                       @endforeach
                     </tr>
                     <tr>
                         <th>Name</th>
                         @foreach ($users as $user)
                             <td>:{{$user->name }}</td>
                         @endforeach
                     </tr>   
                     <tr>
                         <th>Birth Date</th>
                         @foreach ($users as $user)
                         <td>:{{$user->birth_date}}</td>
                         @endforeach
                     </tr>
                     <tr>
                         <th>Gender</th>
                         @foreach ($users as $user)
                         <td>:{{$user->gender}}</td>
                         @endforeach
                     </tr>
                     <tr>
                         <th>Type of ID</th>
                         @foreach ($users as $user)
                         <td>:{{$user->identity_type}}</td>
                         @endforeach
                     </tr>
                     <tr>
                         <th>ID Number</th>
                         @foreach ($users as $user)
                         <td>:{{$user->identity_num}}</td>
                         @endforeach
                     </tr>
                     <tr>
                         <th>Test Date</th>
                         @foreach ($data as $payment)
                             <td>:{{$payment->date_test}}</td>
                         @endforeach
                     </tr>
            </tbody>
        </table>
    </div>
    <form action="{{ route('updateValidate') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($test->date_validation == null)
            <input type="hidden" name="detailtests_id" value="{{ $test->id }}">
            <div>
                <input type="checkbox" name="checkbox" value="1">
                <label for="date_validation">Already Checked</label>
            </div>
            <div>
                <button style="cursor: pointer" type="submit" class="btn-upload">Validate</button>
            </div>
        @endif 
    </form>
</main>
@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/card.js') }}"></script>
    
@endpush


