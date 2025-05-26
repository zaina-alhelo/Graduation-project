@extends('landing.master')

@section('content')
 <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('landing/images/about1.png') }}"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">AI Services</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ url('/') }}">Home</a></span></li>
                                    <li class="active"><span>AI Services</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area end  -->

<!-- How Our Eye Diagnosis Process Works start -->
    <section class="service-section section-space">
        <div class="container">
            <div class="row mb-40">
                <div class="col-12">
                    <div class="section__title-wrapper text-center">
                        <h2 class="section__title mb-20 mb-xs-15 title-animation">How Our Eye Diagnosis Process Works</h2>
                        <p class="mb-0">Our streamlined process combines technological innovation with medical expertise to deliver comprehensive eye care solutions accessible from anywhere.</p>
                    </div>
                </div>
            </div>

            <div class="row mb-40">
                <div class="col-lg-6 mb-4">
                    <div class="service__item text-center p-4 h-100">
                        <div class="service__item-icon mb-20 mb-xs-15">
                            <i class="fa-solid fa-eye fa-4x" style="color: var(--rr-theme-primary);"></i>
                        </div>
                        <h4 class="title-animation mb-15">OCT Eye Scan</h4>
                        <p>The diagnosis process begins with a quick and painless OCT scan that captures detailed images of your retina. This advanced imaging technology allows us to see the inner layers of your eye in high resolution, helping to detect early signs of retinal diseases with great accuracy.</p>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="service__item text-center p-4 h-100">
                        <div class="service__item-icon mb-20 mb-xs-15">
                            <i class="fa-solid fa-image fa-4x" style="color: var(--rr-theme-primary);"></i>
                        </div>
                        <h4 class="title-animation mb-15">Image Preparation</h4>
                        <p>Once the scan is captured, the image goes through a preparation stage. It is resized, cleaned, and formatted to meet the technical standards required by our AI system. This ensures the system can analyze it accurately and consistently.</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="service__item text-center p-4 h-100">
                        <div class="service__item-icon mb-20 mb-xs-15">
                            <i class="fa-solid fa-brain fa-4x" style="color: var(--rr-theme-primary);"></i>
                        </div>
                        <h4 class="title-animation mb-15">AI-Powered Diagnosis</h4>
                        <p>After your scan is prepared, it's examined by a smart AI system that's been trained using thousands of eye images. It knows what signs to look for in different conditions like Diabetic Macular Edema, Age-related Macular Degeneration, and others. Within seconds, it gives a reliable prediction based on what it sees.</p>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="service__item text-center p-4 h-100">
                        <div class="service__item-icon mb-20 mb-xs-15">
                            <i class="fa-solid fa-user-doctor fa-4x" style="color: var(--rr-theme-primary);"></i>
                        </div>
                        <h4 class="title-animation mb-15">Specialist Review & Recommendation</h4>
                        <p>After the AI provides its diagnosis, one of our eye specialists reviews the result. The doctor confirms the findings and discusses them with you, offering professional advice and, if needed, recommending treatment to protect your vision and prevent further complications.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="appointment-btn-area text-center mt-4">
                    <a href="{{ url('/appointment') }}" class="rr-btn rr-btn__theme">
                        <span class="btn-wrap">
                            <span class="text-one">Book Your Appointment</span>
                            <span class="text-two">Book Your Appointment</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- How Our Eye Diagnosis Process Works end -->

@endsection