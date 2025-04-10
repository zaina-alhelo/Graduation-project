@extends('landing.master')

@section('content')

    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="images/about1.png"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Blog</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('home')}}">Home</a></span></li>
                                    <li class="active"><span>Blog</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- blog area start  -->
    <section class="blog-4 section-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="blog-4__item mb-80">
                        <a href="#" class="blog-4__item-thumb mb-10">
                            <img src="{{ asset('landing/assets/imgs/blog-4/blog-4__item-1.jpg') }}" class="img-fluid" alt="image not found">
                        </a>

                        <div class="blog-4__item-content">
                            <ul class="blog-4__item-meta mb-20">
                                <li><a href="#"><i class="fa-regular fa-user"></i>By admin</a></li>
                                <li><i class="fa-regular fa-calendar-days"></i>October 19, 2022</li>
                            </ul>
                            <h2 class="title-animation mb-10"><a href="{{route('blog-details')}}">Health Harmony Symphony Wellbeing</a></h2>
                            <p class="mb-40">Web designing in a powerful way of just not an only professions, however, in a passion for our Company. We have to a tendency to believe the idea that smart looking of any websitet in on visitors.Web designing in a powerful way of just not an only profession Web designing in a powerful way of just not an Web designing </p>
                            
                            <a href="{{route('blog-details')}}" class="rr-btn rr-btn__transparent">
                                <span class="btn-wrap">
                                    <span class="text-one">Read More<i class="fa-solid fa-plus"></i></span>
                                    <span class="text-two">Read More<i class="fa-solid fa-plus"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="blog-4__item mb-80">
                        <a href="#" class="blog-4__item-thumb mb-10">
                            <img src="{{ asset('landing/assets/imgs/blog-4/blog-4__item-2.jpg') }}" class="img-fluid" alt="image not found">
                        </a>

                        <div class="blog-4__item-content">
                            <ul class="blog-4__item-meta mb-20">
                                <li><a href="#"><i class="fa-regular fa-user"></i>By admin</a></li>
                                <li><i class="fa-regular fa-calendar-days"></i>October 19, 2022</li>
                            </ul>
                            <h2 class="title-animation mb-10"><a href="blog-details.html">Epicenter of Health Your Wellness</a></h2>
                            <p class="mb-40">Web designing in a powerful way of just not an only professions, however, in a passion for our Company. We have to a tendency to believe the idea that smart looking of any websitet in on visitors.Web designing in a powerful way of just not an only profession Web designing in a powerful way of just not an Web designing </p>
                            
                            <a href="{{route('blog-details')}}" class="rr-btn rr-btn__transparent">
                                <span class="btn-wrap">
                                    <span class="text-one">Read More<i class="fa-solid fa-plus"></i></span>
                                    <span class="text-two">Read More<i class="fa-solid fa-plus"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="blog-4__item mb-80">
                        <a href="#" class="blog-4__item-thumb mb-10">
                            <img src="{{ asset('landing/assets/imgs/blog-4/blog-4__item-3.jpg') }}" class="img-fluid" alt="image not found">
                        </a>

                        <div class="blog-4__item-content">
                            <ul class="blog-4__item-meta mb-20">
                                <li><a href="#"><i class="fa-regular fa-user"></i>By admin</a></li>
                                <li><i class="fa-regular fa-calendar-days"></i>October 19, 2022</li>
                            </ul>
                            <h2 class="title-animation mb-10"><a href="{{route('blog-details')}}">Nurture Nature Blossoming in Health </a></h2>
                            <p class="mb-40">Web designing in a powerful way of just not an only professions, however, in a passion for our Company. We have to a tendency to believe the idea that smart looking of any websitet in on visitors.Web designing in a powerful way of just not an only profession Web designing in a powerful way of just not an Web designing </p>
                            
                            <a href="{{route('blog-details')}}" class="rr-btn rr-btn__transparent">
                                <span class="btn-wrap">
                                    <span class="text-one">Read More<i class="fa-solid fa-plus"></i></span>
                                    <span class="text-two">Read More<i class="fa-solid fa-plus"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                        
                    <ul class="blog-4__pagination d-flex flex-wrap align-items-center justify-content-center">
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="{{route('blog-details')}}"><i class="fa-solid fa-angle-right"></i></a></li>
                    </ul>
                </div>

                <div class="col-xl-4">
                    <div class="sidebar sidebar-rr-sticky">
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title mb-30 title-animation">Search Here </h4>
                            <div class="sidebar__widget-search">
                                <div class="search__bar">
                                    <input type="text" id="search" placeholder="Search..">
                                    <button>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.41927 16.7487C10.3422 16.7487 12.1099 16.0872 13.5203 14.9904L18.0995 19.5695L19.5724 18.0966L14.9932 13.5174C16.0911 12.106 16.7526 10.3383 16.7526 8.41536C16.7526 3.82057 13.0141 0.0820312 8.41927 0.0820312C3.82448 0.0820312 0.0859375 3.82057 0.0859375 8.41536C0.0859375 13.0102 3.82448 16.7487 8.41927 16.7487ZM8.41927 2.16536C11.8661 2.16536 14.6693 4.96849 14.6693 8.41536C14.6693 11.8622 11.8661 14.6654 8.41927 14.6654C4.9724 14.6654 2.16927 11.8622 2.16927 8.41536C2.16927 4.96849 4.9724 2.16536 8.41927 2.16536Z" fill="#071C3C"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title pb-18 title-animation">Category </h4>
                            <div class="sidebar__widget-category">
                                <a href="{{route('blog-details')}}">Health First</a>
                                <a href="{{route('blog-details')}}">Medi Care</a>
                                <a href="{{route('blog-details')}}">Care Well</a>
                                <a href="{{route('blog-details')}}">Health Guard</a>
                                <a href="{{route('blog-details')}}">Medi Connect</a>
                                <a href="{{route('blog-details')}}">Medix Pro</a>
                            </div>
                        </div>
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title title-animation">Popular Post </h4>
                            <div class="sidebar-post__wrapper">
                                <div class="sidebar__widget-post">
                                    <a href="{{route('blog-details')}}" class="sidebar__widget-post__thum">
                                        <img src="{{ asset('landing/assets/imgs/sidebar/popular-post-1.png') }}" class="img-fluid" alt="image not found">
                                    </a>
                                    <div class="sidebar__widget-post__content">
                                        <ul class="sidebar__widget-post__content-meta">
                                            <li>
                                                <i class="fa-regular fa-calendar-days"></i>
                                                October 19, 2022
                                            </li>
                                        </ul>
                                        <a href="{{route('blog-details')}}">
                                            <h5 class="title-animation">Embrace Wellness Your Gateway </h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="sidebar__widget-post">
                                    <a href="{{route('blog-details')}}" class="sidebar__widget-post__thum">
                                        <img src="{{ asset('landing/assets/imgs/sidebar/popular-post-2.png') }}" class="img-fluid" alt="image not found">
                                    </a>
                                    <div class="sidebar__widget-post__content">
                                        <ul class="sidebar__widget-post__content-meta">
                                            <li>
                                                <i class="fa-regular fa-calendar-days"></i>
                                                October 19, 2022
                                            </li>
                                        </ul>
                                        <a href="{{route('blog-details')}}">
                                            <h5 class="title-animation">Optimize Oasis Cultivating Health Inspiring Life</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="sidebar__widget-post">
                                    <a href="{{route('blog-details')}}" class="sidebar__widget-post__thum">
                                        <img src="{{ asset('landing/assets/imgs/sidebar/popular-post-3.png') }}" class="img-fluid" alt="image not found">
                                    </a>
                                    <div class="sidebar__widget-post__content">
                                        <ul class="sidebar__widget-post__content-meta">
                                            <li>
                                                <i class="fa-regular fa-calendar-days"></i>
                                                October 19, 2022
                                            </li>
                                        </ul>
                                        <a href="{{route('blog-details')}}">
                                            <h5 class="title-animation">Vibrance Voyage Navigating Toward Optimal Health</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget-contact text-center mb-40">
                            <h4 class="title-animation text-center mb-25">Are You ready to contact with us</h4>
                            <a href="tel:888123456765" class="mb-20"><i class="fa-solid fa-phone"></i>(+888) 123 456 765</a>
                            <a href="{{route('appointment')}}" class="rr-btn">
                                <span class="btn-wrap">
                                    <span class="text-one">Register Now <i class="fa-solid fa-plus"></i></span>
                                    <span class="text-two">Register Now <i class="fa-solid fa-plus"></i></span>
                                </span>
                            </a>
                        </div>
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title title-animation">Popular Tags </h4>
                            <div class="sidebar__widget-tags">
                                <div class="tags">
                                    <a href="{{route('blog-details')}}">Care Plus</a>
                                    <a href="{{route('blog-details')}}">Health Ease</a>
                                    <a href="{{route('blog-details')}}">Medi Connect</a>
                                    <a href="{{route('blog-details')}}">Vital Care</a>
                                    <a href="{{route('blog-details')}}">Med Excellence</a>
                                    <a href="{{route('blog-details')}}">Care Sync</a>
                                    <a href="{{route('blog-details')}}">Health Matters</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end  -->

@endsection