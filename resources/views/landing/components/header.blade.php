<!-- Header area start -->
<header>
    <div class="header-4-top theme-bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Header top content removed while maintaining structure -->
                </div>
            </div>
        </div>
    </div>
    <div id="header-sticky" class="header__area header-4__background header-4">
        <div class="container">
            <div class="mega__menu-wrapper p-relative">
                <div class="header__main">
                    <div class="header__logo">
                        <a href="{{route('home')}}">
                            <div class="logo">
                                <img src="{{ asset('landing/images/logoff.png') }}" alt="OptiEye logo">
                            </div>
                        </a>
                    </div>

                    <div class="mean__menu-wrapper d-none d-lg-block">
                        <div class="main-menu main-menu-3">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                        <a href="{{route('home')}}">Home</a>
                                    </li>

                                    <li class="has-dropdown {{ request()->routeIs('faq') || request()->routeIs('about-us') || request()->routeIs('appointment') ? 'active' : '' }}">
                                        <a href="javascript:void(0)">Information</a>
                                        <ul class="submenu">
                                            <li class="{{ request()->routeIs('faq') ? 'active' : '' }}"><a href="{{route('faq')}}">Faq</a></li>
                                            <li class="{{ request()->routeIs('about-us') ? 'active' : '' }}"><a href="{{route('about-us')}}">About us</a></li>
                                        </ul>
                                    </li>

                                    <li class="{{ request()->routeIs('service') ? 'active' : '' }}">
                                        <a href="{{route('service')}}">Services</a>
                                    </li>

                                    <li class="{{ request()->routeIs('doctor') ? 'active' : '' }}">
                                        <a href="{{route('doctor')}}">Doctors</a>
                                    </li>

                                    <li class="{{ request()->routeIs('appointment') ? 'active' : '' }}">
                                        <a href="{{route('appointments.form')}}">Appointment</a>
                                    </li>

                                    <li class="{{ request()->routeIs('chatbot') ? 'active' : '' }}">
                                        <a href="{{route('chatbot')}}">AI Assistant</a>
                                    </li>

                                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                        <a href="{{route('contact')}}">Contact</a>
                                    </li>

                                    @if (Route::has('login'))
                                    @auth
    <li class="has-dropdown 
        {{ request()->routeIs('patient.dashboard') || request()->routeIs('doctor.dashboard') ? 'active' : '' }}">
        <a href="javascript:void(0)">Account</a>
        <ul class="submenu">
            @if (auth()->user()->role === 'user')
                <li class="{{ request()->routeIs('patient.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('user.profile') }}">My Profile</a>
                </li>
            @elseif (auth()->user()->role === 'doctor')
                <li class="{{ request()->routeIs('doctor.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('doctor.dashboard') }}">Dashboard</a>
                </li>
            @endif

            <li>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Log out
                </a>
            </li>
        </ul>
    </li>
@endauth

                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>

                    @if (Route::has('login'))
                        @guest
                            <div class="header__right">
                                <div class="header__action d-flex align-items-center">
                            <div class="header__auth-buttons me-4 d-none d-lg-flex">
                                <a href="{{route('login')}}" class="auth-btn login-btn me-2" style="min-width: 90px; text-align: center; padding: 10px 15px;">
                                            <i class="fa-solid fa-user"></i> Log In
                                        </a>
                                        @if (Route::has('register'))
                                <a href="{{route('register')}}" class="auth-btn signup-btn" style="min-width: 90px; text-align: center; padding: 10px 15px;">
                                                <i class="fa-solid fa-user-plus"></i> Sign Up
                                            </a>
                                        @endif
                                    </div>
                               
                        @endguest
                    @endif

                    <div class="header__hamburger">
                        <div class="sidebar__toggle">
                            <a class="bar-icon" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     </div>
                            </div>
</header>
<!-- Header area end -->
