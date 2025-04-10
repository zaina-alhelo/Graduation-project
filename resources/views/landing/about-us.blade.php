@extends('landing.master')

@section('content')

    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="./images/about1.png"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">About Us</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('home')}}">Home</a></span></li>
                                    <li class="active"><span>AI Eye Diagnosis</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!--about-us-2 start -->
    <section class="about-us-2 about-us-2__space">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6">
                  <div class="about-us-2__media">
    <div class="about-us-2__media-image-1">
        <img src="{{ asset('landing/images/mdoc.jpg') }}" class="img-fluid" alt="AI eye scanning technology">
    </div>
    <div class="about-us-2__media-image-2">
        <img src="{{ asset('landing/images/docus1.jpg') }}" class="img-fluid" alt="Eye diagnosis result">
        <div class="circle upDown">
            <svg width="111" height="111" viewBox="0 0 111 111" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd" d="...Z" fill="#185EC8"/>
            </svg>
        </div>
    </div>
</div>

                </div>
                <div class="col-lg-6">
                    <div class="about-us-2__main-content">
                        <div class="section__title-wrapper about-us-2__content mb-60 mb-xs-50">
                            <h5 class="section__subtitle color-theme-primary mb-15 mb-xs-10 title-animation"><img src="{{ asset('landing/assets/imgs/ask-quesiton/heart.png') }}" alt="icon not found" class="img-fluid"> Our Technology</h5>
                            <h2 class="section__title mb-20 title-animation">AI-Powered Eye Diagnosis For Early Detection</h2>
                            <p class="mb-0">OptiEye uses advanced machine learning algorithms to analyze retinal images and detect early signs of eye diseases like diabetic retinopathy, glaucoma, and macular degeneration with high accuracy.</p>
                        </div>

                        <div class="about-us-2__main-content__list">
                            <div class="about-us-2__main-content__list-item">
                                <div class="about-us-2__main-content__list-item-icon">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_9843_578)">
                                            <path d="M23.8477 4.33594C23.2984 4.33594 22.7659 4.40871 22.2588 4.54436C20.9302 2.83084 18.8755 1.81641 16.6992 1.81641C15.0095 1.81641 13.7096 2.65898 12.4524 3.47385C12.2819 3.58441 12.1076 3.69732 11.9331 3.8076C10.626 2.53793 8.85955 1.81641 7.03124 1.81641C5.07152 1.81641 3.18568 2.64404 1.8573 4.08697L2.50388 4.68223C3.66632 3.41947 5.3165 2.69531 7.03124 2.69531C8.55052 2.69531 10.0208 3.26473 11.1447 4.27365C9.96082 4.91449 8.76632 5.28826 7.87107 5.28826V6.16717C9.04482 6.16717 10.6232 5.63455 12.0933 4.7424C12.3765 4.57055 12.6581 4.38797 12.9305 4.21137C14.1333 3.43172 15.2695 2.69531 16.6992 2.69531C18.5046 2.69531 20.2148 3.49301 21.3785 4.85379C19.212 5.80687 17.6953 7.97361 17.6953 10.4882C17.6953 11.5507 17.9695 12.5938 18.4895 13.5133V15.8463H20.3305C20.1952 16.2821 20.0743 16.7433 19.9675 17.2328L17.9194 18.4228L17.3054 22.0457L19.3526 23.2277C19.345 23.5525 19.3398 23.8846 19.3375 24.2255L20.2164 24.2315C20.2403 20.7351 20.5601 18.0471 21.192 16.0386C22.0173 16.4336 22.9252 16.6406 23.8477 16.6406C27.2401 16.6406 30.0001 13.8807 30.0001 10.4883C30.0001 7.09588 27.2401 4.33594 23.8477 4.33594ZM18.274 21.5902L18.7172 18.9758L19.7522 18.3744C19.5684 19.5125 19.4474 20.7891 19.3854 22.2318L18.274 21.5902ZM23.8477 15.7617C22.9019 15.7617 21.9741 15.5082 21.1645 15.0288L21.0609 14.9675H19.3684V13.2749L19.307 13.1713C18.8276 12.362 18.5742 11.4342 18.5742 10.4882C18.5742 7.58045 20.9399 5.21478 23.8477 5.21478C26.7554 5.21478 29.1211 7.58045 29.1211 10.4882C29.1211 13.396 26.7554 15.7617 23.8477 15.7617Z" fill="#185EC8"/>
                                            <path d="M25.166 7.85156H22.5293V9.16992H21.2109V11.8066H22.5293V13.1251H25.166V11.8067H26.4844V9.16998H25.166V7.85156ZM25.6055 10.0488V10.9277H24.2871V12.2462H23.4082V10.9278H22.0898V10.0489H23.4082V8.73053H24.2871V10.0489H25.6055V10.0488Z" fill="#185EC8"/>
                                            <path d="M16.6992 27.3046C15.2453 27.3046 14.0624 26.1218 14.0624 24.6679C14.0624 22.7264 13.8667 21.0916 13.4964 19.9406C13.0106 18.4306 12.3475 18.1136 11.8768 18.1136C11.4042 18.1136 10.7372 18.4327 10.2431 19.9528C9.86689 21.1104 9.66797 22.7409 9.66797 24.6679C9.66797 26.1218 8.48514 27.3046 7.03125 27.3046C5.57736 27.3046 4.39453 26.1218 4.39453 24.6679C4.39453 23.7035 4.36717 22.8204 4.31748 22.0079L6.17549 20.4153L6.23496 16.252L7.60822 14.3171L6.00264 11.5382V8.93626L1.07461 7.30513C1.25684 6.59884 1.56398 5.92847 1.98967 5.32114L1.26996 4.81665C0.43916 6.00194 0 7.39577 0 8.84761C0 10.6834 0.570762 11.8979 1.2317 13.3043C2.24924 15.4695 3.51563 18.1642 3.51563 24.6679C3.51563 26.6064 5.09273 28.1835 7.03125 28.1835C8.96977 28.1835 10.5469 26.6064 10.5469 24.6679C10.5469 20.3898 11.5359 18.9925 11.8768 18.9925C12.2256 18.9925 13.1835 20.3376 13.1835 24.6679C13.1835 26.6064 14.7606 28.1835 16.6992 28.1835C18.4348 28.1835 19.9307 26.8876 20.1787 25.1691L19.3088 25.0435C19.1228 26.3326 18.0009 27.3046 16.6992 27.3046ZM2.02711 12.9304C1.38557 11.5654 0.878906 10.4871 0.878906 8.84761C0.878906 8.62261 0.891563 8.39936 0.915469 8.17829L5.12373 9.57118V11.7739L6.56502 14.2685L5.36016 15.9663L5.30244 20.0063L4.23428 20.9218C3.85254 16.8157 2.85955 14.7018 2.02711 12.9304Z" fill="#185EC8"/>
                                            <path d="M18.0176 4.49243H18.8965V5.37134H18.0176V4.49243Z" fill="#185EC8"/>
                                            <path d="M16.2598 3.61353H17.1387V4.49243H16.2598V3.61353Z" fill="#185EC8"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_9843_578">
                                                <rect width="30" height="30" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="about-us-2__main-content__list-item-text">
                                    <h4 class="mb-10 title-animation">99.26% Accuracy Rate</h4>
                                    <p class="mb-0">Our AI diagnostic system has been clinically tested to provide accurate results comparable to human ophthalmologists</p>
                                </div>
                            </div>
                            <div class="about-us-2__main-content__list-item">
                                <div class="about-us-2__main-content__list-item-icon">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_9843_589)">
                                            <path d="M19.3468 11.4258H20.2257V12.3047H19.3468V11.4258Z" fill="#185EC8"/>
                                            <path d="M25.166 17.0548V16.8164C25.166 15.9988 24.605 15.3098 23.8477 15.1142V10.1074C23.8477 8.89582 22.862 7.91016 21.6504 7.91016H20.2257V2.19727C20.2257 1.47029 19.6342 0.878906 18.9073 0.878906H16.2428C16.0614 0.367441 15.5729 0 15 0H9.33492C8.60801 0 8.01656 0.591387 8.01656 1.31836V15.3809C8.01656 16.1078 8.60795 16.6992 9.33492 16.6992H11.728V25.2346C11.728 27.3776 9.98455 29.1211 7.84154 29.1211C5.69853 29.1211 3.95508 27.3776 3.95508 25.2346V18.4014C4.7124 18.2058 5.27344 17.5168 5.27344 16.6992V16.0071C5.56119 15.7598 5.82645 15.4494 6.06158 15.0799C6.68689 14.0972 7.03125 12.7995 7.03125 11.4258C7.03125 10.0521 6.68689 8.75432 6.06158 7.7717C5.39701 6.72738 4.49285 6.15234 3.51562 6.15234C2.5384 6.15234 1.63424 6.72744 0.969668 7.7717C0.344355 8.75432 0 10.0521 0 11.4258C0 12.4255 0.184453 13.3973 0.533438 14.2361L1.34496 13.8985C1.04004 13.1657 0.878906 12.3107 0.878906 11.4258C0.878906 9.04371 2.08635 7.03125 3.51562 7.03125C4.9449 7.03125 6.15234 9.04371 6.15234 11.4258C6.15234 13.8079 4.94484 15.8203 3.51562 15.8203C2.85053 15.8203 2.21045 15.3908 1.71322 14.6111L0.972129 15.0836C1.20662 15.4513 1.47105 15.7605 1.75781 16.007V16.6992C1.75781 17.5168 2.31885 18.2058 3.07617 18.4014V25.2346C3.07617 27.8623 5.21391 30.0001 7.84154 30.0001C10.4692 30.0001 12.6069 27.8623 12.6069 25.2346V16.6992H15C15.5729 16.6992 16.0613 16.3318 16.2428 15.8203H18.9073C19.6342 15.8203 20.2257 15.2289 20.2257 14.502V13.1836H19.3468V14.502C19.3468 14.7443 19.1497 14.9414 18.9073 14.9414H16.3184V1.75781H18.9073C19.1497 1.75781 19.3468 1.95492 19.3468 2.19727V10.5469H20.2257V8.78906H21.6504C22.3773 8.78906 22.9688 9.38045 22.9688 10.1074V15.1142C22.2114 15.3098 21.6504 15.9988 21.6504 16.8164V17.0548C18.8664 17.826 16.8164 20.382 16.8164 23.4082C16.8164 27.0429 19.7735 30 23.4082 30C27.0429 30 30 27.0429 30 23.4082C30 20.382 27.95 17.826 25.166 17.0548ZM2.63672 16.6992V16.5379C2.91949 16.6443 3.2141 16.6992 3.51562 16.6992C3.81721 16.6992 4.11176 16.6443 4.39453 16.5379V16.6992C4.39453 17.1838 4.00025 17.5781 3.51562 17.5781C3.031 17.5781 2.63672 17.1838 2.63672 16.6992ZM15.4395 15.3809C15.4395 15.6231 15.2423 15.8203 15 15.8203H9.33492C9.09264 15.8203 8.89547 15.6231 8.89547 15.3809V1.31836C8.89547 1.07607 9.09258 0.878906 9.33492 0.878906H15C15.2423 0.878906 15.4395 1.07607 15.4395 1.31836V15.3809ZM22.5293 16.8164C22.5293 16.3318 22.9236 15.9375 23.4082 15.9375C23.8928 15.9375 24.2871 16.3318 24.2871 16.8164V16.8751C23.9995 16.8366 23.7062 16.8163 23.4082 16.8163C23.1102 16.8163 22.8169 16.8366 22.5293 16.8751V16.8164ZM23.4082 29.1211C20.2581 29.1211 17.6953 26.5583 17.6953 23.4082C17.6953 20.2581 20.2581 17.6953 23.4082 17.6953C26.5583 17.6953 29.1211 20.2581 29.1211 23.4082C29.1211 26.5583 26.5583 29.1211 23.4082 29.1211Z" fill="#185EC8"/>
                                            <path d="M23.4082 18.5742C20.7428 18.5742 18.5742 20.7427 18.5742 23.4082C18.5742 26.0737 20.7428 28.2422 23.4082 28.2422C26.0736 28.2422 28.2422 26.0736 28.2422 23.4082C28.2422 20.7428 26.0736 18.5742 23.4082 18.5742ZM20.9415 26.4964L21.5437 25.8942L20.9222 25.2727L20.32 25.875C19.8646 25.306 19.5628 24.6093 19.4782 23.8477H20.332V22.9688H19.4781C19.5628 22.2072 19.8646 21.5105 20.32 20.9415L20.9222 21.5438L21.5437 20.9224L20.9415 20.3201C21.5105 19.8646 22.2071 19.5628 22.9688 19.4782V20.332H23.8477V19.4781C24.6093 19.5628 25.3059 19.8646 25.8749 20.32L25.2726 20.9224L25.8941 21.5438L26.4964 20.9415C26.9518 21.5105 27.2536 22.2072 27.3382 22.9688H26.4844V23.8477H27.3383C27.2537 24.6093 26.9518 25.306 26.4964 25.875L25.8942 25.2727L25.2727 25.8942L25.875 26.4964C25.1981 27.0382 24.3406 27.3633 23.4082 27.3633C22.4758 27.3633 21.6183 27.0382 20.9415 26.4964Z" fill="#185EC8"/>
                                            <path d="M24.605 21.5898L23.9762 22.2187C23.8041 22.1362 23.6115 22.0898 23.4082 22.0898C22.6813 22.0898 22.0898 22.6812 22.0898 23.4082C22.0898 24.1352 22.6813 24.7265 23.4082 24.7265C24.1351 24.7265 24.7266 24.1352 24.7266 23.4082C24.7266 23.2049 24.6802 23.0123 24.5977 22.8402L25.2265 22.2113L24.605 21.5898ZM23.4082 23.8476C23.1659 23.8476 22.9687 23.6505 22.9687 23.4082C22.9687 23.1659 23.1659 22.9687 23.4082 22.9687C23.6505 22.9687 23.8477 23.1658 23.8477 23.4082C23.8477 23.6505 23.6505 23.8476 23.4082 23.8476Z" fill="#185EC8"/>
                                            <path d="M3.35693 8.34961H4.23584V9.22852H3.35693V8.34961Z" fill="#185EC8"/>
                                            <path d="M4.23584 10.1074H5.11475V10.9863H4.23584V10.1074Z" fill="#185EC8"/>
                                            <path d="M17.589 4.39453H18.4679V5.27344H17.589V4.39453Z" fill="#185EC8"/>
                                            <path d="M17.589 2.63672H18.4679V3.51562H17.589V2.63672Z" fill="#185EC8"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_9843_589">
                                                <rect width="30" height="30" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="about-us-2__main-content__list-item-text">
                                    <h4 class="mb-10 title-animation">Instant Analysis</h4>
                                    <p class="mb-0">Get detailed results and personalized recommendations within minutes after your eye scan is processed</p>
                                </div>
                            </div>
                        </div>
                        <a href="service.html" class="rr-btn position-relative overflow-hidden">
                            <div class="panel wow"></div>
                            <span class="btn-wrap">
                                <span class="text-one">Try OptiEye AI <i class="fa-solid fa-plus"></i></span>
                                <span class="text-two">Try OptiEye AI <i class="fa-solid fa-plus"></i></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about-us-2 end -->

    <!-- service-3 area start -->
    <section class="service-3 section-space__bottom">
        <div class="container">
            <div class="row mb-minus-50">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-3__item mb-50">
                        <div class="service-3__item-header d-flex mb-40 mb-xs-35">
                            <div class="service-3__item-header-icon">
                              <img class="img-fluid" src="{{ asset('landing/assets/imgs/service-3/service-icon-1.png') }}" alt="icon not found">
                             </div>
                            <h4 class="mb-0">Retinal Scanning</h4>
                        </div>

                        <p class="mb-0">Advanced imaging technology captures detailed photographs of your retina, allowing our AI to detect subtle changes that might indicate disease</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-3__item mb-50">
                        <div class="service-3__item-header d-flex mb-40 mb-xs-35">
                            <div class="service-3__item-header-icon">
