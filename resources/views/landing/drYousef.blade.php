@extends('landing.master')

@section('content')
 <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('landing/images/about1.png') }}"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Doctor Details</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('home') }}">Home</a></span></li>
                                    <li class="active"><span>Doctor Details</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- doctor-details area start  -->
    <section class="doctor-details section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="doctor-details__media mb-40">
                        <img src="{{ asset('landing/images/doc4.jpg') }}" class="img-fluid" alt="img not found">
                    </div>
                    <div class="doctor-details__info">
                        <ul class="doctor-details__info-list">
                            <li>
                                <h5>Email address</h5>
                                <a href="mailto:doctorneed@gmail.com">optieyesup@gmail.com</a>
                            </li>
                            <li>
                                <h5>Phone number</h5>
                                <a href="tel:12214582754">+9623453454</a>
                            </li>
                            <li>
                                <h5>Web address</h5>
                                <a href="www.doctor.com">www.doctor.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="doctor-details__content mt-md-50 mt-sm-40 mt-xs-40">
                        <div class="doctor-details__content-future mb-30">
                            <h2 class="mb-20 title-animation">Dr.Yousef</h2>
                            <p class="mb-20">Web designing in a powerful way of just not an only professions, however, in a passion for our Company. We have to a tendency to believe the idea that smart looking of any websitet in on visitors.Web designing in a powerful way of just not an only profession Web designing in a powerful way of just not an Web designing in a powerful way of just not an only professions, however, in a passion for our Company. We have to a tendency to believe the idea that smart</p>
                            <ul class="doctor-details__content-future__list">
                                <li><span>Specially:</span>Cardiothoracic Surgeon Specializ</li>
                                <li><span>Degrees:</span>MBBS University of California</li>
                                <li><span>Experience:</span>7 years, New York Urgent Medical Care Serving California</li>
                            </ul>
                        </div>

                        <div class="doctor-details__content-skill mb-80">
                            <h3 class="mb-20 title-animation">Professional Skill</h3>
                            <p class="mb-30">Web designing in a powerful way of just not an only professions, however, in a passion for our Company. We have to a tendency to believe the idea that smart looking of any websitet in on visitors.Web designing in a powerful way of just not an only profession Web designing in a powerful way of just not an Web designing in a powerful way Gy </p>

                            <div class="skill-one__progress">
                                <div class="skill-one__progress-single">
                                    <h5 class="skill-one__progress-title mb-10">Total Cases</h5>
                                    <div class="bar">
                                        <div class="count-text">92%</div>
                                        <div class="bar-inner count-bar counted" data-percent="92%">
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-one__progress-single">
                                    <h5 class="skill-one__progress-title mb-10">Success case</h5>
                                    <div class="bar">
                                        <div class="count-text">89%</div>
                                        <div class="bar-inner count-bar counted" data-percent="89%">
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-one__progress-single">
                                    <h5 class="skill-one__progress-title mb-10">Satisfaction Patient</h5>
                                    <div class="bar">
                                        <div class="count-text">90%</div>
                                        <div class="bar-inner count-bar counted" data-percent="90%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- doctor-details area start  -->
</main>
<!-- Body main wrapper end -->
@endsection