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
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('indexParticipant') }}">Dashboard</a>
                </li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li>
                    <a class="active" href="{{ route('testcard') }}">Test Card</a>
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
    <form action="{{ route('testcard') }}" method="" enctype="">
        <div class="test-card" id="card">
            <div class="fill-card" >
                <div class="head-card">
                    <div class="logo-pnc ">
                        <img src="{{ asset('img/pnc.png') }}" alt="">
                    </div>
                    <div class="kop">
                        <h1 style="text-align:center">Test Card</h1>
                        <h4 style="text-align:center">UPT Bahasa Politeknik Negeri Cilacap</h4>
                    </div>
                    <div class="logo-upt ">
                        <img src="{{ asset('img/upt.jpg') }}" alt="">
                    </div>
                </div>
                <table class="table-card">
                    <tbody style="border: 1px solid">
                        <tr>
                          <td rowspan="10">
                            <div class="photo-card">
                            @foreach ($profile as $img)
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
                             <td>:{{ $payment->created_at->format('ym') . str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</td>
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
                        <tr>
                            <th></th>
                            <td>Cilacap,{{ $payment->date_validation}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>Head of UPT Bahasa</td>
                            <td></td>
                        </tr>
                        @foreach ($data as $payment)
                        <tr>
                            <th rowspan="3"></th>
                                <td></td>
                                @if ($payment->date_validation != null)
                                    <td><img src="{{ asset('img/qr.png') }}" alt="" id="qr"></td>
                                @endif
                                
                            </tr>
                        @endforeach
                        @foreach ($headstaff as $head)
                        <tr>
                            <th></th>  
                            <td>{{$head->name}}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>NPAK:{{$head->identity_num}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="sign-head">
                    <h5>Head of UPT Bahasa</h5>
                </div> --}}
            </div>
        </div> 
        <button id="toPDF" onclick="window.print()" class="btn btn-lg btn-primary mb-5" style="cursor: pointer">Download</button>
    </form>
</main>
@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"></script>
    <script src="{{ asset('js/card.js') }}"></script>
    
@endpush


