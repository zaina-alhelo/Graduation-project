@extends('landing.master')

@section('content')

 <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('landing/images/about1.png') }}"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">
                            <i class="fa-solid fa-circle-info me-2"></i>About Us
                        </h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Home</a></span></li>
                                    <li class="active"><span><i class="fa-solid fa-eye"></i> About OptiEye</span></li>
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
                                    <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd" d="M110.785 60.6122L0.517544 60.6122C0.406443 59.4679 0.330326 58.31 0.302317 57.1451L111 57.1451C110.972 58.31 110.896 59.4679 110.785 60.6122ZM109.661 67.6711L1.6416 67.6711C1.38486 66.5272 1.16266 65.3689 0.975465 64.204L110.327 64.204C110.14 65.3689 109.918 66.5272 109.661 67.6711ZM107.545 74.7304L3.76465 74.7304C3.33425 73.5931 2.94589 72.4352 2.59905 71.2633L108.704 71.2633C108.364 72.4352 107.975 73.5931 107.545 74.7304ZM104.325 81.7892L6.98383 81.7892C6.36624 80.6589 5.79063 79.501 5.24913 78.3221L106.053 78.3221C105.519 79.501 104.936 80.6589 104.325 81.7892ZM99.7326 88.8551L11.5702 88.8551C10.7094 87.7317 9.89809 86.5809 9.13485 85.388L102.175 85.388C101.405 86.5809 100.593 87.7318 99.7326 88.8551ZM93.3218 95.9144L17.9809 95.9144C16.7873 94.8116 15.6427 93.6537 14.5536 92.4473L96.7492 92.4473C95.6601 93.6537 94.515 94.8116 93.3218 95.9144ZM83.8722 102.973L27.4236 102.973C25.6333 101.919 23.9131 100.761 22.2616 99.5061L89.0412 99.5062C87.3896 100.755 85.662 101.919 83.8722 102.973ZM64.2512 110.033C61.448 110.469 58.5757 110.698 55.6479 110.698C52.72 110.698 49.8478 110.469 47.0446 110.033C42.7224 109.36 38.5663 108.188 34.6321 106.565L76.6633 106.565C72.7294 108.188 68.5734 109.36 64.2512 110.033ZM0.517545 50.0858L110.785 50.0858C110.896 51.2302 110.972 52.3881 111 53.5529L0.302317 53.5529C0.330326 52.388 0.406444 51.2302 0.517545 50.0858ZM1.64862 43.02L109.654 43.02C109.918 44.1643 110.14 45.3222 110.327 46.4871L0.975467 46.4871C1.16266 45.3222 1.38487 44.1643 1.64862 43.02ZM3.76465 35.9611L107.538 35.9611C107.968 37.098 108.357 38.2564 108.704 39.4282L2.59905 39.4282C2.94589 38.2564 3.33425 37.098 3.76465 35.9611ZM6.99079 28.9018L104.318 28.9018C104.936 30.0322 105.512 31.19 106.046 32.3689L5.25614 32.3689C5.79064 31.19 6.37319 30.0322 6.99079 28.9018ZM11.5702 21.843L99.7326 21.843C100.593 22.9663 101.405 24.1172 102.175 25.3101L9.13486 25.3101C9.89809 24.1172 10.7094 22.9663 11.5702 21.843ZM17.981 14.7837L93.3218 14.7837C94.515 15.8795 95.6601 17.0443 96.7492 18.2508L14.5536 18.2508C15.6427 17.0443 16.7873 15.8794 17.981 14.7837ZM27.4236 7.71783L83.8722 7.71783C85.662 8.77907 87.3826 9.93693 89.0342 11.1849L22.2686 11.1849C23.9132 9.92992 25.6333 8.77906 27.4236 7.71783ZM47.0861 0.658978C49.8753 0.221974 52.7336 0.000198036 55.6479 0.00019829C58.5617 0.000198545 61.4205 0.221975 64.2097 0.65898C68.5459 1.3313 72.7154 2.50319 76.6563 4.12609L34.6391 4.12608C38.5799 2.50319 42.7499 1.33129 47.0861 0.658978Z" fill="#185EC8"/>
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
                                    <i class="fa-solid fa-eye fa-2x" style="color: #185EC8;"></i>
                                </div>
                                <div class="about-us-2__main-content__list-item-text">
                                    <h4 class="mb-10 title-animation">99.26% Accuracy Rate</h4>
                                    <p class="mb-0">Our AI diagnostic system has been clinically tested to provide accurate results comparable to human ophthalmologists</p>
                                </div>
                            </div>
                            <div class="about-us-2__main-content__list-item">
                                <div class="about-us-2__main-content__list-item-icon">
                                    <i class="fa-solid fa-eye-dropper fa-2x" style="color: #185EC8;"></i>
                                </div>
                                <div class="about-us-2__main-content__list-item-text">
                                    <h4 class="mb-10 title-animation">Instant Analysis</h4>
                                    <p class="mb-0">Get detailed results and personalized recommendations within minutes after your eye scan is processed</p>
                                </div>
                            </div>
                        </div>
                       
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
                                <i class="fa-solid fa-eye-low-vision fa-2x" style="color: #185EC8;"></i>
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
                                <i class="fa-solid fa-brain fa-2x" style="color: #185EC8;"></i>
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
                                <i class="fa-solid fa-user-doctor fa-2x" style="color: #185EC8;"></i>
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
                                <i class="fa-solid fa-clipboard-list fa-2x" style="color: #185EC8;"></i>
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

                        <!-- Removing the diagnoses counter box -->
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
                    <li><img src="./assets/imgs/slider-text/health-guard.png" alt=""></li>
                    <li><strong>Vision Protection</strong></li>
                    <li><img src="./assets/imgs/slider-text/health-guard.png" alt=""></li>
                    <li>AI Eye Analysis</li>
                    <li><img src="./assets/imgs/slider-text/health-guard.png" alt=""></li>
                    <li><strong>Early Detection</strong></li>
                    <li><img src="./assets/imgs/slider-text/health-guard.png" alt=""></li>
                    <li>Vision Preservation</li>
                    <li><img src="./assets/imgs/slider-text/health-guard.png" alt=""></li>
                    <li><strong>Rapid Diagnosis</strong></li>
                    <li><img src="./assets/imgs/slider-text/health-guard.png" alt=""></li>
                    <li>Sight Safeguard</li>
                    <li><img src="./assets/imgs/slider-text/health-guard.png" alt=""></li>
                    <li><strong>Visual Health</strong></li>
                    <li><img src="./assets/imgs/slider-text/health-guard.png" alt=""></li>
                    <li>Retinal Care</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- slider-text end -->

    <!-- client-testimonial area start -->
    <section class="client-testimonial section-space overflow-hidden">
        <div class="container">
            <div class="client-testimonial__shape"><img class="img-fluid" src="assets/imgs/testimonial/client-testimonial__helth.png" alt="icon not found"></div>
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
                                                <img class="img-fluid" src="{{ asset('landing/images/wom3.jpeg') }}" alt="icon not found">
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
                                                <img class="img-fluid" src="{{ asset('landing/images/micheal.webp') }}" alt="icon not found">
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
                                                <img class="img-fluid" src="{{ asset('landing/images/wom2.webp') }}" alt="icon not found">
                                            </div>
                                            <div class="client-testimonial__item-author-content">
                                                <h5>Jennifer Chen</h5>
                                                <p class="mb-0">Accountant, 59</p>
                                            </div>
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