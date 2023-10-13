@extends('layouts.master-menu')

@section('title', 'Participant')

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
    <div class="table-box">
        <table>
            <tbody>
                @foreach ($tb_regist as $data)
                <tr>
                    <td rowspan="4">
                        <div class="img-validate">
                            <img src="{{ asset('storage/images/users/'.$data->image) }}">
                         </div>
                    </td>
                </tr>
                <tr>
                    <th style="margin-top: 15px">Registration No</th>
                    <td>:{{$data->registration}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>:{{$data->name }}</td>
                </tr>
                <tr>
                    <th>Test Date</th>
                    <td>:{{$data->date_test}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
    <form action="{{ route('updateValidate') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="detailtests_id" value="{{ $test['id'] }}">
        <div class="valid">
            <input type="checkbox" name="checkbox" value="1"{{ $test->date_validation ? 'checked' : '' }}>
            <label for="date_validation">Valid</label>
        </div>
        <div>
            <button style="cursor: pointer" type="submit" class="btn-upload">Validate</button>
        </div> 
    </form>
</main>
@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/card.js') }}"></script>
    
@endpush


