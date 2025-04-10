@extends('landing.master')

@section('content')

    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="./images/pricing1.png"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">AI Diagnosis Plans</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('home')}}">Home</a></span></li>
                                    <li class="active"><span>Diagnosis Plans</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- pricing-action-3 area start  -->
    <section class="pricing-action-3 section-space">
        <div class="container">
            <div class="row mb-minus-30">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="pricing-action-3__item mb-30">
                        <h4 class="mb-15 mb-xs-10">Basic Scan</h4>

                        <h2 class="pricing-action-3__item-price mb-25 mb-xs-20">$19 <span class="body-font">/month</span></h2>

                        <h5 class="mb-20 mb-xs-15">Entry-level eye analysis.</h5>

                        <div class="pricing-action-3__item-body">
                            <ul>
                                <li><i class="fa-solid fa-square-check"></i> Basic Eye Screening</li>
                                <li><i class="fa-solid fa-square-check"></i> 5 AI Scans Per Month</li>
                                <li><i class="fa-solid fa-square-check"></i> Standard Report Generation</li>
                                <li><i class="fa-solid fa-square-check"></i> Email Results</li>
                                <li><i class="fa-solid fa-square-check"></i> Phone Support</li>
                            </ul>
                        </div>

                        <a href="pricing.html" class="rr-btn mt-40 mt-xs-30">
                            <span class="btn-wrap">
                                <span class="text-one">Get Started <i class="fa-solid fa-circle-plus"></i></span>
                                <span class="text-two">Get Started <i class="fa-solid fa-circle-plus"></i></span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="pricing-action-3__item active mb-30">
                        <h4 class="mb-15 mb-xs-10">Premium Vision</h4>

                        <h2 class="pricing-action-3__item-price mb-25 mb-xs-20">$49 <span class="body-font">/month</span></h2>

                        <h5 class="mb-20 mb-xs-15">Complete eye health monitoring.</h5>

                        <div class="pricing-action-3__item-body">
                            <ul>
                                <li><i class="fa-solid fa-square-check"></i> Advanced Eye Analysis</li>
                                <li><i class="fa-solid fa-square-check"></i> Unlimited AI Scans</li>
                                <li><i class="fa-solid fa-square-check"></i> Detailed Health Reports</li>
                                <li><i class="fa-solid fa-square-check"></i> Specialist Consultation</li>
                                <li><i class="fa-solid fa-square-check"></i> 24/7 Priority Support</li>
                            </ul>
                        </div>

                        <a href="pricing.html" class="rr-btn mt-40 mt-xs-30">
                            <span class="btn-wrap">
                                <span class="text-one">Get Started <i class="fa-solid fa-circle-plus"></i></span>
                                <span class="text-two">Get Started <i class="fa-solid fa-circle-plus"></i></span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="pricing-action-3__item mb-30">
                        <h4 class="mb-15 mb-xs-10">Family Vision</h4>

                        <h2 class="pricing-action-3__item-price mb-25 mb-xs-20">$79 <span class="body-font">/month</span></h2>

                        <h5 class="mb-20 mb-xs-15">Multi-user eye care solution.</h5>

                        <div class="pricing-action-3__item-body">
                            <ul>
                                <li><i class="fa-solid fa-square-check"></i> Up to 5 Family Members</li>
                                <li><i class="fa-solid fa-square-check"></i> 20 AI Scans Per Month</li>
                                <li><i class="fa-solid fa-square-check"></i> Comparative Analysis</li>
                                <li><i class="fa-solid fa-square-check"></i> Family Health Dashboard</li>
                                <li><i class="fa-solid fa-square-check"></i> Chat Support</li>
                            </ul>
                        </div>

                        <a href="pricing.html" class="rr-btn mt-40 mt-xs-30">
                            <span class="btn-wrap">
                                <span class="text-one">Get Started <i class="fa-solid fa-circle-plus"></i></span>
                                <span class="text-two">Get Started <i class="fa-solid fa-circle-plus"></i></span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="pricing-action-3__item mb-30">
                        <h4 class="mb-15 mb-xs-10">Enterprise</h4>

                        <h2 class="pricing-action-3__item-price mb-25 mb-xs-20">$139 <span class="body-font">/month</span></h2>

                        <h5 class="mb-20 mb-xs-15">Professional clinic solution.</h5>

                        <div class="pricing-action-3__item-body">
                            <ul>
                                <li><i class="fa-solid fa-square-check"></i> Multiple Practitioner Access</li>
                                <li><i class="fa-solid fa-square-check"></i> Unlimited AI Diagnostics</li>
                                <li><i class="fa-solid fa-square-check"></i> Medical Integration APIs</li>
                                <li><i class="fa-solid fa-square-check"></i> Patient Management</li>
                                <li><i class="fa-solid fa-square-check"></i> Dedicated Account Manager</li>
                            </ul>
                        </div>

                        <a href="pricing.html" class="rr-btn mt-40 mt-xs-30">
                            <span class="btn-wrap">
                                <span class="text-one">Get Started <i class="fa-solid fa-circle-plus"></i></span>
                                <span class="text-two">Get Started <i class="fa-solid fa-circle-plus"></i></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pricing-action-3 area start  -->

    <!-- pricing-appointment area start  -->
    <section class="pricing-appointment section-space__bottom">
        <div class="container">
            <div class="row align-items-end mb-60 mb-sm-50 mb-xs-40">
                <div class="col-lg-6">
                    <div class="section__title-wrapper">
                        <h5 class="section__subtitle color-theme-primary mb-15 mb-xs-10 title-animation"><img src="{{ asset('landing/assets/imgs/ask-quesiton/heart.png') }}" alt="icon not found" class="img-fluid"> Schedule AI Diagnosis</h5>
                        <h2 class="section__title mb-0 title-animation">Protect Your Vision With Advanced AI Technology</h2>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="pricing-appointment__content-right mt-md-25 mt-sm-25 mt-xs-25">
                        <p class="mb-0">Our AI-powered eye diagnosis system uses cutting-edge machine learning to detect early signs of eye conditions including diabetic retinopathy, glaucoma, age-related macular degeneration, and cataracts with exceptional accuracy and speed.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="pricing-appointment__contact-item__wrap d-flex flex-column">
                        <div class="pricing-appointment__contact-item d-flex align-items-end">
                            <div class="pricing-appointment__contact-item-icon d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="pricing-appointment__contact-item-text">
                                <p>Schedule Your Scan:</p>
                                <h5 class="mb-0"><a href="tel:6295550129">(629) 555-0129</a></h5>
                            </div>
                        </div>

                        <div class="pricing-appointment__contact-item d-flex align-items-end">
                            <div class="pricing-appointment__contact-item-icon d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="pricing-appointment__contact-item-text">
                                <p>AI Diagnosis Hours:</p>
                                <h5 class="mb-0">24/7 Online Access</h5>
                            </div>
                        </div>

                        <div class="pricing-appointment__contact-item d-flex align-items-end">
                            <div class="pricing-appointment__contact-item-icon d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="pricing-appointment__contact-item-text">
                                <p>Visit Our Lab:</p>
                                <h5 class="mb-0"><a href="https://maps.app.goo.gl/1N77c8d8zieLRaot7">6391 Elgin St. Celina, Delaware</a></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <form id="pricing-appointment__form"  method="POST" action="./mail.php" class="pricing-appointment__form mt-md-60 mt-sm-60 mt-xs-60">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-input">
                                    <input name="name" id="name" type="text" placeholder="Your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-input">
                                    <input name="email" id="email" type="text" placeholder="Your email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-input">
                                    <input name="phone" id="phone" type="text" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-select">
                                    <select name="service" id="service">
                                        <option>Select Diagnosis Type</option>
                                        <option>Diabetic Retinopathy Screening</option>
                                        <option>Glaucoma Assessment</option>
                                        <option>Cataract Detection</option>
                                        <option>Full Eye Health Assessment</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="pricing-appointment__form-input">
                                    <textarea name="textarea" id="textarea" placeholder="Additional information about your eye condition"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="rr-btn rr-btn__primary-color mt-0">
                                    <span class="btn-wrap">
                                        <span class="text-one">Schedule Diagnosis</span>
                                        <span class="text-two">Schedule Diagnosis</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- pricing-appointment area start  -->
@endsection