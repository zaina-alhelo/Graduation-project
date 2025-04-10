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
                                <img src="{{ asset('landing/assets/imgs/logo/logo.svg') }}" alt="OptiEye logo">
                                
                            </div>
                        </a>
                    </div>

                    <div class="mean__menu-wrapper d-none d-lg-block">
                        <div class="main-menu main-menu-3">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="active">
                                        <a href="{{route('home')}}">Home</a>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="javascript:void(0)">Pages</a>
                                        <ul class="submenu">
                                            <li><a href="{{route('faq')}}">Faq</a></li>
                                            <li><a href="{{route('about-us')}}">About us</a></li>
                                            <li><a href="{{route('pricing')}}">Pricing</a></li>
                                            <li><a href="{{route('appointment')}}">Appointment</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="javascript:void(0)">AI Services</a>
                                        <ul class="submenu">
                                            <li><a href="{{route('service')}}">Eye Diagnostics</a></li>
                                            <li><a href="{{route('service-details')}}">Diagnostic Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="{{route('doctor')}}">Specialists</a>
                                        <ul class="submenu">
                                            <li><a href="{{route('doctor')}}">Ophthalmologists</a></li>
                                            <li><a href="{{route('doctor-details')}}">Specialist Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="{{route('portfolio')}}">Case Studies</a>
                                        <ul class="submenu">
                                            <li><a href="{{route('portfolio')}}">Success Stories</a></li>
                                            <li><a href="{{route('portfolio-details')}}">Case Study Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="{{route('blog')}}">Blog</a>
                                        <ul class="submenu">
                                            <li><a href="{{route('blog')}}">Eye Health Tips</a></li>
                                            <li><a href="{{route('blog-details')}}">Article Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="header__right">
                        <div class="header__action d-flex align-items-center">
                            <div class="header__btn-wrap d-none d-sm-inline-flex">
                                <div class="rr-header-icon-search">
                                    <button class="search-open-btn">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </div>

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
 <body>