@extends('landing.master')

@section('content')

  <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="images/about1.png"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Blog Details</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('home')}}">Home</a></span></li>
                                    <li class="active"><span>Blog Details</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- blog area start  -->
    <section class="blog section-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="blog__details">
                        <div class="blog__details-thumb mb-20">
                            <img src="{{ asset('landing/images/aide.png') }}" class="img-fluid" alt="image not found">
                        </div>

                        <ul class="blog__details-meta mb-20">
                            <li><a href="#"><i class="fa-regular fa-user"></i>By admin</a></li>
                            <li><i class="fa-regular fa-calendar-days"></i>April 17, 2025</li>
                        </ul>

                        <div class="blog__details-content">
                            <h2>AI Revolution in Eye Diagnosis</h2>

                            <p>AI is transforming ophthalmology with unprecedented diagnostic accuracy. Our system uses deep learning algorithms trained on millions of retinal images to detect subtle disease signs. It identifies conditions like diabetic retinopathy, glaucoma, and AMD at earlier stages than conventional methods.</p>

                            <blockquote>
                                <p>The future of eye care is AI-powered. It helps specialists detect diseases earlier, improve accuracy, and preserve vision. AI enhances human expertise and extends quality care to underserved populations worldwide.</p>
                                <h5>-Dr. Elena Rivkin</h5>
                                <span>
                                    <svg width="60" height="44" viewBox="0 0 60 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.7">
                                        <mask id="path-1-inside-1_9858_515" fill="white">
                                        <path d="M12.8571 0.35722C19.9553 0.357221 25.7142 6.11614 25.7142 13.2143L25.7142 26.0715C25.7142 35.5804 17.9464 43.2143 8.57141 43.2143C6.16069 43.2143 4.2857 41.3393 4.2857 38.9286C4.2857 36.6518 6.1607 34.6429 8.57141 34.6429C13.2589 34.6429 17.1428 30.8929 17.1428 26.0715L17.1428 25.4018C15.6696 25.8036 14.3303 26.0715 12.8571 26.0715C5.62498 26.0715 -5.76054e-06 20.4465 -4.49604e-06 13.2143C-3.25495e-06 6.11614 5.62499 0.357219 12.8571 0.35722ZM59.9999 13.2144L59.9999 26.0715C59.9999 35.5804 52.2321 43.2143 42.8571 43.2143C40.4464 43.2143 38.5714 41.3393 38.5714 38.9286C38.5714 36.6518 40.4464 34.6429 42.8571 34.6429C47.5446 34.6429 51.4285 30.8929 51.4285 26.0715L51.4285 25.4018C49.9553 25.8036 48.616 26.0715 47.1428 26.0715C39.9106 26.0715 34.2857 20.4465 34.2857 13.2143C34.2857 6.11614 39.9106 0.357225 47.1428 0.357226C54.241 0.357227 59.9999 6.11615 59.9999 13.2144Z"/>
                                        </mask>
                                        <path d="M17.1428 25.4018L18.1428 25.4018L18.1428 24.0926L16.8797 24.4371L17.1428 25.4018ZM51.4285 25.4018L52.4285 25.4018L52.4285 24.0926L51.1654 24.4371L51.4285 25.4018ZM12.8571 1.35722C19.403 1.35722 24.7142 6.66843 24.7142 13.2143L26.7142 13.2143C26.7142 5.56386 20.5076 -0.642779 12.8571 -0.64278L12.8571 1.35722ZM24.7142 13.2143L24.7142 26.0715L26.7142 26.0715L26.7142 13.2143L24.7142 13.2143ZM24.7142 26.0715C24.7142 35.023 17.3992 42.2143 8.57141 42.2143L8.57141 44.2143C18.4936 44.2143 26.7142 36.1377 26.7142 26.0715L24.7142 26.0715ZM8.57141 42.2143C6.71298 42.2143 5.2857 40.787 5.2857 38.9286L3.2857 38.9286C3.2857 41.8916 5.60841 44.2143 8.57141 44.2143L8.57141 42.2143ZM5.2857 38.9286C5.2857 37.1837 6.73315 35.6429 8.57141 35.6429L8.57141 33.6429C5.58825 33.6429 3.2857 36.1199 3.2857 38.9286L5.2857 38.9286ZM8.57141 35.6429C13.801 35.6429 18.1428 31.4553 18.1428 26.0715L16.1428 26.0715C16.1428 30.3304 12.7168 33.6429 8.57141 33.6429L8.57141 35.6429ZM18.1428 26.0715L18.1428 25.4018L16.1428 25.4018L16.1428 26.0715L18.1428 26.0715ZM16.8797 24.4371C15.4457 24.8281 14.2035 25.0715 12.8571 25.0715L12.8571 27.0715C14.4571 27.0715 15.8935 26.7791 17.4059 26.3666L16.8797 24.4371ZM12.8571 25.0715C6.17727 25.0715 0.999994 19.8942 0.999996 13.2143L-1 13.2143C-1.00001 20.9988 5.0727 27.0715 12.8571 27.0715L12.8571 25.0715ZM0.999996 13.2143C0.999997 6.6616 6.18407 1.35722 12.8571 1.35722L12.8571 -0.64278C5.06591 -0.642781 -1 5.57067 -1 13.2143L0.999996 13.2143ZM58.9999 13.2144L58.9999 26.0715L60.9999 26.0715L60.9999 13.2144L58.9999 13.2144ZM58.9999 26.0715C58.9999 35.023 51.6849 42.2143 42.8571 42.2143L42.8571 44.2143C52.7792 44.2143 60.9999 36.1377 60.9999 26.0715L58.9999 26.0715ZM42.8571 42.2143C40.9986 42.2143 39.5714 40.787 39.5714 38.9286L37.5714 38.9286C37.5714 41.8916 39.8941 44.2143 42.8571 44.2143L42.8571 42.2143ZM39.5714 38.9286C39.5714 37.1837 41.0188 35.6429 42.8571 35.6429L42.8571 33.6429C39.8739 33.6429 37.5714 36.1199 37.5714 38.9286L39.5714 38.9286ZM42.8571 35.6429C48.0866 35.6429 52.4285 31.4553 52.4285 26.0715L50.4285 26.0715C50.4285 30.3304 47.0025 33.6429 42.8571 33.6429L42.8571 35.6429ZM52.4285 26.0715L52.4285 25.4018L50.4285 25.4018L50.4285 26.0715L52.4285 26.0715ZM51.1654 24.4371C49.7314 24.8282 48.4892 25.0715 47.1428 25.0715L47.1428 27.0715C48.7428 27.0715 50.1792 26.7791 51.6916 26.3666L51.1654 24.4371ZM47.1428 25.0715C40.4629 25.0715 35.2857 19.8942 35.2857 13.2143L33.2857 13.2143C33.2857 20.9988 39.3584 27.0715 47.1428 27.0715L47.1428 25.0715ZM35.2857 13.2143C35.2857 6.66161 40.4697 1.35722 47.1428 1.35723L47.1428 -0.642774C39.3516 -0.642775 33.2857 5.57068 33.2857 13.2143L35.2857 13.2143ZM47.1428 1.35723C53.6887 1.35723 58.9999 6.66843 58.9999 13.2144L60.9999 13.2144C60.9999 5.56386 54.7933 -0.642773 47.1428 -0.642774L47.1428 1.35723Z" fill="#185EC8" mask="url(#path-1-inside-1_9858_515)"/>
                                        </g>
                                    </svg>
                                </span>
                            </blockquote>

                            <p>AI excels at pattern recognition across thousands of images, identifying early disease indicators. Our system detects diabetic retinopathy up to 18 months earlier than traditional methods. The AI continuously learns from each scan, improving its accuracy and expanding capabilities.</p>

                            <h3 class="mt-60">Computer Vision in Retinal Analysis</h3>

                            <img src="{{ asset('landing/images/aideff.png')}}" class="img-fluid" alt="AI retinal scan analysis">

                            <p>Our algorithms analyze retinal scans in seconds, evaluating microvasculature changes, optic nerve health, and macular integrity. This technology identifies subtle disease biomarkers that human eyes might miss, potentially indicating systemic health issues too. Non-invasive AI scanning suits all age groups.</p>

                            <ul>
                                <li><i class="fa-solid fa-check"></i>Earlier disease detection</li>
                                <li><i class="fa-solid fa-check"></i>99.26% diagnostic accuracy</li>
                                <li><i class="fa-solid fa-check"></i>Instant scan processing</li>
                                <li><i class="fa-solid fa-check"></i>60% lower diagnostic costs</li>
                            </ul>

                            <div class="blog__details-pagination mb-80 mb-xs-60 mt-60 mt-xs-60 d-flex flex-column flex-md-row align-items-center  justify-content-md-between">
                                <a href="blog-details.html" class="blog__details-pagination-prev d-flex align-items-center">
                                    <span class="icon">
                                        <i class="fa-solid fa-angle-left"></i>
                                    </span>
                                    <span class="text">
                                        <span class="title">One Patient at a Time</span>
                                    </span>
                                </a>

                                <hr>

                                <a href="blog-details.html" class="blog__details-pagination-next d-flex align-items-center">
                                    <span class="text">
                                        <span class="title">Latest news from</span>
                                    </span>

                                    <span class="icon">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>

                            <div class="comment-widget">
                                <h3>Expert Views on AI Eye Diagnostics</h3>

                                <div class="comment-item d-flex mt-40">
                                    <div class="comment-item__media">
                                        <img src="{{ asset('landing/assets/imgs/blog-details/comment-1.jpg')}}" class="img-fluid" alt="image not found">
                                    </div>

                                    <div class="comment-item__content">
                                        <h5 class="name">Jerome Bell</h5>
                                        <p class="mb-10">Deep learning has transformed retinal disease detection. AI consistently finds subtle diabetic retinopathy signs missed in routine exams.</p>

                                        <div class="comment-item__content-bottom d-flex align-items-center justify-content-between">
                                            <span class="date">April 17, 2025</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment-item d-flex mt-40">
                                    <div class="comment-item__media">
                                        <img src="{{ asset('landing/assets/imgs/blog-details/comment-2.jpg')}}" class="img-fluid" alt="image not found">
                                    </div>

                                    <div class="comment-item__content">
                                        <h5 class="name">Dianne Russell</h5>
                                        <p class="mb-10">As a glaucoma specialist, I'm impressed how accurately AI predicts disease progression from optic nerve changes, giving crucial intervention time.</p>

                                        <div class="comment-item__content-bottom d-flex align-items-center justify-content-between">
                                            <span class="date">April 17, 2025</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment-item d-flex mt-40">
                                    <div class="comment-item__media">
                                        <img src="{{ asset('landing/assets/imgs/blog-details/comment-3.jpg')}}" class="img-fluid" alt="image not found">
                                    </div>

                                    <div class="comment-item__content">
                                        <h5 class="name">Kristin Watson</h5>
                                        <p class="mb-10">AI diagnostics enable effective eye screening in remote locations with minimal equipment, bringing care to previously underserved populations.</p>

                                        <div class="comment-item__content-bottom d-flex align-items-center justify-content-between">
                                            <span class="date">April 17, 2025</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Comment form section removed -->
                            
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="sidebar sidebar-rr-sticky">
                        <!-- Search widget removed -->
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title pb-18 title-animation">Categories</h4>
                            <div class="sidebar__widget-category">
                                <a href="blog-details.html">AI Diagnosis</a>
                                <a href="blog-details.html">Eye Health</a>
                                <a href="blog-details.html">Technology</a>
                                <a href="blog-details.html">Research</a>
                                <a href="blog-details.html">Innovations</a>
                                <a href="blog-details.html">Case Studies</a>
                            </div>
                        </div>
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title title-animation">Popular Posts</h4>
                            <div class="sidebar-post__wrapper">
                                <div class="sidebar__widget-post">
                                    <a href="blog-details.html" class="sidebar__widget-post__thum">
                                        <img src="{{ asset('landing/assets/imgs/sidebar/popular-post-1.png')}}" class="img-fluid" alt="image not found">
                                    </a>
                                    <div class="sidebar__widget-post__content">
                                        <ul class="sidebar__widget-post__content-meta">
                                            <li>
                                                <i class="fa-regular fa-calendar-days"></i>
                                                April 17, 2025
                                            </li>
                                        </ul>
                                        <a href="blog-details.html">
                                            <h5 class="title-animation">Embrace Wellness Your Gateway </h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="sidebar__widget-post">
                                    <a href="blog-details.html" class="sidebar__widget-post__thum">
                                        <img src="{{ asset('landing/assets/imgs/sidebar/popular-post-2.png')}}" class="img-fluid" alt="image not found">
                                    </a>
                                    <div class="sidebar__widget-post__content">
                                        <ul class="sidebar__widget-post__content-meta">
                                            <li>
                                                <i class="fa-regular fa-calendar-days"></i>
                                                April 17, 2025
                                            </li>
                                        </ul>
                                        <a href="blog-details.html">
                                            <h5 class="title-animation">Optimize Oasis Cultivating Health Inspiring Life</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="sidebar__widget-post">
                                    <a href="blog-details.html" class="sidebar__widget-post__thum">
                                        <img src="{{ asset('landing/assets/imgs/sidebar/popular-post-3.png')}}" class="img-fluid" alt="image not found">
                                    </a>
                                    <div class="sidebar__widget-post__content">
                                        <ul class="sidebar__widget-post__content-meta">
                                            <li>
                                                <i class="fa-regular fa-calendar-days"></i>
                                                April 17, 2025
                                            </li>
                                        </ul>
                                        <a href="blog-details.html">
                                            <h5 class="title-animation">Vibrance Voyage Navigating Toward Optimal Health</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end  -->

@endsection