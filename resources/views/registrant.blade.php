@extends('layouts.master-menu')

@section('title', 'Registrant Data')

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
                    <div class="row">
                        <div class="col">
                            <label for="sche_date" class="form-label">Registrant Data</label>
                            <div class="col-2">
                                <span><input type="text" class="form-control" aria-label="filter"></span>
                                <span><button type="button" class="add-btn">Filter</button></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!--second-content-->
                <div class="recent-flex">
                    <div class="seconds">
                        <div class="card-sc">
                            <div class="card-header">
                                <h3>Recents Registrant</h3>
                                <button>See all <span class="las la-arrow-right">
                                </span></button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>Registrant Number</td>
                                                <td>Name</td>
                                                <td>Role</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>1234567890</td>
                                                <td>Sinan Akcil</td>
                                                <td>Lecture</td>
                                                <td>
                                                    <span><button class="btn-act">Edit</button></span>
                                                    <span><button class="btn-act">Delete</button></span>
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