<img class="img-fluid" src="{{ asset('landing/assets/imgs/service-3/service-icon-2.png') }}" alt="icon not found">
                            </div>
                            <h4 class="mb-0">AI Diagnosis</h4>
                        </div>

                        <p class="mb-0">Our machine learning algorithms analyze your eye scan against a database of millions of images to identify potential issues with exceptional accuracy</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-3__item mb-50">
                        <div class="service-3__item-header d-flex mb-40 mb-xs-35">
                            <div class="service-3__item-header-icon">
<img class="img-fluid" src="{{ asset('landing/assets/imgs/service-3/service-icon-3.png') }}" alt="icon not found">
                            </div>
                            <h4 class="mb-0">Specialist Review</h4>
                        </div>

                        <p class="mb-0">Ophthalmologists review AI-flagged concerns, ensuring you receive professional validation of any detected conditions</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="service-3__item mb-50">
                        <div class="service-3__item-header d-flex mb-40 mb-xs-35">
                            <div class="service-3__item-header-icon">
<img class="img-fluid" src="{{ asset('landing/assets/imgs/service-4/service-icon-4.png') }}" alt="icon not found">
                            </div>
                            <h4 class="mb-0">Treatment Planning</h4>
                        </div>

                        <p class="mb-0">Receive personalized treatment recommendations and referrals to specialists based on your specific eye health condition</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service-3 area end -->

    <!-- service-3 area start -->
    <section class="wellness-expertise section-space__bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="wellness-expertise__content">
                        <h2 class="section__title mb-15 mb-xs-10  title-animation">Why Choose AI Eye Diagnosis?</h2>
                        <p class="mb-40 mb-xs-30">Early detection is critical for preventing vision loss from common eye diseases. Our AI technology can detect signs of disease at earlier stages than traditional screenings, potentially saving your vision. OptiEye makes professional-grade diagnostics accessible to everyone.</p>
                        <ul class="wellness-expertise__content__list">
                            <li><i class="fa-solid fa-check"></i>Early Detection of Diseases</li>
                            <li><i class="fa-solid fa-check"></i>Non-Invasive Screening</li>
                            <li><i class="fa-solid fa-check"></i>Accessible Healthcare</li>
                            <li><i class="fa-solid fa-check"></i>Regular Monitoring</li>
                        </ul>
                    </div>
                </div>

           <div class="col-lg-6">
    <div class="wellness-expertise__media">
        <img src="{{ asset('landing/images/ey1.jpg') }}" class="img-fluid" alt="AI eye screening">

        <div class="wellness-expertise__media__box">
            <div class="wellness-expertise__media__box-icon">
                <img class="img-fluid" src="{{ asset('landing/assets/imgs/wellness-expertise/note.svg') }}" alt="icon not found">
            </div>
            <div class="wellness-expertise__media__box-text">
                <h3><span class="odometer" data-count="85000">0</span>+</h3>
                <h6>Diagnoses Completed</h6>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </section>
    <!-- slider-text end -->

    <!-- slider-text start -->
    <div class="slider-text">
        <div class="container">
            <div class="rr-scroller" data-speed="slow">
                <ul class="text-anim rr-scroller__inner">
                <li><img src="{{ asset('landing/assets/imgs/slider-text/health-guard.png') }}" alt=""></li>
