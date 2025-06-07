@extends('landing.master')

@section('content')

@section('styles')
<!-- Include specialized CSS for the profile page -->
<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@endsection

 <!-- Banner area start -->
    <section class="banner banner__space-sm overflow-hidden profile-banner-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 text-center">
                    <div class="banner__content enhanced-profile-banner">
                        <h2 class="profile-title">My Profile</h2>
                        <p class="profile-subtitle">Manage your personal information and account settings</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner area end -->
     
    <!-- Profile area start -->
    <section class="profile-section section-space__bottom enhanced-profile-section">
        <div class="container">
            <div class="row">
                <!-- Sidebar Navigation -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="profile-sidebar enhanced-sidebar">
                        <h5 class="sidebar-heading">Account Settings</h5>
                        <div class="sidebar-item active" data-target="personal-info">
                            <i class="fa-light fa-user"></i>
                            <span>Personal Information</span>
                        </div>
                        <div class="sidebar-item" data-target="change-password">
                            <i class="fa-light fa-lock"></i>
                            <span>Change Password</span>
                        </div>
                        <div class="sidebar-item" data-target="chat-with-doctor">
                            <i class="fa-light fa-comments-alt"></i>
                            <span>Chat With Doctor</span>
                        </div>
                    </div>
                </div>
                
                <!-- Profile Form -->
                <div class="col-lg-8">
                    <div class="profile-card enhanced-card" id="personal-info-section">
                        <h4>Personal Information</h4>
                        
                        <form id="profileForm">
                            <!-- Profile Picture Section -->
                            <div class="profile-picture-section text-center mb-4">
                                <div class="profile-picture-container upload-indicator">
                                    <div class="profile-picture">
                                        <img id="profileImage" src="assets/imgs/placeholders/profile-placeholder.jpg" alt="" onerror="this.style.display='none'">
                                        <div class="profile-icon-placeholder">
                                            <i class="fa-light fa-user-large"></i>
                                        </div>
                                    </div>
                                    <div class="profile-picture-overlay">
                                        <label for="profilePictureInput" class="profile-picture-change">
                                            <i class="fa-light fa-camera"></i>
                                        </label>
                                    </div>
                                </div>
                                <p class="profile-upload-hint mt-2 mb-1 text-muted"><i class="fa-light fa-info-circle me-1"></i> Click on the image to upload your profile picture</p>
                                <input type="file" id="profilePictureInput" accept="image/*" style="display: none;">
                                <div class="profile-picture-actions mt-2">
                                    <button type="button" class="btn btn-sm btn-link text-danger remove-picture" id="removeProfilePicture" style="display: none;">
                                        <i class="fa-light fa-trash-alt"></i> Remove
                                    </button>
                                </div>
                            </div>
                            

                            <div class="form-group position-relative">
                                <label for="name" class="form-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(var(--rr-theme-primary-rgb), 0.1); border: none;">
                                        <i class="fa-light fa-user" style="font-size: 20px; color: var(--rr-theme-primary);"></i>
                                    </span>
                                    <input type="text" class="form-control" id="name" value="Sarah Johnson" required>
                                </div>
                            </div>
                            
                            <div class="form-group position-relative">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(var(--rr-theme-primary-rgb), 0.1); border: none;">
                                        <i class="fa-light fa-envelope" style="font-size: 20px; color: var(--rr-theme-primary);"></i>
                                    </span>
                                    <input type="email" class="form-control" id="email" value="sarah.johnson@example.com" required>
                                </div>
                            </div>
                            
                            <div class="form-group position-relative">
                                <label for="phone" class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(var(--rr-theme-primary-rgb), 0.1); border: none;">
                                        <i class="fa-light fa-phone" style="font-size: 20px; color: var(--rr-theme-primary);"></i>
                                    </span>
                                    <input type="tel" class="form-control" id="phone" value="+1 (555) 123-4567">
                                </div>
                            </div>
                            

                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="auth-btn login-btn me-2">
                                    <i class="fa-light fa-times"></i>
                                    <span>Cancel</span>
                                </button>
                                <button type="submit" class="auth-btn signup-btn">
                                    <i class="fa-light fa-check"></i>
                                    <span>Save Changes</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Password Update Section -->
                    <div class="profile-card enhanced-card" id="change-password-section" style="display: none;">
                        <h4>Change Password</h4>
                        
                        <form id="passwordForm">
                            <div class="form-group position-relative">
                                <label for="currentPassword" class="form-label">Current Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(var(--rr-theme-primary-rgb), 0.1); border: none;">
                                        <i class="fa-light fa-shield-keyhole" style="font-size: 20px; color: var(--rr-theme-primary);"></i>
                                    </span>
                                    <input type="password" class="form-control" id="currentPassword" placeholder="Enter your current password" required>
                                </div>
                            </div>
                            
                            <div class="form-group position-relative">
                                <label for="newPassword" class="form-label">New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(var(--rr-theme-primary-rgb), 0.1); border: none;">
                                        <i class="fa-light fa-key-skeleton" style="font-size: 20px; color: var(--rr-theme-primary);"></i>
                                    </span>
                                    <input type="password" class="form-control" id="newPassword" placeholder="Password must be at least 8 characters long and include numbers and special characters" required>
                                </div>
                            </div>
                            
                            <div class="form-group position-relative">
                                <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(var(--rr-theme-primary-rgb), 0.1); border: none;">
                                        <i class="fa-light fa-check-circle" style="font-size: 20px; color: var(--rr-theme-primary);"></i>
                                    </span>
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm New Password" required>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="auth-btn login-btn me-2">
                                    <i class="fa-light fa-times"></i>
                                    <span>Cancel</span>
                                </button>
                                <button type="submit" class="auth-btn signup-btn">
                                    <i class="fa-light fa-check"></i>
                                    <span>Update Password</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Chat With Doctor Section -->
                    <div class="profile-card enhanced-card" id="chat-with-doctor-section" style="display: none;">
                        <h4>Chat With Doctor</h4>
                        
                        <div class="doctor-chat-container">
                            <div class="doctor-selection mb-4">
                                <div class="selected-doctor-info">
                                    <div class="doctor-avatar-container">
                                        <div class="doctor-avatar">
                                            <i class="fa-light fa-user-doctor"></i>
                                        </div>
                                    </div>
                                    <div class="doctor-selection-wrapper">
                                        <label class="form-label">Select a Doctor</label>
                                        <select class="form-select" id="doctorSelect">
                                            <option value="" selected disabled>Choose a specialist</option>
                                            <option value="dr-smith">Dr. Smith - Ophthalmologist</option>
                                            <option value="dr-johnson">Dr. Johnson - Retina Specialist</option>
                                            <option value="dr-patel">Dr. Patel - Glaucoma Specialist</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="chat-window">
                                <div class="chat-header">
                                    <div id="activeDoctorInfo">
                                        <span class="empty-state">Select a doctor to start chat</span>
                                    </div>
                                </div>
                                
                                <div class="chat-messages" id="chatMessages">
                                    <div class="chat-message system-message">
                                        Select a doctor and start your conversation
                                    </div>
                                </div>
                                
                                <div class="chat-input-container">
                                    <div id="filePreview" class="file-preview" style="display: none;"></div>
                                    <form id="chatForm" class="chat-form d-flex">
                                        <input type="file" id="fileAttachment" style="display: none;" accept="image/*,.pdf,.doc,.docx">
                                        <button type="button" id="attachmentBtn" class="attachment-btn me-2" disabled>
                                            <i class="fa-light fa-paperclip"></i>
                                        </button>
                                        <input type="text" class="form-control" id="chatInput" placeholder="Type your message..." disabled>
                                        <button type="submit" class="auth-btn signup-btn ms-2" disabled>
                                            <i class="fa-light fa-paper-plane"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
<script src="{{ asset('assets/js/profile.js') }}"></script>
@endsection