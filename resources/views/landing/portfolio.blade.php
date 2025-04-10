@extends('landing.master')

@section('content')

    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('landing/images/about1.png')}}"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Portfolio</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('home')}}">Home</a></span></li>
                                    <li class="active"><span>Portfolio</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- our-projects start -->
    <section class="our-projects section-space">
        <div class="container">
            <div class="row mb-minus-30">
                <div class="col-xl-4 col-lg-4 col-md-6 d-flex">
                    <div class="our-projects__item has--title">
                        <div class="section__title-wrapper our-projects__content">
                            <h5 class="section__subtitle color-theme-primary"><img src="{{ asset('landing/assets/imgs/ask-quesiton/heart.png') }}" alt="icon not found" class="img-fluid"> Our Projects</h5>
                            <h2 class="section__title mb-0 title-animation">Our Work For Better Health</h2>
                        </div>
                        <a href="about-us.html" class="rr-btn">
                        <span class="btn-wrap">
                            <span class="text-one">View All <i class="fa-solid fa-plus"></i></span>
                            <span class="text-two">View All <i class="fa-solid fa-plus"></i></span>
                        </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 d-flex">
                    <div class="our-projects__item position-relative overflow-hidden">
                        <div class="panel wow"></div>
                        <div class="our-projects__item__content">
                            <div class="our-projects__item__content-media">
                                <img src="{{ asset('landing/assets/imgs/our-project/our-project-1.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="our-projects__item__content-icon">
                                <a href="portfolio-details.html">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.0006 1V14C18.0006 14.2652 17.8952 14.5196 17.7077 14.7071C17.5201 14.8946 17.2658 15 17.0006 15C16.7353 15 16.481 14.8946 16.2934 14.7071C16.1059 14.5196 16.0006 14.2652 16.0006 14V3.41375L1.70806 17.7075C1.52042 17.8951 1.26592 18.0006 1.00056 18.0006C0.735192 18.0006 0.480697 17.8951 0.293056 17.7075C0.105415 17.5199 0 17.2654 0 17C0 16.7346 0.105415 16.4801 0.293056 16.2925L14.5868 2H4.00056C3.73534 2 3.48099 1.89464 3.29345 1.70711C3.10591 1.51957 3.00056 1.26522 3.00056 1C3.00056 0.734784 3.10591 0.48043 3.29345 0.292893C3.48099 0.105357 3.73534 0 4.00056 0H17.0006C17.2658 0 17.5201 0.105357 17.7077 0.292893C17.8952 0.48043 18.0006 0.734784 18.0006 1Z" fill="white"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="our-projects__item__content-text">
                                <h4 class="title-animation"><a href="portfolio-details.html">Healthcare Provide</a></h4>
                                <p>Blood Pressure</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 d-flex">
                    <div class="our-projects__item position-relative overflow-hidden">
                        <div class="panel wow"></div>
                        <div class="our-projects__item__content">
                            <div class="our-projects__item__content-media">
                                <img src="{{ asset('landing/assets/imgs/our-project/our-project-2.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="our-projects__item__content-icon">
                                <a href="portfolio-details.html">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.0006 1V14C18.0006 14.2652 17.8952 14.5196 17.7077 14.7071C17.5201 14.8946 17.2658 15 17.0006 15C16.7353 15 16.481 14.8946 16.2934 14.7071C16.1059 14.5196 16.0006 14.2652 16.0006 14V3.41375L1.70806 17.7075C1.52042 17.8951 1.26592 18.0006 1.00056 18.0006C0.735192 18.0006 0.480697 17.8951 0.293056 17.7075C0.105415 17.5199 0 17.2654 0 17C0 16.7346 0.105415 16.4801 0.293056 16.2925L14.5868 2H4.00056C3.73534 2 3.48099 1.89464 3.29345 1.70711C3.10591 1.51957 3.00056 1.26522 3.00056 1C3.00056 0.734784 3.10591 0.48043 3.29345 0.292893C3.48099 0.105357 3.73534 0 4.00056 0H17.0006C17.2658 0 17.5201 0.105357 17.7077 0.292893C17.8952 0.48043 18.0006 0.734784 18.0006 1Z" fill="white"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="our-projects__item__content-text">
                                <h4 class="title-animation"><a href="portfolio-details.html">Healthcare Provide</a></h4>
                                <p>Blood Pressure</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 d-flex">
                    <div class="our-projects__item position-relative overflow-hidden">
                        <div class="panel wow"></div>
                        <div class="our-projects__item__content">
                            <div class="our-projects__item__content-media">
                                <img src="{{ asset('landing/assets/imgs/our-project/our-project-3.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="our-projects__item__content-icon">
                                <a href="portfolio-details.html">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.0006 1V14C18.0006 14.2652 17.8952 14.5196 17.7077 14.7071C17.5201 14.8946 17.2658 15 17.0006 15C16.7353 15 16.481 14.8946 16.2934 14.7071C16.1059 14.5196 16.0006 14.2652 16.0006 14V3.41375L1.70806 17.7075C1.52042 17.8951 1.26592 18.0006 1.00056 18.0006C0.735192 18.0006 0.480697 17.8951 0.293056 17.7075C0.105415 17.5199 0 17.2654 0 17C0 16.7346 0.105415 16.4801 0.293056 16.2925L14.5868 2H4.00056C3.73534 2 3.48099 1.89464 3.29345 1.70711C3.10591 1.51957 3.00056 1.26522 3.00056 1C3.00056 0.734784 3.10591 0.48043 3.29345 0.292893C3.48099 0.105357 3.73534 0 4.00056 0H17.0006C17.2658 0 17.5201 0.105357 17.7077 0.292893C17.8952 0.48043 18.0006 0.734784 18.0006 1Z" fill="white"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="our-projects__item__content-text">
                                <h4 class="title-animation"><a href="portfolio-details.html">Healthcare Provide</a></h4>
                                <p>Blood Pressure</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 d-flex">
                    <div class="our-projects__item position-relative overflow-hidden">
                        <div class="panel wow"></div>
                        <div class="our-projects__item__content">
                            <div class="our-projects__item__content-media">
                                <img src="{{ asset('landing/assets/imgs/our-project/our-project-4.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="our-projects__item__content-icon">
                                <a href="portfolio-details.html">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.0006 1V14C18.0006 14.2652 17.8952 14.5196 17.7077 14.7071C17.5201 14.8946 17.2658 15 17.0006 15C16.7353 15 16.481 14.8946 16.2934 14.7071C16.1059 14.5196 16.0006 14.2652 16.0006 14V3.41375L1.70806 17.7075C1.52042 17.8951 1.26592 18.0006 1.00056 18.0006C0.735192 18.0006 0.480697 17.8951 0.293056 17.7075C0.105415 17.5199 0 17.2654 0 17C0 16.7346 0.105415 16.4801 0.293056 16.2925L14.5868 2H4.00056C3.73534 2 3.48099 1.89464 3.29345 1.70711C3.10591 1.51957 3.00056 1.26522 3.00056 1C3.00056 0.734784 3.10591 0.48043 3.29345 0.292893C3.48099 0.105357 3.73534 0 4.00056 0H17.0006C17.2658 0 17.5201 0.105357 17.7077 0.292893C17.8952 0.48043 18.0006 0.734784 18.0006 1Z" fill="white"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="our-projects__item__content-text">
                                <h4 class="title-animation"><a href="portfolio-details.html">Healthcare Provide</a></h4>
                                <p>Blood Pressure</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 d-flex">
                    <div class="our-projects__item position-relative overflow-hidden">
                        <div class="panel wow"></div>
                        <div class="our-projects__item__content">
                            <div class="our-projects__item__content-media">
                                <img src="{{ asset('landing/assets/imgs/our-project/our-project-5.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="our-projects__item__content-icon">
                                <a href="portfolio-details.html">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.0006 1V14C18.0006 14.2652 17.8952 14.5196 17.7077 14.7071C17.5201 14.8946 17.2658 15 17.0006 15C16.7353 15 16.481 14.8946 16.2934 14.7071C16.1059 14.5196 16.0006 14.2652 16.0006 14V3.41375L1.70806 17.7075C1.52042 17.8951 1.26592 18.0006 1.00056 18.0006C0.735192 18.0006 0.480697 17.8951 0.293056 17.7075C0.105415 17.5199 0 17.2654 0 17C0 16.7346 0.105415 16.4801 0.293056 16.2925L14.5868 2H4.00056C3.73534 2 3.48099 1.89464 3.29345 1.70711C3.10591 1.51957 3.00056 1.26522 3.00056 1C3.00056 0.734784 3.10591 0.48043 3.29345 0.292893C3.48099 0.105357 3.73534 0 4.00056 0H17.0006C17.2658 0 17.5201 0.105357 17.7077 0.292893C17.8952 0.48043 18.0006 0.734784 18.0006 1Z" fill="white"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="our-projects__item__content-text">
                                <h4 class="title-animation"><a href="portfolio-details.html">Healthcare Provide</a></h4>
                                <p>Blood Pressure</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our-projects end -->


@endsection