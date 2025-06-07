<!-- preloader start -->
<div id="preloader">
    <div class="preloader-close">x</div>
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>1
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!-- preloader end -->

<!-- preloader start -->
<div class="loading-form">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!-- preloader end -->

<!-- Backtotop start -->
<div id="scroll-percentage">
    <span id="scroll-percentage-value" data-default-color="var(--rr-color-900)" data-scroll-color="var(--rr-theme-primary)"></span>
</div>
<!-- Backtotop end -->

<!-- Chatbot button start -->
<div id="chat-bot-circle">
    <button id="chat-bot-toggle" aria-label="Open chat">
        <i class="fa-solid fa-comments"></i>
    </button>
    <div id="chat-bot-window" class="hidden">
        <div class="chat-header">
            <h4>OptiEye Assistant</h4>
            <button id="chat-close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="chat-body">
            <div class="chat-messages">
                <div class="message bot">
                    Hello! How can I help with your eye health questions today?
                </div>
            </div>
            <div class="chat-input">
                <input type="text" placeholder="Type your message..." aria-label="Type your message">
                <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- Chatbot button end -->
<!-- Offcanvas area start -->
<div class="fix">
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{route('home')}}">
                            <img src="{{ asset('landing/images/logobfinal.png') }}" alt="logo not found">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button class="offcanvas-close-icon animation--flip">
                                <span class="offcanvas-m-lines">
                              <span class="offcanvas-m-line line--1"></span><span class="offcanvas-m-line line--2"></span><span class="offcanvas-m-line line--3"></span>
                                </span>
                        </button>
                    </div>
                </div>
                <div class="mobile-menu fix"></div>
                <!-- Add mobile auth buttons -->
                <div class="offcanvas__auth-buttons d-flex justify-content-center mt-30 mb-30 d-lg-none">
                    <a href="{{route('login')}}" class="auth-btn login-btn me-2">
                        <i class="fa-solid fa-user"></i>&nbsp; Log In
                    </a>
                    <a href="{{route('register')}}" class="auth-btn signup-btn">
                        <i class="fa-solid fa-user-plus"></i> Sign Up
                    </a>
                </div>
                <div class="offcanvas__social">
                    <h4 class="offcanvas__title mb-20">Follow Us</h4>
                    <p class="mb-30">Stay updated with AI eye diagnosis technology, early detection methods, and breakthrough research in ophthalmology to better care for your vision health.</p>
                  
                </div>
             
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>
<div class="offcanvas__overlay-white"></div>
<!-- Offcanvas area start -->

<!-- Include chat.js -->
<script src="{{ asset('landing/js/chat.js') }}"></script>
