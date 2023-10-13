@extends('layouts.master-menu')

@section('title', 'Dashboard')

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
                    <a class="active" href="{{ route('indexParticipant') }}">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>

    <ul class="box-info">
        <li>
            <i class='bx bxs-download'></i>
            <span class="text">
                <h3>Test Card</h3>
                @if ($is_validate !== null)
                    <a href="{{route('testcard') }}" class="btn-download">Download</a>
                @elseif ($is_register !== null && $is_paid !==null )
                    <p style="font-size: 12px; color: var(--yellow);">Head Staff Validation
                    <br>Please wait until this sentences being <span style="font-weight: bold">Download Link</span></p>
                @elseif ($is_paid !==null)
                    <p style="font-size: 12px; color: var(--yellow);">Payment Verification
                    <br>Please wait until this sentences being <span style="font-weight: bold">Waiting for Validation</span></p>
                @else
                    <p style="font-size: 12px; color: var(--yellow);">Follow The Registration Rule</span></p>
                @endif
            </span>
        </li>
    </ul>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Term & Regulation</h3>
                {{-- <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i> --}}
            </div>
            <div>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde velit rerum fuga corporis odit dicta aliquid consequuntur deserunt eveniet, 
                    nam iure nesciunt vitae accusantium quisquam obcaecati voluptate sint quam? Quam:
                    <ul class="term-reg">
                        <li style="list-style-type: disc"> Consectetur nam qui, vitae, </li>
                        <li style="list-style-type: disc"> doloremque molestiae nihil fuga voluptatum.  </li>
                        <li style="list-style-type: disc"> Officiis id, molestiae corrupti doloribus tempore dolorum! Exercitationem.</li>
                        <li style="list-style-type: disc"> Consectetur nam qui, vitae,  </li>
                        <li style="list-style-type: disc"> doloremque molestiae nihil fuga voluptatum.</li>
                        <li style="list-style-type: disc"> Officiis id, molestiae corrupti doloribus tempore dolorum! Exercitationem. </li>
                    </ul>
                </p>
            </div>
            {{-- <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Test</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('img/ian (82).jpg') }}">
                            <p>Ian Somerhalder</p>
                        </td>
                        <td>TOEFL</td>
                        <td><span class="status completed">Finish</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('img/Akin Akinozu.jpg') }}">
                            <p>Akin Akinozu</p>
                        </td>
                        <td>TOEFL</td>
                        <td><span class="status almost">Soon</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('img/Can Yaman.jpg') }}">
                            <p>Can Yaman</p>
                        </td>
                        <td>TOEFL</td>
                        <td><span class="status un-completed">Start</span></td>
                    </tr>
                    
                </tbody>
            </table> --}}
        </div>

        <!--<div class="todo">
            <div class="head">
                <h3>Recent Data</h3>
                <i class='bx bx-plus'></i>
                <i class='bx bx-filter'></i>
            </div>
            <ul class="todo-list">
                <li class="complete">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </li>
                <li class="complete">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </li>
                <li class="un-complete">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </li>
                <li class="un-complete">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded'></i>
                </li>
            </ul>
        </div>-->

    </div>

</main>

@endsection



        
@push('child-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

