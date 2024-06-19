<header id="header" class="header d-flex align-items-center">
    <div class="container container-theme d-flex align-items-center justify-content-between">
        <a href="{{ route('home.index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/web/img/logo.png') }}" alt="">
            <!-- <h1>Impact<span>.</span></h1> -->
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('home.index') }}">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#services">Plans</a></li>
                <li><img class="menu-divider" src="{{ asset('assets/web/img/menu-divider.svg') }}" alt="">
                </li>
                @php($auth = session('api_token'))
                @if($auth)
                <li class="dropdown">
                    <a href="#">
                        <img class="me-2" src="{{ asset('assets/web/img/user-icon.svg') }}" alt="">
                        <span>{{ $auth['FirstName'].' '. $auth['LastName'] }}</span><i class="bi bi-chevron-down dropdown-indicator"></i>
                    </a>
                    <ul>
                        <li><a href="#">Account Information</a></li>
                        <li><a href="#">Saved Cards</a></li>
                        <li><a href="#">Existing Packages</a></li>
                        <li><a href="#">Used Cards</a></li>
                        <li><a href="#">Order Cards</a></li>
                        <li class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('profile.logout') }}">Logout</a>
                            <img src="{{ asset('assets/web/img/logout.png') }}" alt="">
                        </li>
                    </ul>
                </li>
                @else
                <li>
                    <a href="{{ route('auth.login-register') }}">
                        <img class="me-2" src="{{ asset('assets/web/img/user-icon.svg') }}" alt=""> <span>Login / Signup</span>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
</header>
