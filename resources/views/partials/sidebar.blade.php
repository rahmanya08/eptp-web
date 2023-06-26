<section id="sidebar">
    <a href="#" class="brand">
        <!--<img src="{{ asset('img/logo.png') }}">-->
        <i class='bx bx-world'></i>
        <span class="text">EPT-P</span>
    </a>
    <ul class="side-menu top">
        @can('admin')
            <li class="active">
                <a href="{{ route('indexAdmin') }} {{ Request::is('indexAdmin') ? 'active' : '' }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
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
            <li class="{{ request()->routeIs('indexStaff') ? 'active' : '' }}">
                <a href="{{ route('indexStaff') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('staffProfile') ? 'active' : '' }}">
                <a href="{{ route('staffProfile') }}">
                    <i class='bx bx-group'></i>
                    <span class="text">Profile</span>   
                </a>
            </li>
            <li class="{{ request()->routeIs('registrant') ? 'active' : '' }}">
                <a href="{{ route('registrant') }}">
                    <i class='bx bxs-registered'></i>
                    <span class="text">Registrantion Data</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('schedule') ? 'active' : '' }}">
                <a href="{{ route('schedule') }} {{ Request::is('/menu-schedule') ? 'active' : '' }}">
                    <i class='bx bx-calendar'></i>
                    <span class="text">Schedule</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('payment') ? 'active' : '' }}">
                <a href="{{ route('payment') }}">
                    <i class='bx bxs-wallet-alt'></i>
                    <span class="text">Payment</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('result') ? 'active' : '' }}">
                <a href="{{ route('result') }}">
                    <i class='bx bxs-archive-out'></i>
                    <span class="text">Result</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('reportStaff') ? 'active' : '' }}">
                <a href="{{ route('reportStaff') }}">
                    <i class='bx bxs-book'></i>
                    <span class="text">Report</span>
                </a>
            </li> 
        @endcan
        @can('student')
            <li class="{{ request()->routeIs('indexParticipant') ? 'active' : '' }}">
                <a href="{{ route('indexParticipant') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('showProfile') ? 'active' : '' }}">
                <a href="{{ route('showProfile') }}">
                    <i class='bx bxs-id-card'></i>
                    <span class="text">Profile</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('create') ? 'active' : '' }}">
                <a href="{{ route('create') }}">
                    <i class='bx bx-laptop'></i>
                    <span class="text">Test</span>
                </a>
            </li>  
            <li class="{{ request()->routeIs('announce') ? 'active' : '' }}">
                <a href="{{ route('announce') }}">
                    <i class='bx bxs-award'></i>
                    <span class="text">Announcment</span>
                </a>
            </li>
        @endcan
        {{-- @can('headStaff') --}}
        @if (Gate::check('headStaff'))
        <li class="{{ request()->routeIs('indexheadStaff') ? 'active' : '' }}">
            <a href="{{ route('indexheadStaff') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('headStaffProfile') ? 'active' : '' }}">
            <a href="{{ route('headStaffProfile') }}">
                <i class='bx bx-group'></i>
                <span class="text">Profile</span>   
            </a>
        </li>
        <li class="{{ request()->routeIs('participant') ? 'active' : '' }}">
            <a href="{{ route('participant') }}">
                <i class='bx bx-user-check'></i>
                <span class="text">Participant</span>
            </a>
        </li>  
        <li class="{{ request()->routeIs('report') ? 'active' : '' }}">
            <a href="{{ route('report') }}">
                <i class='bx bxs-book'></i>
                <span class="text">Report</span>
            </a>
        </li>    
        @endif
        {{-- @endcan --}}
    </ul>
    <ul class="side-menu">
        <li>
            <a href="{{ route('updateAccount') }}">
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