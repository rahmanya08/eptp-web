<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('meta')
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    @stack('custom-css')
</head>
<body>
    
    
    <input type="checkbox" name="" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class=" las la-globe-africa"></span><span>Language Center</span> 
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="active"><span class="las la-igloo"></span>
                    <span>Dasboard</span></a>
                </li>
                <li>
                    <a href="{{ route('user_ver') }}"><span class="las la-users"></span>
                    <span>User Data</span></a>
                </li>
                <li>
                    <a href="{{ route('registrant') }}"><span class="las la-clipboard-list"></span>
                    <span>Registrant Data</span></a>
                </li>
                <li>
                    <a href="{{ route('schedule') }}"><span class="las la-calendar"></span>
                    <span>Schedule</span></a>
                </li>
                <li>
                    <a href="{{ route('announce') }}"><span class="las la-certificate"></span>
                    <span>Announcment</span></a>
                </li>
                <li>
                    <a href="{{ route('payment') }}"><span class=" las la-money-check"></span>
                    <span>Payment</span></a>
                </li>
                <li>
                    <a href="{{ route('result') }}"><span class=" las la-upload"></span>
                    <span>Result</span></a>
                </li>
                <li>
                    <a href="{{ route('course') }}"><span class=" las la-desktop"></span>
                    <span>Course</span></a>
                </li>
                <li>
                    <a href="{{ route('account') }}"><span class="las la-user-circle"></span>
                    <span>Accounts</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                    </label>
                    
                    Dashboard
                </h2>

                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="search here" />
                </div>

                <div class="user-wrapper">
                    @stack('user')
                </div>
        </header>
        <main>
                @yield('main-content')
        </main>
    </div>

    @stack('child-js')  
</body>
</html>