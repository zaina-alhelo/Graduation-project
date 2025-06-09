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
                        <div class="sidebar-item" data-target="appointment-status">
                            <i class="fa-light fa-calendar-check"></i>
                            <span>Appointments Status</span>
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
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="gender" class="form-label">Gender</label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background-color: rgba(var(--rr-theme-primary-rgb), 0.1); border: none;">
                                                <i class="fa-light fa-venus-mars" style="font-size: 20px; color: var(--rr-theme-primary);"></i>
                                            </span>
                                            <select class="form-select" id="gender" style="height: 58px; border-radius: 0 8px 8px 0; font-size: 1.2rem;">
                                                <option value="" selected>Select gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="age" class="form-label">Age</label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background-color: rgba(var(--rr-theme-primary-rgb), 0.1); border: none;">
                                                <i class="fa-light fa-calendar-days" style="font-size: 20px; color: var(--rr-theme-primary);"></i>
                                            </span>
                                            <input type="number" class="form-control" id="age" value="32" min="1" max="120" style="height: 58px; border-radius: 0 8px 8px 0;">
                                        </div>
                                    </div>
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
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(var(--rr-theme-primary-rgb), 0.1); border: none;">
                                        <i class="fa-light fa-shield-keyhole" style="font-size: 20px; color: var(--rr-theme-primary);"></i>
                                    </span>
                                    <input type="password" class="form-control" id="currentPassword" placeholder="Enter your current password" required>
                                </div>
                            </div>
                            
                            <div class="form-group position-relative">
<br>                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(var(--rr-theme-primary-rgb), 0.1); border: none;">
                                        <i class="fa-light fa-key-skeleton" style="font-size: 20px; color: var(--rr-theme-primary);"></i>
                                    </span>
                                    <input type="password" class="form-control" id="newPassword" placeholder="New Password (A-Z, 0-9, special)
" required>
                                </div>
                            </div>
                            
                            <div class="form-group position-relative">
<br>
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
                    
                    <!-- Appointment Status Section -->
                    <div class="profile-card enhanced-card" id="appointment-status-section" style="display: none;">
                        <h4>Appointments Status</h4>
                        
                        <div class="appointment-list-container">
                            <!-- Quick actions row -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="appointment-stats">
                                    <div class="badge bg-primary rounded-pill mb-2">
                                        <i class="fa-light fa-calendar-check me-1"></i> 1 Upcoming
                                    </div>
                                    <div class="badge bg-success rounded-pill">
                                        <i class="fa-light fa-check-circle me-1"></i> 1 Completed
                                    </div>
                                </div>
                                <a href="{{ url('appointment') }}" class="auth-btn signup-btn">
                                    <i class="fa-light fa-calendar-plus"></i>
                                    <span>Book New Appointment</span>
                                </a>
                            </div>
                            
                            <!-- Empty state (shown when filtered results are empty) -->
                            <div id="emptyAppointmentsState" class="text-center py-5 d-none">
                                <div class="empty-state-icon mb-3">
                                    <i class="fa-light fa-calendar-xmark" style="font-size: 64px; color: #ccc;"></i>
                                </div>
                                <h5 class="text-muted">No appointments found</h5>
                                <p class="text-muted">There are no appointments matching your current filters</p>
                                <button id="clearFiltersBtn" class="btn btn-outline-primary mt-2">
                                    <i class="fa-light fa-filter-slash me-1"></i> Clear Filters
                                </button>
                            </div>
                            
                            <!-- Enhanced appointment cards -->
                            <div class="appointments-list">
                                <!-- Upcoming appointment with priority indicator -->
                                <div class="appointment-card upcoming hover-effect">
                                    <div class="appointment-header">
                                        <div class="appointment-date">
                                            <i class="fa-light fa-calendar-day"></i>
                                            <span>May 15, 2025 | 10:30 AM</span>
                                        </div>
                                  
                                    </div>
                                    <div class="appointment-body">
                                        <div class="doctor-info">
                                            <i class="fa-light fa-user-doctor" style="font-size: 1.5rem;"></i>
                                            <div>
                                                <h6 style="font-size: 1.5rem; font-weight: 600;">Dr. Johnson</h6>
                                                <p style="font-size: 1.25rem; font-weight: 500;">Retina Specialist</p>
                                            </div>
                                        </div>
                                        <div class="appointment-details">
                                            <p><i class="fa-light fa-clipboard-list"></i> Vision Assessment</p>

                                            <p><i class="fa-light fa-credit-card"></i> Cash on delivery</p>
                                            
                                        </div>
                                    </div>

                                </div>
                                
                                <!-- Completed appointment with feedback -->
                                <div class="appointment-card completed hover-effect">
                                    <div class="appointment-header">
                                        <div class="appointment-date">
                                            <i class="fa-light fa-calendar-day"></i>
                                            <span>April 2, 2025 | 2:15 PM</span>
                                        </div>
                                        <div class="appointment-status">
                                            <span class="status-badge completed">Completed</span>
                                        </div>
                                    </div>
                                    <div class="appointment-body">
                                        <div class="doctor-info">
                                            <i class="fa-light fa-user-doctor" style="font-size: 1.5rem;"></i>
                                            <div>
                                                <h6 style="font-size: 1.5rem; font-weight: 600;">Dr. Smith</h6>
                                                <p style="font-size: 1.25rem; font-weight: 500;">Ophthalmologist</p>
                                            </div>
                                        </div>
                                        <div class="appointment-details">
                                            <p><i class="fa-light fa-clipboard-list"></i> Vision Assessment</p>
                                            <p><i class="fa-light fa-credit-card"></i> Cash on delivery</p>

                                            <div class="feedback-section mt-2 p-2 bg-light rounded">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <span class="fw-bold text-muted"><i class="fa-light fa-comment-dots me-1"></i> Doctor's Notes:</span>
                                                </div>
                                                <p class="text-muted small mb-0">Prescription updated. Regular checkup recommended in 3 months.</p>
                                            </div>
                                        </div>
                                    </div>
                               
                                </div>
                                
                                <!-- Canceled appointment -->
                                <div class="appointment-card canceled hover-effect">
                                    <div class="appointment-header">
                                        <div class="appointment-date">
                                            <i class="fa-light fa-calendar-day"></i>
                                            <span>March 15, 2025 | 9:00 AM</span>
                                        </div>
                                        <div class="appointment-status">
                                            <span class="status-badge canceled">Canceled</span>
                                        </div>
                                    </div>
                                    <div class="appointment-body">
                                        <div class="doctor-info">
                                            <i class="fa-light fa-user-doctor" style="font-size: 1.5rem;"></i>
                                            <div>
                                                <h6 style="font-size: 1.5rem; font-weight: 600;">Dr. Patel</h6>
                                                <p style="font-size: 1.25rem; font-weight: 500;">Glaucoma Specialist</p>
                                            </div>
                                        </div>
                                        <div class="appointment-details">
                                            <p class="text-muted mt-2"><i class="fa-light fa-circle-info"></i> Canceled by doctor on March 14, 2025</p>
                                        </div>
                                    </div>
                                    <div class="appointment-footer">
                                        <a href="{{ route('appointments.form') }}" class="auth-btn signup-btn">
                                            <i class="fa-light fa-calendar-plus"></i>
                                            <span>Reschedule</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Enhanced pagination -->
                            <div class="pagination-container d-flex justify-content-between align-items-center mt-4">
                                <div class="pagination-info text-muted small">
                                    Showing 1-3 of 5 appointments
                                </div>
                                <nav aria-label="Appointment pagination">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"><i class="fa-light fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fa-light fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
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