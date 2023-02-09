@extends('layouts.master-menu')

@section('title', 'Dashboard')

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
        <main>
            <!--first-content-->
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-user"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>79</h1>
                        <span>Projects</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>  

                <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Orders</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>$5k</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="las la-wallet"></span>
                    </div>
                </div>
            </div>
            <!--second-content-->
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Projects</h3>
                            <button>See all <span class="las la-arrow-right">
                            </span></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Project Title</td>
                                            <td>Departement</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ui/Ux Design</td>
                                            <td>UI Team</td>
                                            <td>
                                                <span class="status green"></span>
                                                Review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Web development</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status blue"></span>
                                                In Progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop app</td>
                                            <td>Mobile Team</td>
                                            <td>
                                                <span class="status red"></span>
                                                Pending
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Customer</h3>
                            <button>See all <span class="las la-arrow-right">
                            </span></button>
                        </div>
                        <div class="card-body">
                            <div class="customer">
                                <div class="info">
                                    <img src="{{ asset('img/Murat.jpeg') }}" width="40px" 
                                    height="40px" alt="">
                                    <div>
                                        <h4>Ian Somerhalder</h4>
                                        <small>CEO Expert</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="{{ asset('img/Murat.jpeg') }}" width="40px" 
                                    height="40px" alt="">
                                    <div>
                                        <h4>Ian Somerhalder</h4>
                                        <small>CEO Expert</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="{{ asset('img/Murat.jpeg') }}" width="40px" 
                                    height="40px" alt="">
                                    <div>
                                        <h4>Ian Somerhalder</h4>
                                        <small>CEO Expert</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="{{ asset('img/Murat.jpeg') }}" width="40px" 
                                    height="40px" alt="">
                                    <div>
                                        <h4>Ian Somerhalder</h4>
                                        <small>CEO Expert</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
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

