@extends('landing.master')

@section('content')

   <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('landing/images/contact1.jpg') }}"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Contact Us</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('home')}}">Home</a></span></li>
                                    <li class="active"><span>Contact</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- pricing-appointment area start  -->
    <section class="pricing-appointment section-space">
        <div class="container">
            <div class="row align-items-end mb-60 mb-sm-50 mb-xs-40">
                <div class="col-lg-6">
                    <div class="section__title-wrapper">
                        <h5 class="section__subtitle color-theme-primary mb-15 mb-xs-10 title-animation">Take Appointment</h5>
                        <h2 class="section__title mb-0 title-animation">Radiant Resilience Your Wellness Your Strength</h2>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="pricing-appointment__content-right mt-md-25 mt-sm-25 mt-xs-25">
                        <p class="mb-0">Medical science encompasses a vast array of fields dedicated to understanding and treating ailments, promoting health, and enhanci quality of life. Here's a brief exploration into this multifaceted domain medical student company remain</p>
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
                                <p>Requesting A Call:</p>
                                <h5 class="mb-0"><a href="tel:6295550129">(629) 555-0129</a></h5>
                            </div>
                        </div>

                        <div class="pricing-appointment__contact-item d-flex align-items-end">
                            <div class="pricing-appointment__contact-item-icon d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="pricing-appointment__contact-item-text">
                                <p>Sunday - Friday:</p>
                                <h5 class="mb-0">9 am - 8 pm</h5>
                            </div>
                        </div>

                        <div class="pricing-appointment__contact-item d-flex align-items-end">
                            <div class="pricing-appointment__contact-item-icon d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="pricing-appointment__contact-item-text">
                                <p>8181 Amman,  Khalda st </p>
                                <h5 class="mb-0"><a href="https://maps.app.goo.gl/1N77c8d8zieLRaot7">Jordan</a></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <form id="pricing-appointment__form"  method="POST" action="./mail.php" class="pricing-appointment__form mt-md-60 mt-sm-60 mt-xs-60">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-input shadow-sm">
                                    <input name="name" id="name" type="text" placeholder="Your name" style="box-shadow: 0 3px 10px rgba(0,0,0,0.08);">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-input shadow-sm">
                                    <input name="email" id="email" type="text" placeholder="Your email" style="box-shadow: 0 3px 10px rgba(0,0,0,0.08);">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-input shadow-sm">
                                    <input name="phone" id="phone" type="text" placeholder="Phone" style="box-shadow: 0 3px 10px rgba(0,0,0,0.08);">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-select shadow-sm">
                                    <select name="doctor" id="doctor" style="box-shadow: 0 3px 10px rgba(0,0,0,0.08);">
                                        <option>Choose a Doctor</option>
                                        <option>Dr. Yousef</option>
                                        <option>Dr. Khaled</option>
                                        <option>Dr. Rami</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="pricing-appointment__form-input shadow-sm">
                                    <textarea name="textarea" id="textarea" placeholder="Messege" style="box-shadow: 0 3px 10px rgba(0,0,0,0.08);"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="rr-btn rr-btn__primary-color mt-0">
                                    <span class="btn-wrap">
                                        <span class="text-one">Send Now</span>
                                        <span class="text-two">Send Now</span>
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