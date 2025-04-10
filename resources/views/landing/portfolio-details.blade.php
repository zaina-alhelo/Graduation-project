@extends('landing.master')

@section('content')
    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('landing/images/about1.png')}}"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Portfolio Details</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="index.html">Home</a></span></li>
                                    <li class="active"><span>Portfolio Details</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- portfolio details start -->
    <section class="portfolio-details section-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="portfolio-details__media-wrapper position-relative mb-40">
                        <div class="portfolio-details__media">
                            <img src="{{ asset('landing/assets/imgs/portfolio-details/portfolio-details.jpg') }}" alt="image not found">
                        </div>

                        <div class="portfolio-details__author">
                            <div class="portfolio-details__author-item">
                                <span>Treatment Name</span>
                                <h5>Heart Transplant</h5>
                            </div>
                            <div class="portfolio-details__author-item">
                                <span>Time Duration</span>
                                <h5>More Than 12 hour</h5>
                            </div>
                            <div class="portfolio-details__author-item">
                                <span>Doctor Name</span>
                                <h5>Dr. David smith</h5>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-details__content mb-60">
                        <div class="row align-items-center">
                            <div class="col-lg-9">
                                <div class="portfolio-details__content-text">
                                    <h3 class="mb-10 title-animation">Vibrance Voyage Navigating Toward Optimal </h3>
                                    <p class="mb-20">Web designing in a powerful way of just not an only professions, however, in a passion
                                        for our Company. We have to a tendency to believe the idea that smart looking of any websitet
                                        in on visitors.Web designing in a powerful way of just not an only profession Web designing in a powerful way of just not
                                        an Web designing in a powerful way of just not an only professions, however, in a passion for our Company. We have to a tendency to believe the idea that smart
                                        looking of any websitet in on visitors.Web designing in a powerful way of just not an only profession Web designing in a powerful way of just not an only
                                    </p>
                                    <p class="mb-0">Web designing in a powerful way of just not an only professions, however,
                                        in a passion for our Company. We have to a tendency to believe the idea that smart looking of any websitet in on visitors.Web designing in a powerful way of just not an only profession Web designing in a powerful way
                                        of just not an Web designing in a powerful way of just not a
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="portfolio-details__content__contact text-center">
                                    <h4 class="mb-25 title-animation">Are You ready to contact with us</h4>
                                    <h6 class="mb-20"><a href="tel:888123456765"><i class="fa-solid fa-phone"></i>(+888) 123 456 765</a></h6>

                                    <a href="appoinment.html" class="rr-btn">
                                        <span class="btn-wrap">
                                            <span class="text-one">Register Now <i class="fa-solid fa-plus"></i></span>
                                            <span class="text-two">Register Now <i class="fa-solid fa-plus"></i></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-details__media-wrapper mb-30">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="portfolio-details__media-wrapper__item mb-md-30 mb-sm-30 mb-xs-30">
                                    <img src="{{ asset('landing/assets/imgs/portfolio-details/portfolio-details-1.jpg') }}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="portfolio-details__media-wrapper__item mb-md-30 mb-sm-30 mb-xs-30">
                                    <img src="{{ asset('landing/assets/imgs/portfolio-details/portfolio-details-2.jpg') }}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="portfolio-details__media-wrapper__item">
                                    <img src="{{ asset('landing/assets/imgs/portfolio-details/portfolio-details-3.jpg') }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-details__content">
                        <div class="portfolio-details__content-text">
                            <h3 class="mb-20 title-animation">Holistic Haven Where Health Blossoms Every Day</h3>
                            <p class="mb-0">Web designing in a powerful way of just not an only professions, however, in a passion for our Company. We have to a tendency to believe the idea that smart looking of any websitet in on visitors.Web designing in a powerful way of just not an only profession Web designing in a powerful way of just not an Web designing in a powerful way of just not an only professions, however, in a passion for our Company. We have to a tendency to believe the idea that smart looking of any websitet in on visitors.Web designing in a powerful way of just not an only profession Web designing in a powerful way of just not an only medical duty operation complete</p>
                        </div>
                        <ul class="portfolio-details__content__list mt-20">
                            <li><span><i class="fa-solid fa-check"></i></span><h5>Lorem Ipsum passage, and going through</h5></li>
                            <li><span><i class="fa-solid fa-check"></i></span><h5>Healthcare Excellence, Compassionate Healing</h5></li>
                            <li><span><i class="fa-solid fa-check"></i></span><h5>Many desktop publishing packages and web page</h5></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio details end -->



@endsection