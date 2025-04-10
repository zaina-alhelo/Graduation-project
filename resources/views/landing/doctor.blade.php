@extends('landing.master')

@section('content')
   <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('landing/images/about1.png')}}"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Doctor</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('home')}}">Home</a></span></li>
                                    <li class="active"><span>Doctor</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <div class="doctor-page section-space">
        <div class="container">
            <div class="row mb-minus-30">
                <div class="col-xl-4 col-md-6">
                    <div class="team__item team__item-doctor_page team__item-box_shadow mb-30">
                        <div class="team__item-media">
                            <img class="img-fluid" src="{{ asset('landing/assets/imgs/doctor-page/doctor-1.jpg') }}" alt="image not found">
                        </div>

                        <div class="team__item-content">
                            <div class="team__item-content-left">
                                <h4 class="mb-10"><a href="doctor-details.html">Kathryn Murphy</a></h4>
                                <p class="mb-0">President of Sales</p>
                            </div>

                            <div class="team__item-content-right">
                                <div class="team__item-content-share">
                                    <a href="https://x.com/">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.52217 6.77686L15.4785 0.00195312H14.0671L8.89516 5.88451L4.76437 0.00195312H0L6.24656 8.89742L0 16.002H1.41155L6.87321 9.78977L11.2356 16.002H16L9.52183 6.77686H9.52217ZM7.58887 8.97579L6.95596 8.09L1.92015 1.04169H4.0882L8.15216 6.72991L8.78507 7.61569L14.0677 15.0095H11.8997L7.58887 8.97613V8.97579Z" fill="#071C3C"/>
                                        </svg>
                                    </a>
                                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="https://bd.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                                <button><i class="fa-regular fa-share-nodes"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="team__item team__item-doctor_page team__item-box_shadow mb-30">
                        <div class="team__item-media">
                            <img class="img-fluid" src="{{ asset('landing/assets/imgs/doctor-page/doctor-2.jpg') }}" alt="image not found">
                        </div>

                        <div class="team__item-content">
                            <div class="team__item-content-left">
                                <h4 class="mb-10"><a href="doctor-details.html">Savannah Nguyen</a></h4>
                                <p class="mb-0">Dog Trainer</p>
                            </div>

                            <div class="team__item-content-right">
                                <div class="team__item-content-share">
                                    <a href="https://x.com/">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.52217 6.77686L15.4785 0.00195312H14.0671L8.89516 5.88451L4.76437 0.00195312H0L6.24656 8.89742L0 16.002H1.41155L6.87321 9.78977L11.2356 16.002H16L9.52183 6.77686H9.52217ZM7.58887 8.97579L6.95596 8.09L1.92015 1.04169H4.0882L8.15216 6.72991L8.78507 7.61569L14.0677 15.0095H11.8997L7.58887 8.97613V8.97579Z" fill="#071C3C"/>
                                        </svg>
                                    </a>
                                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="https://bd.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                                <button><i class="fa-regular fa-share-nodes"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="team__item team__item-doctor_page team__item-box_shadow mb-30">
                        <div class="team__item-media">
                            <img class="img-fluid" src="{{ asset('landing/assets/imgs/doctor-page/doctor-3.jpg') }}" alt="image not found">
                        </div>

                        <div class="team__item-content">
                            <div class="team__item-content-left">
                                <h4 class="mb-10"><a href="doctor-details.html">Courtney Henry</a></h4>
                                <p class="mb-0">Medical Assistant</p>
                            </div>

                            <div class="team__item-content-right">
                                <div class="team__item-content-share">
                                    <a href="https://x.com/">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.52217 6.77686L15.4785 0.00195312H14.0671L8.89516 5.88451L4.76437 0.00195312H0L6.24656 8.89742L0 16.002H1.41155L6.87321 9.78977L11.2356 16.002H16L9.52183 6.77686H9.52217ZM7.58887 8.97579L6.95596 8.09L1.92015 1.04169H4.0882L8.15216 6.72991L8.78507 7.61569L14.0677 15.0095H11.8997L7.58887 8.97613V8.97579Z" fill="#071C3C"/>
                                        </svg>
                                    </a>
                                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="https://bd.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                                <button><i class="fa-regular fa-share-nodes"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="team__item team__item-doctor_page team__item-box_shadow mb-30">
                        <div class="team__item-media">
                            <img class="img-fluid" src="{{ asset('landing/assets/imgs/doctor-page/doctor-4.jpg') }}" alt="image not found">
                        </div>

                        <div class="team__item-content">
                            <div class="team__item-content-left">
                                <h4 class="mb-10"><a href="doctor-details.html">Floyd Miles</a></h4>
                                <p class="mb-0">Nursing Assistant</p>
                            </div>

                            <div class="team__item-content-right">
                                <div class="team__item-content-share">
                                    <a href="https://x.com/">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.52217 6.77686L15.4785 0.00195312H14.0671L8.89516 5.88451L4.76437 0.00195312H0L6.24656 8.89742L0 16.002H1.41155L6.87321 9.78977L11.2356 16.002H16L9.52183 6.77686H9.52217ZM7.58887 8.97579L6.95596 8.09L1.92015 1.04169H4.0882L8.15216 6.72991L8.78507 7.61569L14.0677 15.0095H11.8997L7.58887 8.97613V8.97579Z" fill="#071C3C"/>
                                        </svg>
                                    </a>
                                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="https://bd.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                                <button><i class="fa-regular fa-share-nodes"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="team__item team__item-doctor_page team__item-box_shadow mb-30">
                        <div class="team__item-media">
                            <img class="img-fluid" src="{{ asset('landing/assets/imgs/doctor-page/doctor-5.jpg') }}" alt="image not found">
                        </div>

                        <div class="team__item-content">
                            <div class="team__item-content-left">
                                <h4 class="mb-10"><a href="doctor-details.html">Leslie Alexander</a></h4>
                                <p class="mb-0">Marketing Coordinator</p>
                            </div>

                            <div class="team__item-content-right">
                                <div class="team__item-content-share">
                                    <a href="https://x.com/">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.52217 6.77686L15.4785 0.00195312H14.0671L8.89516 5.88451L4.76437 0.00195312H0L6.24656 8.89742L0 16.002H1.41155L6.87321 9.78977L11.2356 16.002H16L9.52183 6.77686H9.52217ZM7.58887 8.97579L6.95596 8.09L1.92015 1.04169H4.0882L8.15216 6.72991L8.78507 7.61569L14.0677 15.0095H11.8997L7.58887 8.97613V8.97579Z" fill="#071C3C"/>
                                        </svg>
                                    </a>
                                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="https://bd.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                                <button><i class="fa-regular fa-share-nodes"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="team__item team__item-doctor_page team__item-box_shadow mb-30">
                        <div class="team__item-media">
                            <img class="img-fluid" src="{{ asset('landing/assets/imgs/doctor-page/doctor-6.jpg') }}" alt="image not found">
                        </div>

                        <div class="team__item-content">
                            <div class="team__item-content-left">
                                <h4 class="mb-10"><a href="doctor-details.html">Devon Lane</a></h4>
                                <p class="mb-0">Devon Lane</p>
                            </div>

                            <div class="team__item-content-right">
                                <div class="team__item-content-share">
                                    <a href="https://x.com/">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.52217 6.77686L15.4785 0.00195312H14.0671L8.89516 5.88451L4.76437 0.00195312H0L6.24656 8.89742L0 16.002H1.41155L6.87321 9.78977L11.2356 16.002H16L9.52183 6.77686H9.52217ZM7.58887 8.97579L6.95596 8.09L1.92015 1.04169H4.0882L8.15216 6.72991L8.78507 7.61569L14.0677 15.0095H11.8997L7.58887 8.97613V8.97579Z" fill="#071C3C"/>
                                        </svg>
                                    </a>
                                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="https://bd.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                                <button><i class="fa-regular fa-share-nodes"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection