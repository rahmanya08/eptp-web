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
            <small>Administrator</small>
        </div>
    </div>
@endpush

@section('main-content')
        <main class="sc">
            <div class="cards-sc">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col-form">
                      <label for="sche_date" class="form-label">Test Date</label>
                      <input type="date" class="form-control" placeholder="Last name" aria-label="Last name">
                      <button type="button">Add List</button>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recents Schedule</h3>
                            <button>See all <span class="las la-arrow-right">
                            </span></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <td>Date & Time</td>
                                                <td>Participant</td>
                                                <td>Status</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Saturday, 20 January 2023</td>
                                                <td>20</td>
                                                <td>
                                                    <span class="status green"></span>
                                                    On Going
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Monday, 30 January 2023</td>
                                                <td>15</td>
                                                <td>
                                                    <span class="status blue"></span>
                                                    Soon
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Thursday, 15 January 2023</td>
                                                <td>23</td>
                                                <td>
                                                    <span class="status red"></span>
                                                    Finished
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                                 
                            </div>
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

