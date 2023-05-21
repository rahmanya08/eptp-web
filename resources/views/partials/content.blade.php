<section id="content">
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link"></a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <div>
        @auth
            <p style="font-size: 12px;">Welcome,
                {{ auth()->user()->email }}</p>
        @endauth
        </div>
        <div>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="num">8</span>
            </a>
        </div>
        <div class="profile">
            @stack('profile')
        </div>
    </nav>
    <!--MAIN-->
    @yield('main-content')
    <!--MAIN-->
</section>