@extends('layouts.master-menu')

@section('title', 'Schedule')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('css/dash-css.css') }}">
@endpush

@push('user')
    <div class="user-wrapper">
        <img src="{{ asset('img/Murat.jpeg') }}" width="40px" height="40px" alt="">
        <div>
            <h4>Murat Boz</h4>
            <small>Staff</small>
        </div>
    </div>
@endpush

@section('main-content')
            <main>
                <!--first-content-->
                <div class="cards-sc">
                    <label for="sche_date" class="form-label">Test Schedule</label>
                    <div class="row">
                        <div class="col">
                            <input type="date" class="selSchedule" placeholder="Last name" aria-label="Last name">
                        </div>
                        <div class="col">
                            <select class="selSchedule" id="testSelect" aria-label="Default select example">
                                <option selected>Select Type Test</option>
                                <option value="1">TOEFL</option>
                                <option value="2">TOEIC</option>
                                <option value="3">VIERRA</option>
                            </select>
                        </div>
                        <div class="col">
                            <span><button type="button" class="add-btn">Add List</button></span>
                        </div>
                    </div>
                </div>

                <!--second-content-->
                <div class="recent-flex">
                    <div class="seconds">
                        <div class="card-sc">
                            <div class="card-header">
                                <h3>Recent Schedules</h3>
                                <button>See all <span class="las la-arrow-right">
                                </span></button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>Type</td>
                                                <td>Test Time</td>
                                                <td>Status</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>TOEFL</td>
                                                <td>23 August</td>
                                                <td>
                                                    <span class="status green"></span>
                                                    On going
                                                </td>
                                                <td>
                                                    <span><button class="btn-act">Start</button></span>
                                                    <span><button class="btn-act">Done</button></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

@endsection
        
@push('child-js')
    <script src="{{ asset('js/menu.js') }}"></script>
@endpush

