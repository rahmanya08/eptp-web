@extends('layouts.master-menu')

@section('title', 'Test Card')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-theme.css') }}">
@endpush

{{-- @push('profile')
    @foreach ($identities as $identity)
        @if ($identity->image != null)
            <img src="{{ asset('storage/images/users/'.$identity->image) }}">
        @else
            <img src="{{ asset('img/nopic.png') }}" alt="" id="profile">
        @endif
    @endforeach
@endpush --}}


@section('main-content')

<main>
    <form action="{{ route('convertPdf') }}" method="" enctype="">
        <h1>Test Card</h1>
        <div class="test-card">
            {{-- <div class="fill-card">
                <table class="table-card">
                    <tbody>
                        <tr>
                            <h1 style="text-align:center">Test Card</h1>
                            <h4 style="text-align:center">UPT Bahasa Politeknik Negeri Cilacap</h4>
                        </tr>
                        <tr>
                          <td rowspan="6">
                            <div class="photo">
                            @foreach ($identities as $identity)
                                @if ($identity->image != null)
                                    <img src="{{ asset('storage/images/users/'.$identity->image) }}">
                                @else
                                    <img src="{{ asset('img/nopic.png') }}" alt="" id="profile">
                                @endif
                            @endforeach
                            </div>
                          </td>
                        </tr>
                        @foreach ($payments as $payment)
                        <tr>
                          <th>No Registration</th>
                          <td  value="{{ auth()->user()->id }}">:{{$payment->created_at->format('Ymd His')}}</td>
                        </tr>
                        @endforeach
                        @foreach ($users as $user)
                        <tr>
                            <th>Name</th>
                            <td>:{{$user->name }}</td>
                        </tr>   
                        <tr>
                            <th>Birth Date</th>
                            <td>:{{$user->birth_date}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>:{{$user->phone}}</td>
                        </tr>
                        @endforeach
                        @foreach ($payments as $payment)
                        <tr>
                            <th>Schedule</th>
                            <td>:{{$payment->date_test}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div> --}}
            {{-- <div>
                <a class="btn-convert" href="{{ route('convertPdf') }}">Download</a>
            </div>  --}}
        </div>
    </form>
</main>
@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush


