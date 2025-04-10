@extends('landing.master')

@section('content')

    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="images/about1.png"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Appointment</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('home')}}">Home</a></span></li>
                                    <li class="active"><span>Appointment</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- take-appointment-3 area start -->
    <section class="take-appointment-3 section-space__top section-space__bottom-70 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title-wrapper take-appointment-3__content text-center mb-60 mb-sm-50 mb-xs-40">
                        <h5 class="section__subtitle color-theme-primary mb-15 mb-xs-10 title-animation"><img src="{{ asset('landing/assets/imgs/ask-quesiton/heart.png') }}" alt="icon not found" class="img-fluid"> Take Appointment</h5>
                        <h2 class="section__title mb-20 mb-xs-15 title-animation">Elevating Business with Technology</h2>
                        <p class="mb-0">Medical science encompasses a vast array of fields dedicated to understanding and treating ailments, promoting health, and enhanci quality of life. Here's a brief exploration into this multifaceted domain medical </p>
                    </div>

                    <div class="take-appointment-3__form">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="take-appointment-3__form-input">
                                    <label for="name">Your name</label>
                                    <div class="input-wrapper">
                                        <input name="name" id="name" type="text" placeholder="Your name...">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="take-appointment-3__form-input">
                                    <label for="phone">Your Phone</label>
                                    <div class="input-wrapper">
                                        <input name="phone" id="phone" type="text" placeholder="Your phone...">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="take-appointment-3__form-input">
                                    <label for="phone">health type</label>
                                    <div class="take-appointment-3__form-input-select">
                                        <select id="health">
                                            <option>Choose one...</option>
                                            <option>Good</option>
                                            <option>Very Good</option>
                                            <option>Week</option>
                                            <option>Very Week</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="take-appointment-3__form-input">
                                    <label for="email">Your Email</label>
                                    <div class="input-wrapper">
                                        <input name="email" id="email" type="text" placeholder="Your email...">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="take-appointment-3__form-input">
                                    <label for="phone">Select doctor</label>
                                    <div class="take-appointment-3__form-input-select">
                                        <select id="doctor">
                                            <option>Your doctor...</option>
                                            <option>Dr. Paul</option>
                                            <option>Dr. Sabbir</option>
                                            <option>Dr. Rubel</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="take-appointment-3__form-input">
                                    <label for="datepicker">Select Date</label>
                                    <div class="input-wrapper">
                                        <input id="datepicker" name="date" type="text" placeholder="YY/MM/DD">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="rr-btn rr-btn__primary-color mt-0">
                                    <span class="btn-wrap">
                                        <span class="text-one">Appointment now</span>
                                        <span class="text-two">Appointment now</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- take-appointment-3 area end -->
@endsection