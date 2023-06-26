@extends('layouts.master-menu')

@section('title', 'Edit Schedules')

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
        <h1>Schedule Status</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alrt-success" role="alert" id="alert">
            {{ session('success') }}
            <i class='bx bx-x' id="icon" onclick="hideAlert()"></i>
        </div>
    @endif
    <form action="{{ route('updateSchedule') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $test->id }}">
        <div class="row">
            <div class="col">
                <input readonly type="date" name="date_test" id="date" @error('date_test') is-invalid @enderror required value="{{ $test->date_test}}">
                @error('date_test')
                    <div class="invalid-feedback">
                        {{  $message  }}
                    </div>
                @enderror
            </div>
            <div class="col">
                <select  name="type_test" id="test-type">
                    <option  value="{{ $test->id }}" {{$test->type_test == $test->id ? 'selected' : ''}}>{{ $test->type_test}}</option>
                </select>
            </div>
            <div class="col check">
                <input type="radio" id="status_test" name="status_test" value="0">
                <label for="status_test">Expired</label>
            </div>
            <div class="col">
                <button type="submit" onclick="return getData()">Edit</button>
            </div>
        </div>
    </form>
    {{-- <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Data</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $schedule->date_test }}</td>
                        <td>{{ $schedule->type_test }}</td>
                        @if ($schedule->status_test == 1)
                             <td><span class="status Active">{{ $schedule->status_test = 'Active' }}</span></td>    
                        @else
                             <td><span class="status In-Active">{{ $schedule->status_test = 'Expired' }}</span></td>    
                        @endif
                       <td>
                        <a href={{ "/menu-schedule/edit/".$schedule['id']}}>Disable</a>
                       </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
</main>

@endsection



        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

