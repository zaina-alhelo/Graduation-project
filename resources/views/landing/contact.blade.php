@extends('landing.master')

@section('content')
   <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('landing/images/contact1.jpg') }}"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Get in Touch</h2>
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
    <!-- Breadcrumb area end  -->

    <!-- Contact area start  -->
    <section class="pricing-appointment section-space">
        <div class="container">
            <div class="row align-items-end mb-60 mb-sm-50 mb-xs-40">
                <div class="col-lg-12">
                    <div class="section__title-wrapper text-center">
                        <h5 class="section__subtitle color-theme-primary mb-15 mb-xs-10 title-animation">Contact Us</h5>
                        <h2 class="section__title mb-0 title-animation">We're Here to Help You</h2>
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
                                <p>Call Us:</p>
                                <h5 class="mb-0"><a href="tel:+962795550129">+962 79 555 0129</a></h5>
                            </div>
                        </div>

                        <div class="pricing-appointment__contact-item d-flex align-items-end">
                            <div class="pricing-appointment__contact-item-icon d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="pricing-appointment__contact-item-text">
                                <p>Email Us:</p>
                                <h5 class="mb-0"><a href="mailto:info@yourdomain.com">optieyesup@gmail.com</a></h5>
                            </div>
                        </div>

                        <div class="pricing-appointment__contact-item d-flex align-items-end">
                            <div class="pricing-appointment__contact-item-icon d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="pricing-appointment__contact-item-text">
                                <p>Working Hours:</p>
                                <h5 class="mb-0">Sunday - Friday: 9 am - 8 pm</h5>
                            </div>
                        </div>

                      
                    </div>
                </div>

                <div class="col-lg-8">
                    <form id="pricing-appointment__form" method="POST" action="{{ route('contact') }}" class="pricing-appointment__form mt-md-60 mt-sm-60 mt-xs-60">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-input shadow-sm">
                                    <input name="name" id="name" type="text" placeholder="Your Name" style="box-shadow: 0 3px 10px rgba(0,0,0,0.08);" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-input shadow-sm">
                                    <input name="email" id="email" type="email" placeholder="Your Email" style="box-shadow: 0 3px 10px rgba(0,0,0,0.08);" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-input shadow-sm">
                                    <input name="phone" id="phone" type="tel" placeholder="Phone Number" style="box-shadow: 0 3px 10px rgba(0,0,0,0.08);" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-select shadow-sm">
                                    <select name="subject" id="subject" style="box-shadow: 0 3px 10px rgba(0,0,0,0.08);" required>
                                        <option value="">Select Subject</option>
                                        <option value="General Inquiry">General Inquiry</option>
                                        <option value="Appointment Request">Appointment Request</option>
                                        <option value="Feedback">Feedback</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="pricing-appointment__form-input shadow-sm">
                                    <textarea name="message" id="message" placeholder="Your Message" style="box-shadow: 0 3px 10px rgba(0,0,0,0.08);" required></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="rr-btn rr-btn__primary-color mt-0">
                                    <span class="btn-wrap">
                                        <span class="text-one">Send Message</span>
                                        <span class="text-two">Send Message</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact area end  -->

   
@endsection
