<section id="sidebar">
    <a href="#" class="brand">
        <!--<img src="{{ asset('img/logo.png') }}">-->
        <i class='bx bx-world'></i>
        <span class="text">EPT-P</span>
    </a>
    <ul class="side-menu top">
        {{-- {{ Request::is('dashboard') ? 'active' : '' }} --}}
        <li class="active">
            <a href="{{ route('index') }} {{ Request::is('identity') ? 'active' : '' }}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        @can('admin')
            <li>
                <a href="{{ route('user') }} {{ Request::is('user') ? 'active' : '' }}">
                    <i class='bx bxs-user-detail'></i>
                    <span class="text">User Data</span>
                </a>
            </li>
            <li>
                <a href="{{ route('staff') }} {{ Request::is('staff') ? 'active' : '' }}">
                    <i class='bx bxs-briefcase'></i>
                    <span class="text">Staff Data</span>
                </a>
            </li>
            <li>
                <a href="{{ route('participant') }} {{ Request::is('participant') ? 'active' : '' }}">
                    <i class='bx bx-group'></i>
                    <span class="text">Participant Data</span>
                </a>
            </li>
        @endcan
        @can('staff')
            <li>
                <a href="{{ route('identityStaff') }}" {{ Request::is('identityStaff') ? 'active' : '' }}>
                    <i class='bx bxs-id-card'></i>
                    <span class="text">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('registrant') }}">
                    <i class='bx bxs-registered'></i>
                    <span class="text">Registrantion Data</span>
                </a>
            </li>
            <li>
                <a href="{{ route('schedule') }}">
                    <i class='bx bx-calendar'></i>
                    <span class="text">Schedule</span>
                </a>
            </li>
            <li>
                <a href="{{ route('payment') }}">
                    <i class='bx bxs-wallet-alt'></i>
                    <span class="text">Payment</span>
                </a>
            </li>
            <li>
                <a href="{{ route('result') }}">
                    <i class='bx bxs-archive-out'></i>
                    <span class="text">Result</span>
                </a>
            </li>
        @endcan
        @can('student')
            <li>
                <a href="{{ route('identity') }}" {{ Request::is('identity') ? 'active' : '' }}>
                    <i class='bx bxs-id-card'></i>
                    <span class="text">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('create') }}">
                    <i class='bx bx-laptop'></i>
                    <span class="text">Test</span>
                </a>
            </li>  
            <li>
                <a href="{{ route('announce') }}">
                    <i class='bx bxs-award'></i>
                    <span class="text">Announcment</span>
                </a>
            </li>
        @endcan
    </ul>
    <ul class="side-menu">
        <li>
            <a href="{{ route('edit') }}">
                <i class='bx bxs-cog' ></i>
                <span class="text">Setting</span>
            </a>
        </li>
        <li>
            
            <form action="{{ route('logout') }}" method="post" style="margin-left: 20px">
                @csrf
                <button type="submit" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </button>
            </form>
        </li>
    </ul>
</section>