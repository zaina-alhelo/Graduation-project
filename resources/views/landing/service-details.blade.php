@extends('landing.master')

@section('content')


 <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('landing/images/about1.png') }}"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Eye Care Services</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('home')}}">Home</a></span></li>
                                    <li class="active"><span>Service Details</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <section class="service-details section-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="service-details__content">
                        <div class="service-details__content-media mb-20">
                            <img src="{{ asset('landing/assets/imgs/service-details/service-details-1.jpg') }}" class="img-fluid" alt="Advanced eye examination">
                        </div>

                        <h2 class="title-animation mb-20">Advanced AI-Powered Eye Diagnosis</h2>

                        <p class="mb-20">At OptiEye, we leverage cutting-edge artificial intelligence technology to provide accurate and efficient eye diagnostics. Our system is designed to detect various eye conditions including cataracts, glaucoma, diabetic retinopathy, and macular degeneration at early stages, when treatment is most effective.</p>

                        <p class="mb-20">Our AI diagnostic platform analyzes eye images with remarkable precision, comparing patterns against a database of millions of clinical cases. The analysis is then reviewed by our specialist ophthalmologists to ensure the highest level of diagnostic accuracy and personalized care recommendations.</p>

                        <ul class="mb-40">
                            <li><span><i class="fa-solid fa-check"></i></span> <h5>High-accuracy AI detection of common eye conditions</h5></li>
                            <li><span><i class="fa-solid fa-check"></i></span> <h5>Expert ophthalmologist review of all AI findings</h5></li>
                            <li><span><i class="fa-solid fa-check"></i></span> <h5>Detailed reports with treatment recommendations</h5></li>
                            <li><span><i class="fa-solid fa-check"></i></span> <h5>Secure storage of eye health records</h5></li>
                        </ul>

                        <h3 class="title-animation mb-10">How Our Eye Diagnosis Process Works</h3>

                        <p class="mb-30">Our streamlined process combines technological innovation with medical expertise to deliver comprehensive eye care solutions accessible from anywhere.</p>

                        <div class="row mb-40">
                            <div class="col-lg-6">
                                <div class="service-details__content-media-item service-details__content-media-item-1">
                                    <div class="service-details__content-media-item_img mb-10">
                                        <img src="{{ asset('landing/assets/imgs/service-details/service-details-2.jpg') }}" class="img-fluid" alt="Eye image upload process">
                                    </div>
                                    <h4 class="title-animation mb-15">Simple Image Upload</h4>
                                    <p>Take a clear photo of your eye using your smartphone or digital camera and upload it through our secure platform. Our system guides you through capturing the optimal image for accurate analysis.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="service-details__content-media-item service-details__content-media-item-2">
                                    <div class="service-details__content-media-item_img mb-10">
                                        <img src="{{ asset('landing/assets/imgs/service-details/service-details-3.jpg') }}" class="img-fluid" alt="AI analysis process">
                                    </div>
                                    <h4 class="title-animation mb-15">Advanced AI Analysis</h4>
                                    <p>Our proprietary AI algorithm processes your eye image, identifying potential issues with 95% accuracy. The system examines various aspects of eye health, from surface conditions to deeper structural anomalies.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-40">
                            <div class="col-lg-6">
                                <div class="service-details__content-media-item service-details__content-media-item-1">
                                    <div class="service-details__content-media-item_img mb-10">
                                        <img src="{{ asset('landing/assets/imgs/service-details/service-details-2.jpg') }}" class="img-fluid" alt="Doctor reviewing results">
                                    </div>
                                    <h4 class="title-animation mb-15">Expert Ophthalmologist Review</h4>
                                    <p>Our team of specialist ophthalmologists reviews the AI findings, providing additional insights and confirming the diagnosis. This dual-layer approach ensures exceptional diagnostic accuracy.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="service-details__content-media-item service-details__content-media-item-2">
                                    <div class="service-details__content-media-item_img mb-10">
                                        <img src="{{ asset('landing/assets/imgs/service-details/service-details-3.jpg') }}" class="img-fluid" alt="Personalized treatment plan">
                                    </div>
                                    <h4 class="title-animation mb-15">Personalized Care Plan</h4>
                                    <p>Receive a comprehensive report with detailed findings and personalized treatment recommendations. For conditions requiring further care, we can refer you to appropriate specialists in your area.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Removed diagnose button -->
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection