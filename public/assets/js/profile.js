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
document.addEventListener('DOMContentLoaded', function() {
    // Get all sidebar items
    const sidebarItems = document.querySelectorAll('.sidebar-item');
    
    // Add click event listeners to each sidebar item
    sidebarItems.forEach(item => {
        item.addEventListener('click', function() {
            // Get the target section ID
            const targetId = this.getAttribute('data-target');
            
            // Remove active class from all sidebar items
            sidebarItems.forEach(el => el.classList.remove('active'));
            
            // Add active class to clicked item
            this.classList.add('active');
            
            // Hide all sections
            document.querySelectorAll('.profile-card').forEach(section => {
                section.style.display = 'none';
            });
            
            // Show the target section
            const targetSection = document.getElementById(targetId + '-section');
            if (targetSection) {
                targetSection.style.display = 'block';
            }
        });
    });
    
    // Profile Picture Upload Functionality
    const profilePictureInput = document.getElementById('profilePictureInput');
    const profileImage = document.getElementById('profileImage');
    const removeProfilePictureBtn = document.getElementById('removeProfilePicture');
    const profileIconPlaceholder = document.querySelector('.profile-icon-placeholder');
    
    if (profilePictureInput && profileImage && removeProfilePictureBtn) {
        // Handle profile picture selection
        profilePictureInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Set the image source to the uploaded file
                    profileImage.src = e.target.result;
                    profileImage.style.display = 'block';
                    
                    // Hide the placeholder icon
                    if (profileIconPlaceholder) {
                        profileIconPlaceholder.style.display = 'none';
                    }
                    
                    // Show the remove button
                    removeProfilePictureBtn.style.display = 'inline-block';
                }
                
                reader.readAsDataURL(file);
            }
        });
        
        // Handle remove profile picture button
        removeProfilePictureBtn.addEventListener('click', function() {
            // Clear the file input
            profilePictureInput.value = '';
            
            // Hide the image and show placeholder
            profileImage.style.display = 'none';
            profileImage.src = '';
            
            // Show the placeholder icon
            if (profileIconPlaceholder) {
                profileIconPlaceholder.style.display = 'flex';
            }
            
            // Hide the remove button
            this.style.display = 'none';
        });
    }
});