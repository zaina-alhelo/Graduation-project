@extends('landing.master')

@section('content')
<br/>
<br/>
    <!-- Profile area start -->
    <section class="profile-section section-space__bottom">
        <div class="container">
            <div class="row">
                <!-- Sidebar Navigation -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="profile-sidebar">
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
                    <div class="profile-card" id="personal-info-section">
                        <h4>Personal Information</h4>
                        
                        <form id="profileForm">
                            <div class="form-group position-relative">
                                <label for="name" class="form-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-light fa-user"></i></span>
                                    <input type="text" class="form-control" id="name" value="Sarah Johnson" required>
                                </div>
                            </div>
                            
                            <div class="form-group position-relative">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-light fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" value="sarah.johnson@example.com" required>
                                </div>
                            </div>
                            
                            <div class="form-group position-relative">
                                <label for="phone" class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-light fa-phone"></i></span>
                                    <input type="tel" class="form-control" id="phone" value="+1 (555) 123-4567">
                                </div>
                            </div>
                            
                            <h5 class="form-section-title">Additional Information</h5>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="birthdate" class="form-label">Date of Birth</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-light fa-calendar-days"></i></span>
                                            <input type="date" class="form-control" id="birthdate" value="1985-05-15">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="gender" class="form-label">Gender</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-light fa-venus-mars"></i></span>
                                            <input type="text" class="form-control" id="gender" list="genderOptions" placeholder="Select gender">
                                        </div>
                                        <datalist id="genderOptions">
                                            <option value="Male">
                                            <option value="Female">
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group position-relative">
                                <label for="address" class="form-label">Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-light fa-location-dot"></i></span>
                                    <input type="text" class="form-control" id="address" value="123 Vision Street, Eyecare City, EC 12345">
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
                    <div class="profile-card" id="change-password-section" style="display: none;">
                        <h4>Change Password</h4>
                        
                        <form id="passwordForm">
                            <div class="form-group position-relative">
                                <label for="currentPassword" class="form-label">Current Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-light fa-lock"></i></span>
                                    <input type="password" class="form-control" id="currentPassword" required>
                                </div>
                            </div>
                            
                            <div class="form-group position-relative">
                                <label for="newPassword" class="form-label">New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-light fa-key"></i></span>
                                    <input type="password" class="form-control" id="newPassword" required>
                                </div>
                                <small class="text-muted">Password must be at least 8 characters long and include numbers and special characters</small>
                            </div>
                            
                            <div class="form-group position-relative">
                                <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-light fa-key"></i></span>
                                    <input type="password" class="form-control" id="confirmPassword" required>
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
                    <div class="profile-card" id="chat-with-doctor-section" style="display: none;">
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
<script>
// Simple form submission handler
document.addEventListener('DOMContentLoaded', function() {
    const profileForm = document.getElementById('profileForm');
    const passwordForm = document.getElementById('passwordForm');
    
    // Profile form handler
    profileForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Show loading indicator
        document.querySelector('.loading-form').style.display = 'flex';
        
        // Simulate server request
        setTimeout(function() {
            // Hide loading indicator
            document.querySelector('.loading-form').style.display = 'none';
            
            // Show success message
            const successAlert = document.createElement('div');
            successAlert.className = 'alert alert-success alert-dismissible fade show';
            successAlert.innerHTML = `
                <strong>Success!</strong> Your profile information has been updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            
            profileForm.insertAdjacentElement('beforebegin', successAlert);
            
            // Auto dismiss after 5 seconds
            setTimeout(function() {
                const bsAlert = new bootstrap.Alert(successAlert);
                bsAlert.close();
            }, 5000);
        }, 1000);
    });
    
    // Password form handler
    passwordForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Basic validation
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        if (newPassword !== confirmPassword) {
            const errorAlert = document.createElement('div');
            errorAlert.className = 'alert alert-danger alert-dismissible fade show';
            errorAlert.innerHTML = `
                <strong>Error!</strong> Passwords do not match.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            passwordForm.insertAdjacentElement('beforebegin', errorAlert);
            return;
        }
        
        // Show loading indicator
        document.querySelector('.loading-form').style.display = 'flex';
        
        // Simulate server request
        setTimeout(function() {
            // Hide loading indicator
            document.querySelector('.loading-form').style.display = 'none';
            
            // Show success message
            const successAlert = document.createElement('div');
            successAlert.className = 'alert alert-success alert-dismissible fade show';
            successAlert.innerHTML = `
                <strong>Success!</strong> Your password has been updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            
            passwordForm.insertAdjacentElement('beforebegin', successAlert);
            
            // Clear form fields
            passwordForm.reset();
            
            // Auto dismiss after 5 seconds
            setTimeout(function() {
                const bsAlert = new bootstrap.Alert(successAlert);
                bsAlert.close();
            }, 5000);
        }, 1000);
    });
    
    // Sidebar navigation functionality
    const sidebarItems = document.querySelectorAll('.sidebar-item');
    sidebarItems.forEach(item => {
        item.addEventListener('click', function() {
            // Check if this is a navigation item
            if (this.classList.contains('navigate-item')) {
                // Navigate to the specified URL
                const targetUrl = this.getAttribute('data-href');
                if (targetUrl) {
                    window.location.href = targetUrl;
                }
                return;
            }
            
            // Remove active class from all items
            sidebarItems.forEach(i => i.classList.remove('active'));
            
            // Add active class to the clicked item
            this.classList.add('active');
            
            // Hide all sections
            document.getElementById('personal-info-section').style.display = 'none';
            document.getElementById('change-password-section').style.display = 'none';
            document.getElementById('chat-with-doctor-section').style.display = 'none';
            
            // Show the selected section
            const target = this.getAttribute('data-target');
            if (target === 'personal-info') {
                document.getElementById('personal-info-section').style.display = 'block';
            } else if (target === 'change-password') {
                document.getElementById('change-password-section').style.display = 'block';
            } else if (target === 'chat-with-doctor') {
                document.getElementById('chat-with-doctor-section').style.display = 'block';
            }
        });
    });
    
    // Doctor chat functionality
    const doctorSelect = document.getElementById('doctorSelect');
    const chatInput = document.getElementById('chatInput');
    const chatForm = document.getElementById('chatForm');
    const chatMessages = document.getElementById('chatMessages');
    const activeDoctorInfo = document.getElementById('activeDoctorInfo');
    
    doctorSelect.addEventListener('change', function() {
        if (this.value) {
            // Enable chat when doctor is selected
            chatInput.disabled = false;
            chatForm.querySelector('button[type="submit"]').disabled = false;
            document.getElementById('attachmentBtn').disabled = false;
            
            // Update active doctor info in chat header
            const doctorName = this.options[this.selectedIndex].text.split(' - ')[0];
            const doctorSpecialty = this.options[this.selectedIndex].text.split(' - ')[1];
            activeDoctorInfo.innerHTML = `
                <span class="doctor-status"></span>
                <div>
                    <strong>${doctorName}</strong>
                    <div class="doctor-specialty">${doctorSpecialty}</div>
                </div>
            `;
            
            // Clear previous messages
            while (chatMessages.firstChild) {
                chatMessages.removeChild(chatMessages.firstChild);
            }
            
            // Add welcome message
            const welcomeMessage = document.createElement('div');
            welcomeMessage.className = 'chat-message doctor-message';
            welcomeMessage.innerHTML = `
                <div class="message-content">
                    <strong>${doctorName.replace('Dr. ', '')}</strong>
                    <p>Hello! How can I help you with your eye health today?</p>
                </div>
            `;
            chatMessages.appendChild(welcomeMessage);
        } else {
            // Disable chat when no doctor selected
            chatInput.disabled = true;
            chatForm.querySelector('button[type="submit"]').disabled = true;
            document.getElementById('attachmentBtn').disabled = true;
            activeDoctorInfo.innerHTML = `<span class="empty-state">Select a doctor to start chat</span>`;
        }
    });
    
    // File attachment handling
    const attachmentBtn = document.getElementById('attachmentBtn');
    const fileInput = document.getElementById('fileAttachment');
    let selectedFile = null;
    
    attachmentBtn.addEventListener('click', function() {
        fileInput.click();
    });
    
    fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            selectedFile = this.files[0];
            
            // Show selected file name
            const filePreview = document.getElementById('filePreview');
            filePreview.innerHTML = `
                <div class="selected-file">
                    <i class="fa-light fa-file"></i>
                    <span>${selectedFile.name}</span>
                    <button type="button" class="remove-file" id="removeFile">
                        <i class="fa-light fa-times"></i>
                    </button>
                </div>
            `;
            filePreview.style.display = 'block';
            
            // Add remove button functionality
            document.getElementById('removeFile').addEventListener('click', function() {
                selectedFile = null;
                filePreview.innerHTML = '';
                filePreview.style.display = 'none';
                fileInput.value = '';
            });
        }
    });
    
    chatForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const message = chatInput.value.trim();
        if (!message && !selectedFile) return;
        
        // Add user message with status indicator
        const userMessage = document.createElement('div');
        userMessage.className = 'chat-message user-message';
        
        // Build message content based on whether there's text, attachment, or both
        let messageHTML = `
            <div class="message-content">
                <strong>You</strong>`;
                
        if (message) {
            messageHTML += `<p>${message}</p>`;
        }
        
        // Add attachment if present
        if (selectedFile) {
            const fileType = selectedFile.type.split('/')[0];
            let fileIcon = 'fa-file';
            let fileDisplay = '';
            
            if (fileType === 'image') {
                fileIcon = 'fa-image';
                // Create image preview
                const imgURL = URL.createObjectURL(selectedFile);
                fileDisplay = `<img src="${imgURL}" class="attachment-preview" alt="${selectedFile.name}">`;
            } else {
                fileDisplay = `<i class="fa-light ${fileIcon}"></i>`;
            }
            
            messageHTML += `
                <div class="message-attachment">
                    ${fileDisplay}
                    <div class="attachment-info">
                        <span class="attachment-name">${selectedFile.name}</span>
                        <span class="attachment-size">${(selectedFile.size/1024).toFixed(1)} KB</span>
                    </div>
                </div>`;
        }
        
        messageHTML += `</div>
            <div class="message-status">
                <span class="message-sent"><i class="fa-light fa-check"></i></span>
            </div>`;
            
        userMessage.innerHTML = messageHTML;
        chatMessages.appendChild(userMessage);
        
        // Clear input and reset attachment
        chatInput.value = '';
        if (selectedFile) {
            selectedFile = null;
            document.getElementById('filePreview').innerHTML = '';
            document.getElementById('filePreview').style.display = 'none';
            fileInput.value = '';
        }
        
        // Simulate doctor typing and response
        setTimeout(() => {
            // Add typing indicator
            const typingIndicator = document.createElement('div');
            typingIndicator.className = 'chat-message doctor-typing';
            typingIndicator.innerHTML = `<div class="typing-indicator"><span></span><span></span><span></span></div>`;
            chatMessages.appendChild(typingIndicator);
            
            // Scroll to bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;
            
            // Simulate doctor response after typing
            setTimeout(() => {
                // Remove typing indicator
                chatMessages.removeChild(typingIndicator);
                
                // Add doctor response
                const doctorMessage = document.createElement('div');
                doctorMessage.className = 'chat-message doctor-message';
                doctorMessage.innerHTML = `
                    <div class="message-content">
                        <strong>Dr. ${doctorSelect.options[doctorSelect.selectedIndex].text.split(' - ')[0].replace('Dr. ', '')}</strong>
                        <p>Thank you for your message. One of our specialists will respond shortly. Is there anything specific about your eye health you'd like to discuss?</p>
                    </div>
                `;
                chatMessages.appendChild(doctorMessage);
                
                // Update to blue double ticks after doctor responds
                setTimeout(() => {
                    const messageStatuses = document.querySelectorAll('.message-sent');
                    messageStatuses.forEach(status => {
                        status.innerHTML = '<i class="fa-light fa-check-double blue-ticks"></i>';
                    });
                }, 500);
                
                // Scroll to bottom
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 2000); // Doctor typing duration
        }, 800); // Delay before typing starts
        
        // Scroll to bottom
        chatMessages.scrollTop = chatMessages.scrollHeight;
    });
});
</script>

@endsection


@section('styles')
<style>
/* Chat with Doctor Styling */
.doctor-chat-container {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    background: #fff;
}

.selected-doctor-info {
    display: flex;
    align-items: center;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}

.doctor-avatar-container {
    margin-right: 15px;
}

.doctor-avatar {
    width: 50px;
    height: 50px;
    background: var(--rr-theme-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
}

.doctor-selection-wrapper {
    flex-grow: 1;
}

.chat-window {
    display: flex;
    flex-direction: column;
    height: 500px;
    border: 1px solid #e5e5e5;
    border-radius: 12px;
    overflow: hidden;
}

.chat-header {
    padding: 15px;
    background: var(--rr-theme-primary);
    color: white;
    font-weight: 600;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
}

.chat-header .empty-state {
    opacity: 0.8;
    font-style: italic;
}

.chat-messages {
    flex-grow: 1;
    padding: 15px;
    overflow-y: auto;
    background: #f5f7f9;
    display: flex;
    flex-direction: column;
}

.chat-message {
    margin-bottom: 15px;
    max-width: 80%;
    position: relative;
}

.system-message {
    align-self: center;
    text-align: center;
    background: #e9ecef;
    padding: 8px 15px;
    border-radius: 18px;
    font-size: 0.9rem;
    color: #6c757d;
    max-width: 90%;
    margin: 10px auto;
}

.user-message {
    align-self: flex-end;
}

.doctor-message {
    align-self: flex-start;
}

.message-content {
    padding: 12px 15px;
    border-radius: 18px;
    position: relative;
    word-break: break-word;
}

.user-message .message-content {
    background: var(--rr-theme-primary);
    color: white;
    border-bottom-right-radius: 4px;
}

.user-message .message-content * {
    color: white;
}

.user-message .message-content strong {
    color: white;
    opacity: 0.9;
    font-size: 0.85rem;
    display: block;
    margin-bottom: 5px;
}

.user-message .attachment-info {
    color: white;
}

.user-message .attachment-name,
.user-message .attachment-size {
    color: white;
}

.doctor-message .message-content {
    background: white;
    border: 1px solid #e5e5e5;
    border-bottom-left-radius: 4px;
}

.message-content strong {
    font-size: 0.85rem;
    display: block;
    margin-bottom: 5px;
}

.doctor-message .message-content strong {
    color: var(--rr-theme-primary);
}

.message-content p {
    margin: 0;
}

.message-status {
    font-size: 0.75rem;
    color: #999;
    margin-top: 3px;
    text-align: right;
}

.blue-ticks {
    color: var(--rr-theme-primary);
}

.doctor-typing {
    align-self: flex-start;
}

.typing-indicator {
    display: inline-flex;
    align-items: center;
    background: #e9ecef;
    padding: 8px 15px;
    border-radius: 18px;
}

.typing-indicator span {
    height: 8px;
    width: 8px;
    border-radius: 50%;
    background: #6c757d;
    margin: 0 2px;
    display: inline-block;
    animation: typingAnimation 1s infinite ease-in-out;
}

.typing-indicator span:nth-child(1) {
    animation-delay: 0s;
}

.typing-indicator span:nth-child(2) {
    animation-delay: 0.2s;
}

.typing-indicator span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes typingAnimation {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
    100% { transform: translateY(0px); }
}

.chat-input-container {
    padding: 15px;
    background: #fff;
    border-top: 1px solid #e5e5e5;
}

.file-preview {
    padding: 10px;
    background: #f8f9fa;
    margin-bottom: 10px;
    border-radius: 8px;
}

.selected-file {
    display: flex;
    align-items: center;
    background: white;
    padding: 8px 12px;
    border-radius: 20px;
    border: 1px solid #e5e5e5;
}

.selected-file i {
    margin-right: 8px;
    color: #6c757d;
}

.selected-file span {
    flex-grow: 1;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 200px;
}

.remove-file {
    background: none;
    border: none;
    color: #dc3545;
    padding: 0 5px;
}

.chat-form {
    display: flex;
    align-items: center;
}

.attachment-btn {
    background: none;
    border: 1px solid #ced4da;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    transition: all 0.2s;
}

.attachment-btn:hover:not(:disabled) {
    background: #f8f9fa;
    color: var(--rr-theme-primary);
}

.attachment-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.message-attachment {
    margin-top: 10px;
    background: rgba(255,255,255,0.1);
    border-radius: 8px;
    padding: 8px;
    display: flex;
    align-items: center;
}

.user-message .message-attachment {
    background: rgba(255,255,255,0.2);
}

.doctor-message .message-attachment {
    background: #f8f9fa;
}

.message-attachment img.attachment-preview {
    max-width: 120px;
    max-height: 80px;
    border-radius: 6px;
    margin-right: 10px;
}

.attachment-info {
    display: flex;
    flex-direction: column;
}

.attachment-name {
    font-weight: 500;
    font-size: 0.85rem;
    margin-bottom: 3px;
}

.attachment-size {
    font-size: 0.75rem;
    opacity: 0.8;
}

#activeDoctorInfo {
    display: flex;
    align-items: center;
}

#activeDoctorInfo .doctor-status {
    width: 8px;
    height: 8px;
    background: #28a745;
    border-radius: 50%;
    margin-right: 6px;
    display: inline-block;
}
</style>

@endsection