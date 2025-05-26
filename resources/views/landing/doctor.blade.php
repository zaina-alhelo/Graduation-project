@extends('landing.master')

@section('content')
 <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('landing/images/about1.png') }}"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Doctor</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('home') }}">Home</a></span></li>
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
                            <img class="img-fluid" src="{{ asset('landing/images/doc1.jpg') }}" alt="image not found">
                        </div>

                        <div class="team__item-content">
                            <div class="team__item-content-left">
                                <h4 class="mb-10"><a href="{{ route('drAnas') }}">Dr.Anas</a></h4>
                                <p class="mb-0">Eye Surgeon</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="team__item team__item-doctor_page team__item-box_shadow mb-30">
                        <div class="team__item-media">
                            <img class="img-fluid" src="{{ asset('landing/images/doc2.jpg') }}" alt="image not found">
                        </div>

                        <div class="team__item-content">
                            <div class="team__item-content-left">
                                <h4 class="mb-10"><a href="{{ route('drAhmad') }}">Dr.Ahmad</a></h4>
                                <p class="mb-0">Eye Expert</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="team__item team__item-doctor_page team__item-box_shadow mb-30">
                        <div class="team__item-media">
                            <img class="img-fluid" src="{{ asset('landing/images/doc3.jpg') }}" alt="image not found">
                        </div>

                        <div class="team__item-content">
                            <div class="team__item-content-left">
                                <h4 class="mb-10"><a href="{{ route('drKhaled') }}">Dr.Khaled</a></h4>
                                <p class="mb-0">Medical Assistant</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="team__item team__item-doctor_page team__item-box_shadow mb-30">
                        <div class="team__item-media">
                            <img class="img-fluid" src="{{ asset('landing/images/doc3.jpg') }}" alt="image not found">
                        </div>

                        <div class="team__item-content">
                            <div class="team__item-content-left">
                                <h4 class="mb-10"><a href="{{ route('drNoor') }}">Dr.Noor</a></h4>
                                <p class="mb-0">Nursing Assistant</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="team__item team__item-doctor_page team__item-box_shadow mb-30">
                        <div class="team__item-media">
                            <img class="img-fluid" src="{{ asset('landing/images/doc4.jpg') }}" alt="image not found">
                        </div>

                        <div class="team__item-content">
                            <div class="team__item-content-left">
                                <h4 class="mb-10"><a href="{{ route('drYousef') }}">Dr.Yousef</a></h4>
                                <p class="mb-0">Eye Expert</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="team__item team__item-doctor_page team__item-box_shadow mb-30">
                        <div class="team__item-media">
                            <img class="img-fluid" src="{{ asset('landing/images/doc2.jpg') }}" alt="image not found">
                        </div>

                        <div class="team__item-content">
                            <div class="team__item-content-left">
                                <h4 class="mb-10"><a href="{{ route('drRami') }}">Dr.Rami</a></h4>
                                <p class="mb-0">Devon Lane</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Body main wrapper end -->
@endsection