@extends('layouts.master-menu')

@section('title', 'Payment Verification')

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
        <h1>Payment Verification</h1>
    </div>
    <p>Periksa bukti bayar kemudian check dibawah bukti bayar. Pastikan tanggal pembayaran sesuai! </p>
    <form action="{{ route('updateStatus') }}" method="post">
       @csrf
       <input type="hidden" name="id" value="{{ $data['id'] }}">
       <img src="{{ asset('storage/images/payments/'.$data->pay_url) }}" alt="" style="width: 40%">
       <div class="check-pay">
            <input type="checkbox" id="verify" name="verify" value="1" {{ $isChecked ? 'checked' : '' }}>
            <label for="verify"><span style="font-style: italic">check verification</span> untuk menyetuji bukti bayar peserta</label><br><br>
       </div>
       <button type="submit" style="cursor: pointer">Verified</button>       
    </form>
 

</main>

@endsection

        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush
