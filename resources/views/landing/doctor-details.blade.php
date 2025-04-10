@extends('landing.master')

@section('content')


    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('landing/images/about1.png')}}"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Doctor Details</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('home')}}">Home</a></span></li>
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
                        <img src="{{ asset('landing/assets/imgs/doctor-details/doctor-details.jpg') }}" class="img-fluid" alt="img not found">

                        <div class="doctor-details__social">
                            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 3.40625C9.96875 3.40625 11.5938 5.03125 11.5938 7C11.5938 9 9.96875 10.5938 8 10.5938C6 10.5938 4.40625 9 4.40625 7C4.40625 5.03125 6 3.40625 8 3.40625ZM8 9.34375C9.28125 9.34375 10.3125 8.3125 10.3125 7C10.3125 5.71875 9.28125 4.6875 8 4.6875C6.6875 4.6875 5.65625 5.71875 5.65625 7C5.65625 8.3125 6.71875 9.34375 8 9.34375ZM12.5625 3.28125C12.5625 2.8125 12.1875 2.4375 11.7188 2.4375C11.25 2.4375 10.875 2.8125 10.875 3.28125C10.875 3.75 11.25 4.125 11.7188 4.125C12.1875 4.125 12.5625 3.75 12.5625 3.28125ZM14.9375 4.125C15 5.28125 15 8.75 14.9375 9.90625C14.875 11.0312 14.625 12 13.8125 12.8438C13 13.6562 12 13.9062 10.875 13.9688C9.71875 14.0312 6.25 14.0312 5.09375 13.9688C3.96875 13.9062 3 13.6562 2.15625 12.8438C1.34375 12 1.09375 11.0312 1.03125 9.90625C0.96875 8.75 0.96875 5.28125 1.03125 4.125C1.09375 3 1.34375 2 2.15625 1.1875C3 0.375 3.96875 0.125 5.09375 0.0625C6.25 0 9.71875 0 10.875 0.0625C12 0.125 13 0.375 13.8125 1.1875C14.625 2 14.875 3 14.9375 4.125ZM13.4375 11.125C13.8125 10.2188 13.7188 8.03125 13.7188 7C13.7188 6 13.8125 3.8125 13.4375 2.875C13.1875 2.28125 12.7188 1.78125 12.125 1.5625C11.1875 1.1875 9 1.28125 8 1.28125C6.96875 1.28125 4.78125 1.1875 3.875 1.5625C3.25 1.8125 2.78125 2.28125 2.53125 2.875C2.15625 3.8125 2.25 6 2.25 7C2.25 8.03125 2.15625 10.2188 2.53125 11.125C2.78125 11.75 3.25 12.2188 3.875 12.4688C4.78125 12.8438 6.96875 12.75 8 12.75C9 12.75 11.1875 12.8438 12.125 12.4688C12.7188 12.2188 13.2188 11.75 13.4375 11.125Z" fill="white"/>
                                </svg>
                            </a>
                            <a href="https://www.twitter.com"><i class="fa-brands fa-twitter"></i></a>
                            <a href="https://www.instagram.com"><i class="fa-brands fa-pinterest-p"></i></a>
                        </div>
                    </div>
                    <div class="doctor-details__info">
                        <ul class="doctor-details__info-list">
                            <li>
                                <h5>Email address</h5>
                                <a href="mailto:doctorneed@gmail.com">doctorneed@gmail.com</a>
                            </li>
                            <li>
                                <h5>Phone number</h5>
                                <a href="tel:12214582754">+12-21-4582-754</a>
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
                            <h2 class="mb-20 title-animation">Empower to Flourish Health Future</h2>
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

                        <div class="doctor-details__form">
                            <div class="section__title-wrapper doctor-details__content mb-40 mb-xs-30">
                                <h5 class="section__subtitle color-theme-primary mb-15 mb-xs-10 title-animation"><img src="{{ asset('landing/assets/imgs/ask-quesiton/heart.png') }}" alt="icon not found" class="img-fluid"> Take Appointment</h5>
                                <h2 class="section__title mb-20 title-animation">Wellness Wavelengths Tuning Vibrant </h2>
                                <p class="mb-0">Medical science encompasses a vast array of fields dedicated to understandin and treating ailments, promoting health, and enhanci quality of life. Here's a brief exploration into this multifaceted domain medical student</p>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="doctor-details__form-input">
                                        <label for="name">Your name</label>
                                        <div class="input-wrapper">
                                            <input name="name" id="name" type="text" placeholder="Your name...">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="doctor-details__form-input">
                                        <label for="phone">Your Phone</label>
                                        <div class="input-wrapper">
                                            <input name="phone" id="phone" type="text" placeholder="Your phone...">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="doctor-details__form-input">
                                        <label for="phone">Subject</label>
                                        <div class="doctor-details__form-input-select">
                                            <select id="health">
                                                <option>Subject...</option>
                                                <option>Bangla</option>
                                                <option>English</option>
                                                <option>Math</option>
                                                <option>Very Week</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="doctor-details__form-input">
                                        <label for="email">Your Email</label>
                                        <div class="input-wrapper">
                                            <input name="email" id="email" type="text" placeholder="Your email...">
                                            <i class="fa-solid fa-paper-plane"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="doctor-details__form-input">
                                        <label for="textarea">Message</label>
                                        <div class="input-wrapper">
                                            <textarea name="textarea" id="textarea" placeholder="Messege"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="rr-btn rr-btn__primary-color">
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
    </section>
    <!-- doctor-details area start  -->

@endsection