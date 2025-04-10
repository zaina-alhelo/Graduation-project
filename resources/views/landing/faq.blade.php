@extends('landing.master')

@section('content')
   <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="images/faqs.png"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">FAQs</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('home')}}">Home</a></span></li>
                                    <li class="active"><span>FAQs</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- faq-page area start  -->
    <section class="faq-page section-space">
        <div class="container">
            <div class="row" id="accordionExample">
                <div class="col-lg-6">
                    <div class="rr__faq-2">
                        <div class="accordion">
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How does OptiEye's AI eye diagnosis work?
                                    </button>
                                </h5>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Our AI system analyzes your uploaded eye images using advanced machine learning algorithms trained on millions of clinical images. It can detect patterns and anomalies often invisible to the naked eye, providing a preliminary diagnosis in minutes.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        What eye conditions can the AI detect?
                                    </button>
                                </h5>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Our AI system can detect common eye conditions including diabetic retinopathy, glaucoma, age-related macular degeneration, cataracts, conjunctivitis, and various retinal disorders. The technology is continuously being improved to detect additional conditions.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        How accurate is the AI diagnosis system?
                                    </button>
                                </h5>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Our AI diagnostic system has achieved a 99.26% accuracy rate when compared to diagnoses from board-certified ophthalmologists. However, we always recommend following up with a professional consultation to confirm results and discuss treatment options.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                        Is my eye health data secure?
                                    </button>
                                </h5>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Yes, we take data security very seriously. All images and health information are encrypted, stored securely, and handled in compliance with HIPAA regulations. Your data is never sold to third parties and is only used to improve our diagnostic algorithms with your explicit consent.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingTen">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                                        How quickly will I receive my diagnostic results?
                                    </button>
                                </h5>
                                <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>The AI analysis provides preliminary results within minutes of image upload. If you've requested a professional review, our ophthalmologists will provide their analysis within 24 hours, depending on the subscription plan you've chosen.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="rr__faq-2">
                        <div class="accordion">
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                        What should I prepare before uploading my eye image?
                                    </button>
                                </h5>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>We accept high-resolution smartphone photos as well as images from specialized eye cameras.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                        Can OptiEye replace a visit to my ophthalmologist?
                                    </button>
                                </h5>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>OptiEye is designed to complement, not replace, professional eye care. Our AI provides preliminary screening that can help identify potential issues early, but a comprehensive eye examination by an ophthalmologist is still essential for formal diagnosis and treatment planning. We recommend using OptiEye for regular monitoring between professional visits.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                        How can I get a professional consultation after my AI diagnosis?
                                    </button>
                                </h5>
                                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>All our Standard and Premium subscription plans include professional review options. After receiving your AI results, you can request a consultation with one of our affiliated ophthalmologists through our platform. They'll review your images, the AI results, and provide personalized feedback and recommendations, typically within 24 hours.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                        What image quality is required for accurate diagnosis?
                                    </button>
                                </h5>
                                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>For optimal results, images should be at least 1280x960 pixels in resolution, well-lit, and in focus. The entire eye should be visible with minimal glare. Modern smartphone cameras typically provide sufficient quality.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingNine">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                                        How can I monitor my eye health over time with OptiEye?
                                    </button>
                                </h5>
                                <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>OptiEye provides a personal dashboard where you can track your eye health over time. Each diagnosis is stored in your secure profile, allowing you to monitor changes and trends.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq-page area start  -->

    <!-- pricing-appointment area start  -->
    <section class="pricing-appointment section-space__bottom">
        <div class="container">
            <div class="row align-items-end mb-60 mb-sm-50 mb-xs-40">
                <div class="col-lg-6">
                    <div class="section__title-wrapper">
                        <h5 class="section__subtitle color-theme-primary mb-15 mb-xs-10 title-animation"><img src="{{ asset('landing/assets/imgs/ask-quesiton/heart.png ')}}" alt="icon not found" class="img-fluid"> Expert Consultation</h5>
                        <h2 class="section__title mb-0 title-animation">Get Professional Insight on Your Eye Health</h2>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="pricing-appointment__content-right mt-md-25 mt-sm-25 mt-xs-25">
                        <p class="mb-0">Have questions about your AI diagnosis results? Connect with our experienced ophthalmologists for personalized review, detailed explanation, and treatment recommendations. Our specialists can provide further insights beyond what AI detection offers.</p>
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
                                <p>Technical Support:</p>
                                <h5 class="mb-0"><a href="tel:6295550129">(629) 555-0129</a></h5>
                            </div>
                        </div>

                        <div class="pricing-appointment__contact-item d-flex align-items-end">
                            <div class="pricing-appointment__contact-item-icon d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="pricing-appointment__contact-item-text">
                                <p>Online Support Hours:</p>
                                <h5 class="mb-0">24/7 AI Analysis | 8am-8pm Consultations</h5>
                            </div>
                        </div>

                        <div class="pricing-appointment__contact-item d-flex align-items-end">
                            <div class="pricing-appointment__contact-item-icon d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="pricing-appointment__contact-item-text">
                                <p>Email Support</p>
                                <h5 class="mb-0"><a href="mailto:optieyesup@gmail.com">optieyesup@gmail.com</a></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <form id="pricing-appointment__form" method="POST" action="./mail.php" class="pricing-appointment__form mt-md-60 mt-sm-60 mt-xs-60">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-input">
                                    <input name="name" id="name" type="text" placeholder="Your full name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-input">
                                    <input name="email" id="email" type="text" placeholder="Your email address">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-input">
                                    <input name="phone" id="phone" type="text" placeholder="Phone number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing-appointment__form-select">
                                    <select name="consultType" id="consultType">
                                        <option>Type of Consultation</option>
                                        <option>AI Results Review</option>
                                        <option>General Eye Health</option>
                                        <option>Follow-up Discussion</option>
                                        <option>Treatment Options</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="pricing-appointment__form-input">
                                    <textarea name="textarea" id="textarea" placeholder="Please briefly describe your eye condition or concerns"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="rr-btn rr-btn__primary-color mt-0">
                                    <span class="btn-wrap">
                                        <span class="text-one">Request Consultation</span>
                                        <span class="text-two">Request Consultation</span>
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