<li><strong>Vision Protection</strong></li>
<li><img src="{{ asset('landing/assets/imgs/slider-text/health-guard.png') }}" alt=""></li>
<li>AI Eye Analysis</li>
<li><img src="{{ asset('landing/assets/imgs/slider-text/health-guard.png') }}" alt=""></li>
<li><strong>Early Detection</strong></li>
<li><img src="{{ asset('landing/assets/imgs/slider-text/health-guard.png') }}" alt=""></li>
<li>Vision Preservation</li>
<li><img src="{{ asset('landing/assets/imgs/slider-text/health-guard.png') }}" alt=""></li>
<li><strong>Rapid Diagnosis</strong></li>
<li><img src="{{ asset('landing/assets/imgs/slider-text/health-guard.png') }}" alt=""></li>
<li>Sight Safeguard</li>
<li><img src="{{ asset('landing/assets/imgs/slider-text/health-guard.png') }}" alt=""></li>
<li><strong>Visual Health</strong></li>
<li><img src="{{ asset('landing/assets/imgs/slider-text/health-guard.png') }}" alt=""></li>
<li>Retinal Care</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- slider-text end -->

    <!-- client-testimonial area start -->
    <section class="client-testimonial section-space overflow-hidden">
        <div class="container">
            <div class="client-testimonial__shape"><img class="img-fluid" src="{{ asset('landing/assets/imgs/testimonial/client-testimonial__helth.png') }}" alt="icon not found"></div>
            <div class="row align-items-end mb-60 mb-sm-50 mb-xs-40">
                <div class="col-lg-7">
                    <div class="section__title-wrapper client-testimonial__content">
                        <h5 class="section__subtitle color-theme-primary mb-15 mb-xs-10 title-animation"><img src="{{ asset('landing/assets/imgs/ask-quesiton/heart.png') }}" alt="icon not found" class="img-fluid"> Success Stories</h5>
                        <h2 class="section__title mb-0 title-animation">How OptiEye AI Has Helped Preserve Vision</h2>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="client-testimonial__content-right mt-md-25 mt-sm-25 mt-xs-25">
                        <p class="mb-0">Our AI system has helped thousands of people detect eye conditions early, allowing for timely intervention and treatment. Here are some stories from people whose vision was saved through early AI detection.</p>
                    </div>
                </div>
            </div>

      <div class="row align-items-center">
    <div class="col-lg-6">
        <div class="client-testimonial__media">
            <img class="img-fluid" src="{{ asset('landing/images/abf2.png') }}" alt="Patient testimonial">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="client-testimonial__slider-wrapper">
            <div class="swiper client-testimonial__slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="client-testimonial__item">
                            <div class="client-testimonial__item-icon mb-30 mb-xs-25">
                                <img class="img-fluid" src="{{ asset('landing/assets/imgs/client-testimonial/qoute.png') }}" alt="icon not found">
                            </div>

                            <p class="mb-30 mb-xs-25">OptiEye detected early signs of diabetic retinopathy during my routine screening that I had no symptoms for. My doctor confirmed the diagnosis and started treatment immediately. Thanks to early detection, I've maintained my vision completely.</p>

                            <div class="client-testimonial__item-author d-flex align-items-center">
                                <div class="client-testimonial__item-author-thumb">
                                    <img class="img-fluid" src="{{ asset('landing/assets/imgs/client-testimonial/thumb.png') }}" alt="icon not found">
                                </div>
                                <div class="client-testimonial__item-author-content">
                                    <h5>Sarah Johnson</h5>
                                    <p class="mb-0">Teacher, 52</p>
                                </div>
                            </div>
                        </div>
                    </div>

                                <div class="swiper-slide">
    <div class="client-testimonial__item">
        <div class="client-testimonial__item-icon mb-30 mb-xs-25">
            <img class="img-fluid" src="{{ asset('landing/assets/imgs/client-testimonial/qoute.png') }}" alt="icon not found">
        </div>

        <p class="mb-30 mb-xs-25">I was skeptical about AI diagnosis, but the OptiEye scan detected the early stages of glaucoma before I experienced any vision loss. My ophthalmologist was impressed with the accuracy and we started treatment right away.</p>

        <div class="client-testimonial__item-author d-flex align-items-center">
            <div class="client-testimonial__item-author-thumb">
                <img class="img-fluid" src="{{ asset('landing/assets/imgs/client-testimonial/thumb.png') }}" alt="icon not found">
            </div>
            <div class="client-testimonial__item-author-content">
                <h5>Michael Roberts</h5>
                <p class="mb-0">Software Engineer, 45</p>
            </div>
        </div>
    </div>
</div>

<div class="swiper-slide">
    <div class="client-testimonial__item">
        <div class="client-testimonial__item-icon mb-30 mb-xs-25">
            <img class="img-fluid" src="{{ asset('landing/assets/imgs/client-testimonial/qoute.png') }}" alt="icon not found">
        </div>

        <p class="mb-30 mb-xs-25">As someone with a family history of macular degeneration, I was worried about my vision. The OptiEye scan showed early changes that allowed my doctor to start preventative measures before any vision loss occurred.</p>

        <div class="client-testimonial__item-author d-flex align-items-center">
            <div class="client-testimonial__item-author-thumb">
                <img class="img-fluid" src="{{ asset('landing/assets/imgs/client-testimonial/thumb.png') }}" alt="icon not found">
            </div>
            <div class="client-testimonial__item-author-content">
                <h5>Jennifer Chen</h5>
                <p class="mb-0">Accountant, 59</p>
            </div>
        </div>
    </div>
</div>

                            <div class="client-testimonial__slider-dot"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client-testimonial area end -->

@endsection