@extends('landing.master')

@section('content')
 <!-- Enhanced Chatbot area start -->
    <section class="chatbot-section">
        <div class="container">
            <div class="chatbot-container">
                <div class="chatbot-sidebar">
                    <div class="chatbot-sidebar-content">
                        <h2>OptiEye AI Assistant</h2>
                        <p class="mb-4">Your intelligent companion for eye health information and guidance.</p>
                        
                        <div class="chatbot-feature">
                            <div class="chatbot-feature-icon">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                            <div class="chatbot-feature-text">
                                <h4>Symptom Assessment</h4>
                                <p>Get insights about your eye symptoms and when to seek care</p>
                            </div>
                        </div>
                        
                        <div class="chatbot-feature">
                            <div class="chatbot-feature-icon">
                                <i class="fa-solid fa-book-medical"></i>
                            </div>
                            <div class="chatbot-feature-text">
                                <h4>Eye Condition Information</h4>
                                <p>Learn about common eye conditions in simple terms</p>
                            </div>
                        </div>
                        
                        <div class="chatbot-feature">
                            <div class="chatbot-feature-icon">
                                <i class="fa-solid fa-book-medical"></i>
                            </div>
                            <div class="chatbot-feature-text">
                                <h4>Preventive Care Tips</h4>
                                <p>Get advice on maintaining good eye health</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="chatbot-disclaimer">
                        <p>This AI Assistant provides general information only and is not a substitute for professional medical advice. Always consult a healthcare provider for medical concerns.</p>
                    </div>
                </div>
                
                <div class="chatbot-main">
                    <div class="chatbot-header">
                        <div class="chatbot-header-avatar">
                            <i class="fa-solid fa-robot"></i>
                        </div>
                        <div class="chatbot-header-info">
                            <h3>OptiEye Assistant</h3>
                            <p>Ask me about eye health, conditions & treatments</p>
                        </div>
                    </div>
                    
                    <div class="chatbot-messages" id="chatbot-messages">
                        <div class="message bot">
                            <p>Hello! I'm OptiEye's AI assistant. I can answer questions about eye health, common conditions, and treatments. How can I help you today?</p>
                        </div>
                    </div>
                    
                    <div class="chatbot-input-area">
                        <div class="chatbot-input-wrapper">
                            <input type="text" class="chatbot-input" id="chatbot-input" placeholder="Type your message here..." aria-label="Type your message">
                            <button class="chatbot-send" id="chatbot-send">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Enhanced Chatbot area end -->
     @endsection