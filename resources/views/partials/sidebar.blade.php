<section id="sidebar">
    <a href="#" class="brand">
        <!--<img src="{{ asset('img/logo.png') }}">-->
        <i class='bx bx-world'></i>
        <span class="text">EPT-P</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="{{ route('index') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user') }}">
                <i class='bx bxs-user-detail'></i>
                <span class="text">User Data</span>
            </a>
        </li>
        <li>
            <a href="{{ route('registrant') }}">
                <i class='bx bxs-registered'></i>
                <span class="text">Registrant Data</span>
            </a>
        </li>
        <li>
            <a href="{{ route('schedule') }}">
                <i class='bx bx-calendar'></i>
                <span class="text">Schedule</span>
            </a>
        </li>
        <li>
            <a href="{{ route('announce') }}">
                <i class='bx bxs-award'></i>
                <span class="text">Announcment</span>
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
        <li>
            <a href="{{ route('identity') }}">
                <i class='bx bxs-id-card'></i>
                <span class="text">Identity</span>
            </a>
        </li>
        <li>
            <a href="{{ route('course') }}">
                <i class='bx bx-laptop'></i>
                <span class="text">Course</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="{{ route('account') }}">
                <i class='bx bxs-cog' ></i>
                <span class="text">Setting</span>
            </a>
        </li>
        <li>
            
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </button>
            </form>
        </li>
    </ul>
</section>