@extends('layouts.master-menu')

@section('title', 'Result & Certification')

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
                    <a href="{{ route('indexStaff') }}">Dashboard</a>
                </li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li>
                    <a class="active" href="{{ route('result') }}">Result</a>
                </li>
            </ul>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alrt-success" role="alert" id="alert">
            <i class='bx bxs-check-circle'></i>
            {{ session('success') }}
            <i class='bx bx-x' id="icon" style="cursor: pointer" onclick="hideAlert()"></i>
        </div>
    @endif
    <form action="{{ route('result') }}" method="post">
        @csrf
        <div style="margin-top: 30px">
            <p>Silahkan pilih tanggal tes yang telah selesai untuk menampilkan daftar peserta</p>
            <p>Kemudian pilih peserta untuk melakukan check kehadiran peserta tes.</p>
        </div>
        <div class="row-4">
            <div class="col">
                <label for="">Date Test</label>
                <select name="date_test" id="date_test">
                    <option value="">Test Date</option>
                    @foreach ($schedule as $data)
                        <option>{{$data->date_test}}</option>
                    @endforeach
                </select> 
            </div>
            <div class="col">
                <label for="">Participant List</label>
                <select name="name" id="name">
                    <option value="">Participant</option>
                    @foreach ($list as $data)
                        <option value="{{ $data->name }}" data-id="{{ $data->id }}">{{$data->name}}</option>
                    @endforeach
                </select> 
            </div>
            <input hidden type="text" name="id" id="idInput" value="">
            <div class="check">
                <label for="">Attendance</label>
                <div class="attend stand">
                    <input type="radio" name="present" id="1" value="1">
                    <label for="1">Hadir</label>
                    <input type="radio" name="present" id="0" value="0">
                    <label for="0">Tidak Hadir</label>
                </div>
            </div>
            <div class="col">
                <button type="submit" onclick="showToast()" onclick="return getData()">Present</button>
            </div>
        </div>
    </form>
    {{-- Menampilkan Data Peserta yang telah hadir  --}}
    <div class="table-data">
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
                        <th>Name</th>
                        <th>Total Score</th>
                        <th>Attacment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($detail_tests as $detailtest)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $detailtest->name }}</td>
                            <td>{{ $detailtest->skor }}</td>
                            <td>{{ $detailtest->sertif_url }}</td>
                            @if ($detailtest->is_passed == 1 )
                                <td><span class="status Active">{{ $detailtest->is_passed = 'Success'}}</span></td> 
                            @else
                                <td><span class="status In-Active">{{ $detailtest->is_passed = 'Failed'}}</span></td>
                            @endif
                            @if($detailtest->present == 1)
                                <td><a class="btn-edit" href={{ "/menu-result/edit/".$detailtest['id']}}>Update</a></td>
                            @else
                                <td><span class="status In-Active">Untested</span></td>
                            @endif
                        </tr> 
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
        document.getElementById('name').addEventListener('change', function () {
            var selectedId = this.options[this.selectedIndex].getAttribute('data-id');
            document.getElementById('idInput').value = selectedId || '';
        });
    </script>
@endpush

