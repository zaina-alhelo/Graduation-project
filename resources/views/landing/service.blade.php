@extends('landing.master')

@section('content')
<!-- Breadcrumb area start  -->
<div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
    <div class="breadcrumb__background" data-background="{{ asset('landing/images/about1.png') }}"></div>
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12">
                <div class="breadcrumb__content text-center">
                    <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">AI Eye Diagnosis Services</h2>

                    <div class="breadcrumb__menu">
                        <nav>
                            <ul>
                                <li><span><a href="{{route('home')}}">Home</a></span></li>
                                <li class="active"><span>AI Services</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb area end -->

<!-- services 4 start -->
<section class="service-4 section-space">
    <div class="container">
        <div class="row mb-minus-30">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="service-4__item mb-30">
                    <div class="service-4__item-icon mb-40 mb-xs-20">
                        <img src="{{ asset('landing/assets/imgs/service-4/services__item-1.png') }}" alt="icon not found">
                    </div>
                    <div class="service-4__item-text">
                        <h4 class="mb-15 mb-xs-10 title-animation"><a href="service-details.html">Retinal Disease Detection</a></h4>
                        <p>Our AI system analyzes retinal images to detect early signs of diseases like diabetic retinopathy, macular degeneration, and glaucoma with 98% accuracy, enabling early intervention.</p>
                        <a class="rr-a-btn" href="service-details.html">Read More <i class="fa-solid fa-circle-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="service-4__item mb-30">
                    <div class="service-4__item-icon mb-40 mb-xs-20">
                        <img src="{{ asset('landing/assets/imgs/service-4/services__item-2.png') }}" alt="icon not found">
                    </div>
                    <div class="service-4__item-text">
                        <h4 class="mb-15 mb-xs-10 title-animation"><a href="service-details.html">Glaucoma Screening</a></h4>
                        <p>Our advanced machine learning algorithms assess optic nerve condition, eye pressure indicators, and visual field patterns to identify glaucoma in its earliest stages, when treatment is most effective.</p>
                        <a class="rr-a-btn" href="service-details.html">Read More <i class="fa-solid fa-circle-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="service-4__item mb-30">
                    <div class="service-4__item-icon mb-40 mb-xs-20">
                        <img src="{{ asset('landing/assets/imgs/service-4/services__item-3.png') }}" alt="icon not found">
                    </div>
                    <div class="service-4__item-text">
                        <h4 class="mb-15 mb-xs-10 title-animation"><a href="service-details.html">Diabetic Retinopathy Assessment</a></h4>
                        <p>Regular screening for people with diabetes is essential. Our AI can detect microaneurysms and other early signs of diabetic retinopathy before symptoms appear, helping prevent vision loss.</p>
                        <a class="rr-a-btn" href="service-details.html">Read More <i class="fa-solid fa-circle-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="service-4__item mb-30">
                    <div class="service-4__item-icon mb-40 mb-xs-20">
                        <img src="{{ asset('landing/assets/imgs/service-4/services__item-1.png') }}" alt="icon not found">
                    </div>
                    <div class="service-4__item-text">
                        <h4 class="mb-15 mb-xs-10 title-animation"><a href="service-details.html">Macular Degeneration Analysis</a></h4>
                        <p>Our AI technology identifies early signs of age-related macular degeneration (AMD) by detecting drusen deposits and subtle changes in the macula region, enabling prompt intervention.</p>
                        <a class="rr-a-btn" href="service-details.html">Read More <i class="fa-solid fa-circle-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="service-4__item mb-30">
                    <div class="service-4__item-icon mb-40 mb-xs-20">
                        <img src="{{ asset('landing/assets/imgs/service-4/services__item-1.png') }}" alt="icon not found">
                    </div>
                    <div class="service-4__item-text">
                        <h4 class="mb-15 mb-xs-10 title-animation"><a href="service-details.html">Comprehensive Eye Examination</a></h4>
                        <p>Beyond disease detection, our AI system provides a thorough analysis of overall eye health, including refractive errors, corneal conditions, and other vision-affecting issues in minutes.</p>
                        <a class="rr-a-btn" href="service-details.html">Read More <i class="fa-solid fa-circle-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="service-4__item mb-30">
                    <div class="service-4__item-icon mb-40 mb-xs-20">
                        <img src="{{ asset('landing/assets/imgs/service-4/services__item-3.png') }}" alt="icon not found">
                    </div>
                    <div class="service-4__item-text">
                        <h4 class="mb-15 mb-xs-10 title-animation"><a href="service-details.html">Early Vision Problem Detection</a></h4>
                        <p>Our AI technology can identify early signs of vision problems such as cataracts, retinal detachment, and vision-threatening emergencies, allowing for timely specialist referrals.</p>
                        <a class="rr-a-btn" href="service-details.html">Read More <i class="fa-solid fa-circle-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- services 4 end -->

@endsection