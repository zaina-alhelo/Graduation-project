@extends('doctor.master')

@section('title-page')
    Chat Console
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row g-0">
         <!--  Chat Area -->
        <div class="col-md-9">
            @if($user->id)
                <div class="card border-0 shadow h-100">
                    <!-- Enhanced Chat Header -->
                    <div class="card-header bg-gradient-primary text-white py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" 
                                    style="width: 45px; height: 45px;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h5 class="mb-0 fw-bold text-black">{{ $user->name }}</h5>
                                    <div class="d-flex align-items-center text-black">
                                        <small>{{ $user->email }}</small>
                                        <span class="badge bg-light text-primary ms-2 d-flex align-items-center">
                                            <i class="fas fa-id-card-alt me-1"></i> Patient
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light" type="button" id="chatOptionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatOptionsDropdown">
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-file-medical me-2"></i>View Patient Record</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-archive me-2"></i>Archive Conversation</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-external-link-alt me-2"></i>Open in Full Screen</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  Messages Display Area -->
                    <div class="card-body p-0">
                        <div id="messagesContainer" style="height: calc(75vh - 180px); overflow-y: auto; background-color: #f5f7fa; padding: 1rem;">
                            @forelse($messages as $message)
                                <div class="d-flex {{ $message->sender_id == Auth::id() ? 'justify-content-end' : 'justify-content-start' }} mb-3">
                                    @if($message->sender_id != Auth::id())
                                        <div class="me-2 d-flex align-items-end">
                                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                                style="width: 35px; height: 35px; font-size: 0.9rem;">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="message-bubble p-3 rounded-3 {{ $message->sender_id == Auth::id() ? 'bg-primary bg-opacity-25 text-dark' : 'bg-white' }}" 
                                        style="max-width: 75%; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                        @if($message->message)
                                            <div class="message-text">{!! nl2br(e($message->message)) !!}</div>
                                        @endif
                                        
                                        @if($message->attachment)
                                            @php
                                                $extension = pathinfo($message->attachment, PATHINFO_EXTENSION);
                                                $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                                            @endphp
                                            
                                            @if($isImage)
                                                <div class="message-attachment mt-2">
                                                    <img src="{{ asset('storage/' . $message->attachment) }}" 
                                                        alt="Image" 
                                                        class="message-image img-thumbnail" 
                                                        style="max-width: 100%; max-height: 300px; cursor: pointer;"
                                                        onclick="showFullImage('{{ asset('storage/' . $message->attachment) }}')">
                                                </div>
                                            @else
                                                <div class="message-attachment mt-2">
                                                    <a href="{{ asset('storage/' . $message->attachment) }}" 
                                                        target="_blank" 
                                                        class="btn btn-sm btn-outline-primary d-flex align-items-center" style="width: fit-content;">
                                                        <i class="fas fa-paperclip me-2"></i>
                                                        <span>{{ basename($message->attachment) }}</span>
                                                    </a>
                                                </div>
                                            @endif
                                        @endif
                                        
                                        <div class="d-flex justify-content-between align-items-center mt-1">
                                            <small class="text-muted" style="font-size: 0.7rem;">
                                                {{ $message->created_at->format('M d, H:i') }}
                                            </small>
                                            @if($message->sender_id == Auth::id())
                                                <span data-message-id="{{ $message->id }}" class="ms-2">
                                                    @if($message->is_read)
                                                        <i class="fas fa-check-double text-primary" title="Read" style="font-size: 0.8rem;"></i>
                                                    @else
                                                        <i class="fas fa-check text-muted" title="Sent" style="font-size: 0.8rem;"></i>
                                                    @endif
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    @if($message->sender_id == Auth::id())
                                        <div class="ms-2 d-flex align-items-end">
                                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                                style="width: 35px; height: 35px; font-size: 0.9rem;">
                                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <div class="text-center py-5">
                                    <div class="mb-4">
                                        <span class="bg-light p-4 rounded-circle d-inline-block">
                                            <i class="fas fa-comments text-primary" style="font-size: 3rem;"></i>
                                        </span>
                                    </div>
                                    <h5 class="fw-bold">Start a conversation</h5>
                                    <p class="text-muted">Send your first message to {{ $user->name }}</p>
                                    <button class="btn btn-primary" onclick="document.getElementById('messageInput').focus()">
                                        <i class="fas fa-comment-medical me-2"></i>New Message
                                    </button>
                                </div>
                            @endforelse
                        </div>

                        <!-- Enhanced Message Form -->
                        <form id="messageForm" class="p-3 d-flex align-items-end bg-white border-top" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                            <input type="file" id="fileInput" name="attachment" class="d-none" onchange="showFileName(this)">
                            
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-light border rounded-circle" onclick="document.getElementById('fileInput').click()" title="Attach file">
                                    <i class="fas fa-paperclip"></i>
                                </button>
                            </div>
                            
                            <div class="flex-grow-1 position-relative">
                                <textarea name="message" id="messageInput" class="form-control" placeholder="Type your message..." rows="1" style="resize: none; padding-right: 70px;"></textarea>
                                <small id="selectedFileName" class="position-absolute start-0 bottom-100 text-muted mb-1 bg-light px-2 py-1 rounded" style="display: none;"></small>
                                <button type="submit" class="btn btn-primary position-absolute end-0 bottom-0 rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; margin: 2px;" id="sendButton" title="Send message">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="d-flex flex-column align-items-center justify-content-center h-100 py-5 bg-light rounded-3 shadow-sm">
                    <div class="text-center mb-4">
                        <div class="bg-primary bg-opacity-10 p-4 rounded-circle mb-3">
                            <i class="fas fa-user-md text-primary" style="font-size: 4rem;"></i>
                        </div>
                        <h3 class="fw-bold">Welcome, Dr. {{ Auth::user()->name }}</h3>
                        <p class="text-muted mb-4">Select a patient from the sidebar to start a conversation</p>
                        <div class="row justify-content-center gy-3 mt-3" style="max-width: 600px">
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center p-4">
                                        <div class="mb-3 text-info">
                                            <i class="fas fa-clipboard-list fa-2x"></i>
                                        </div>
                                        <h5 class="fw-bold">Patient Records</h5>
                                        <p class="text-muted small">Access your patients' medical history and records</p>
                                        <a href="#" class="btn btn-sm btn-outline-info mt-2">Go to Records</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center p-4">
                                        <div class="mb-3 text-success">
                                            <i class="fas fa-calendar-check fa-2x"></i>
                                        </div>
                                        <h5 class="fw-bold">Appointments</h5>
                                        <p class="text-muted small">View and manage your upcoming appointments</p>
                                        <a href="#" class="btn btn-sm btn-outline-success mt-2">Schedule</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!--  Patient Sidebar -->
        <div class="col-md-3 bg-white shadow-sm" style="height: 85vh; overflow-y: auto;">
            <div class="p-3 border-bottom bg-gradient-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-user-injured me-2"></i>Patients</h5>
                    <span class="badge bg-danger rounded-pill" id="totalUnread" style="font-size: 0.9rem;"></span>
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" id="patientSearch" placeholder="Search patients...">
                </div>
            </div>
            
            <div class="list-group rounded-0" id="patientList">
                @forelse($users as $patientUser)
                    @php
                        $unreadCount = \App\Models\Message::where('sender_id', $patientUser->id)
                            ->where('receiver_id', Auth::id())
                            ->where('is_read', false)
                            ->count();
                        
                     
                        
                        $lastMessageTime = $lastMessage ? $lastMessage->created_at->diffForHumans() : '';
                    @endphp
                    <a href="{{ route('message.index', $patientUser) }}" 
                        class="list-group-item list-group-item-action border-0 border-bottom py-3 patient-item
                            {{ $patientUser->id == $user->id ? 'active bg-light text-black border-start border-primary border-4' : '' }}">
                        <div class="d-flex">
                            <div class="position-relative me-3">
                                <div class="rounded-circle bg-{{ $patientUser->id == $user->id ? 'primary' : 'secondary' }} text-white d-flex align-items-center justify-content-center" 
                                    style="width: 50px; height: 50px;">
                                    {{ strtoupper(substr($patientUser->name, 0, 1)) }}
                                </div>
                                @if($unreadCount > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-circle unread-count" id="unread-{{ $patientUser->id }}">
                                        {{ $unreadCount }}
                                    </span>
                                @else
                                    <span class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-circle unread-count" id="unread-{{ $patientUser->id }}" style="display: none;">
                                        0
                                    </span>
                                @endif
                            </div>
                            <div class="overflow-hidden flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 fw-bold text-truncate" style="max-width: 120px;">{{ $patientUser->name }}</h6>
                                    <small class="text-muted">{{ $lastMessageTime }}</small>
                                </div>
                                <small class="text-muted d-block" style="font-size: 0.75rem;">{{ $patientUser->email }}</small>
                                <small class="text-truncate d-block" style="max-width: 180px; font-size: 0.8rem;">
                                    {{ $lastMessageText }}
                                </small>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="text-center py-5">
                        <div class="text-muted mb-3">
                            <i class="fas fa-user-slash fa-3x"></i>
                        </div>
                        <h6 class="fw-bold">No Patients Found</h6>
                        <p class="small text-muted">No registered patients in your system yet</p>
                    </div>
                @endforelse
            </div>
        </div>

       
    </div>
</div>

<!-- Enhanced Full Image Viewer -->
<div id="imageOverlay" class="position-fixed top-0 start-0 w-100 h-100 d-none" style="background-color: rgba(0,0,0,0.9); z-index: 2000; cursor: pointer; display: flex; justify-content: center; align-items: center;">
    <div class="position-relative" style="max-width: 90%; max-height: 90%;">
        <button id="closeImageBtn" class="position-absolute btn btn-light rounded-circle" style="top: -20px; right: -20px; width: 40px; height: 40px;">
            <i class="fas fa-times"></i>
        </button>
        <img id="fullImage" src="" class="img-fluid" style="max-height: 90vh; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
        <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-50 d-flex justify-content-between align-items-center p-3" style="border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
            <div>
                <button class="btn btn-sm btn-light me-2" id="zoomInBtn">
                    <i class="fas fa-search-plus"></i>
                </button>
                <button class="btn btn-sm btn-light" id="zoomOutBtn">
                    <i class="fas fa-search-minus"></i>
                </button>
            </div>
            <div id="downloadButtonContainer">
            </div>
        </div>
    </div>
</div>

<!-- Desktop Notification Modal -->
<div class="modal fade" id="notificationPermissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-bell me-2"></i>Enable Notifications</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
                <div class="mb-4">
                    <span class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block">
                        <i class="fas fa-bell text-primary" style="font-size: 3rem;"></i>
                    </span>
                </div>
                <h5 class="fw-bold mb-3">Stay Updated on Patient Messages</h5>
                <p class="text-muted">Receive instant notifications when patients send you new messages, even when you're away from this tab.</p>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-link text-muted" data-bs-dismiss="modal">Not Now</button>
                <button type="button" class="btn btn-primary" id="enableNotificationsBtn">
                    <i class="fas fa-check me-2"></i>Enable Notifications
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    scrollToBottom();
    
    const messageInput = document.getElementById('messageInput');
    if (messageInput) {
        messageInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });
    }

    // Setup image viewer
    setupImageViewer();
    
    // Activate message read status checking
    setInterval(checkMessageReadStatus, 10000);
    
    // Calculate initial total unread count
    calculateInitialTotalUnread();
    
    // Activate unread message count checking
    getUnreadCounts();
    setInterval(getUnreadCounts, 15000);
    
    // Setup notifications system
    setupNotifications();
    
    // Search functionality for patient list
    setupPatientSearch();
});

// Function to setup patient search
function setupPatientSearch() {
    const searchInput = document.getElementById('patientSearch');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const patientItems = document.querySelectorAll('.patient-item');
            
            patientItems.forEach(item => {
                const patientName = item.querySelector('h6').textContent.toLowerCase();
                const patientEmail = item.querySelector('small').textContent.toLowerCase();
                
                if (patientName.includes(searchValue) || patientEmail.includes(searchValue)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
}

// Function to calculate initial total unread count
function calculateInitialTotalUnread() {
    let totalUnread = 0;
    const unreadElements = document.querySelectorAll('.unread-count');
    
    unreadElements.forEach(element => {
        if (element.style.display !== 'none') {
            totalUnread += parseInt(element.textContent || '0');
        }
    });
    
    const totalUnreadElement = document.getElementById('totalUnread');
    if (totalUnreadElement) {
        if (totalUnread > 0) {
            totalUnreadElement.textContent = totalUnread;
            totalUnreadElement.style.display = 'inline-block';
            document.title = `(${totalUnread}) New Messages - Doctor Portal`;
        } else {
            totalUnreadElement.style.display = 'none';
            document.title = 'Doctor Portal';
        }
    }
}

function scrollToBottom() {
    const messagesContainer = document.getElementById('messagesContainer');
    if (messagesContainer) {
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
}

function showFileName(input) {
    const fileNameDisplay = document.getElementById('selectedFileName');
    if (input.files.length > 0) {
        const fileName = input.files[0].name;
        const fileSize = (input.files[0].size / (1024 * 1024)).toFixed(2);
        fileNameDisplay.textContent = `${fileName} (${fileSize} MB)`;
        fileNameDisplay.style.display = 'block';
    } else {
        fileNameDisplay.style.display = 'none';
    }
}

// Enhanced image viewer system
function setupImageViewer() {
    const overlay = document.getElementById('imageOverlay');
    const fullImage = document.getElementById('fullImage');
    const closeBtn = document.getElementById('closeImageBtn');
    const zoomInBtn = document.getElementById('zoomInBtn');
    const zoomOutBtn = document.getElementById('zoomOutBtn');
    
    let currentScale = 1;
    
    // Close image when clicking anywhere on the screen
    overlay.addEventListener('click', function(e) {
        if (e.target === overlay) {
            hideFullImage();
        }
    });
    
    // Close image when clicking the close button
    closeBtn.addEventListener('click', hideFullImage);
    
    // Close image when pressing ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !overlay.classList.contains('d-none')) {
            hideFullImage();
        }
    });
    
    // Zoom in functionality
    if (zoomInBtn) {
        zoomInBtn.addEventListener('click', function() {
            currentScale += 0.25;
            fullImage.style.transform = `scale(${currentScale})`;
        });
    }
    
    // Zoom out functionality
    if (zoomOutBtn) {
        zoomOutBtn.addEventListener('click', function() {
            if (currentScale > 0.5) {
                currentScale -= 0.25;
                fullImage.style.transform = `scale(${currentScale})`;
            }
        });
    }
}

function showFullImage(imageSrc) {
    const overlay = document.getElementById('imageOverlay');
    const fullImage = document.getElementById('fullImage');
    const downloadButtonContainer = document.getElementById('downloadButtonContainer');

    fullImage.src = imageSrc;
    fullImage.style.transform = 'scale(1)'; // Reset zoom

    // Show the image
    overlay.classList.remove('d-none');
    overlay.classList.add('d-flex');
    
    // Add download link
    const fileName = imageSrc.split('/').pop();
    downloadButtonContainer.innerHTML = `
        <a href="${imageSrc}" download="${fileName}" class="btn btn-light">
            <i class="fas fa-download me-2"></i>Download
        </a>
    `;
    
    document.body.style.overflow = 'hidden';
}

// Function to hide the full-sized image
function hideFullImage() {
    const overlay = document.getElementById('imageOverlay');
    
    overlay.classList.add('d-none');
    overlay.classList.remove('d-flex');
    
    // Allow scrolling again
    document.body.style.overflow = '';
}

// Function to check message read status
function checkMessageReadStatus() {
    const receiverId = document.querySelector('input[name="receiver_id"]')?.value;
    
    if (!receiverId) return;
    
    const checkReadUrl = `/doctor/message/check-read-status/${receiverId}`;
    
    fetch(checkReadUrl, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        credentials: 'same-origin',
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateReadStatus(data.messages);
        }
    })
    .catch(error => {
        console.error('Error checking read status:', error);
    });
}

// Function to update read status indicators
function updateReadStatus(messages) {
    messages.forEach(message => {
        const messageElements = document.querySelectorAll(`[data-message-id="${message.id}"]`);
        if (messageElements.length > 0) {
            messageElements.forEach(element => {
                if (message.is_read) {
                    element.innerHTML = '<i class="fas fa-check-double text-primary" title="Read" style="font-size: 0.8rem;"></i>';
                } else {
                    element.innerHTML = '<i class="fas fa-check text-muted" title="Sent" style="font-size: 0.8rem;"></i>';
                }
            });
        }
    });
}

// Function to get unread message counts
function getUnreadCounts() {
    const unreadCountUrl = '/doctor/message/unread-count';
    
    fetch(unreadCountUrl, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        credentials: 'same-origin',
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateUnreadCounts(data.counts);
        }
    })
    .catch(error => {
        console.error('Error getting unread counts:', error);
    });
}

// Function to update unread message counts in sidebar
function updateUnreadCounts(counts) {
    let totalUnread = 0;
    
    // Hide all counters first
    document.querySelectorAll('.unread-count').forEach(counter => {
        counter.style.display = 'none';
        counter.textContent = '0';
    });
    
    // Update counters with unread messages
    for (const [senderId, count] of Object.entries(counts)) {
        const counter = document.getElementById(`unread-${senderId}`);
        if (counter && count > 0) {
            counter.textContent = count;
            counter.style.display = 'inline-block';
            totalUnread += parseInt(count);
        }
    }
    
    // Update total counter
    const totalUnreadElement = document.getElementById('totalUnread');
    if (totalUnreadElement) {
        if (totalUnread > 0) {
            totalUnreadElement.textContent = totalUnread;
            totalUnreadElement.style.display = 'inline-block';
            
            // Update page title too
            document.title = `(${totalUnread}) New Messages - Doctor Portal`;
            
            // Show browser notification if enabled and tab not active
            if (Notification.permission === 'granted' && document.visibilityState !== 'visible') {
                showNotification(`You have ${totalUnread} unread messages from patients`);
            }
        } else {
            totalUnreadElement.style.display = 'none';
            document.title = 'Doctor Portal';
        }
    }
}

// Notification system
function setupNotifications() {
    // Check if browser supports notifications
    if (!('Notification' in window)) {
        console.log('This browser does not support desktop notifications');
        return;
    }
    
    // Check if user has already granted permission
    if (Notification.permission !== 'granted' && Notification.permission !== 'denied') {
        // We need to ask for permission
        setTimeout(() => {
            const notificationModal = new bootstrap.Modal(document.getElementById('notificationPermissionModal'));
            notificationModal.show();
            
            document.getElementById('enableNotificationsBtn').addEventListener('click', function() {
                requestNotificationPermission();
                notificationModal.hide();
            });
        }, 3000);
    }
}

function requestNotificationPermission() {
    Notification.requestPermission().then(function(permission) {
        if (permission === 'granted') {
            showNotification('Notifications enabled successfully!');
        }
    });
}

function showNotification(message) {
    // Only show notification if tab is not active
    if (document.visibilityState === 'visible') {
        return;
    }
    
    const notification = new Notification('Medical Messaging System', {
        body: message,
        icon: '/favicon.ico' // Make sure this path is correct
    });
    
    notification.onclick = function() {
        window.focus();
        this.close();
    };
    
    // Auto close after 5 seconds
    setTimeout(notification.close.bind(notification), 5000);
}

// Function to send message - used with Enter key and send button
function sendMessage() {
    const messageForm = document.getElementById('messageForm');
    const messageInput = document.getElementById('messageInput');
    const fileInput = document.getElementById('fileInput');
    const sendButton = document.getElementById('sendButton');
    const receiverId = document.querySelector('input[name="receiver_id"]')?.value;

    if (!messageInput.value.trim() && fileInput.files.length === 0) {
        return; 
    }

    if (!receiverId) {
        console.error('Receiver ID not found');
        return;
    }

    sendButton.disabled = true;
    sendButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

    let formData = new FormData(messageForm);
    
    if (fileInput.files.length > 0) {
        formData.delete('attachment');
        formData.append('attachment', fileInput.files[0]);
    }
    
    const sendUrl = `/doctor/message/send/${receiverId}`;

    fetch(sendUrl, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        },
        credentials: 'same-origin',
    })
    .then(response => {
        if (!response.ok) {
            console.error('Server responded with status:', response.status);
            return response.text().then(text => {
                throw new Error('Network error: ' + text);
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const message = data.message;
            const messagesContainer = document.getElementById('messagesContainer');
            const authUserId = messageForm.getAttribute('data-auth-id') || document.body.getAttribute('data-auth-id');
            
            // Clear the empty state if it exists
            const emptyState = messagesContainer.querySelector('.text-center.py-5');
            if (emptyState) {
                messagesContainer.innerHTML = '';
            }

            const isOutgoing = message.sender_id == authUserId;
            const messageClass = isOutgoing ? 'justify-content-end' : 'justify-content-start';
            const bubbleClass = isOutgoing ? 'bg-primary bg-opacity-25 text-dark' : 'bg-white';
            
            // Format the content with proper line breaks
            let messageContent = message.message ? nl2br(message.message) : '';
            
            // Format the attachment
            let attachmentHTML = '';
            if (message.attachment) {
                const storagePath = '/storage/' + message.attachment;
                const extension = message.attachment.split('.').pop().toLowerCase();
                
                if (['jpg', 'jpeg', 'png', 'gif'].includes(extension)) {
                    attachmentHTML = `
                        <div class="message-attachment mt-2">
                            <img src="${storagePath}" 
                                alt="Image" 
                                class="message-image img-thumbnail" 
                                style="max-width: 100%; max-height: 300px; cursor: pointer;"
                                onclick="showFullImage('${storagePath}')">
                        </div>
                    `;
                } else {
                    attachmentHTML = `
                        <div class="message-attachment mt-2">
                            <a href="${storagePath}" 
                                target="_blank" 
                                class="btn btn-sm btn-outline-primary d-flex align-items-center" style="width: fit-content;">
                                <i class="fas fa-paperclip me-2"></i>
                                <span>${message.attachment.split('/').pop()}</span>
                            </a>
                        </div>
                    `;
                }
            }
            
            // Get the current user's first initial for the avatar
            const currentUserName = document.querySelector('.fw-bold.mb-0')?.textContent || 'User';
            const userInitial = currentUserName.charAt(0).toUpperCase();
            
            // Create the new message HTML
            let newMessageHTML = `
                <div class="d-flex ${messageClass} mb-3">
                    ${!isOutgoing ? `
                        <div class="me-2 d-flex align-items-end">
                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                style="width: 35px; height: 35px; font-size: 0.9rem;">
                                ${document.querySelector('.card-header h5')?.textContent.charAt(0).toUpperCase() || 'P'}
                            </div>
                        </div>
                    ` : ''}
                    <div class="message-bubble p-3 rounded-3 ${bubbleClass}" style="max-width: 75%; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                        ${messageContent ? `<div class="message-text">${messageContent}</div>` : ''}
                        ${attachmentHTML}
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <small class="text-muted" style="font-size: 0.7rem;">
                                ${new Date().toLocaleString('en-US', {month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit'})}
                            </small>
                            ${isOutgoing ? `
                                <span data-message-id="${message.id}" class="ms-2">
                                    <i class="fas fa-check text-muted" title="Sent" style="font-size: 0.8rem;"></i>
                                </span>
                            ` : ''}
                        </div>
                    </div>
                    ${isOutgoing ? `
                        <div class="ms-2 d-flex align-items-end">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                style="width: 35px; height: 35px; font-size: 0.9rem;">
                                ${userInitial}
                            </div>
                        </div>
                    ` : ''}
                </div>
            `;
            
            // Add the message to the container
            messagesContainer.insertAdjacentHTML('beforeend', newMessageHTML);
            
            // Clear inputs
            messageInput.value = '';
            fileInput.value = '';
            document.getElementById('selectedFileName').style.display = 'none';
            
            // Scroll to bottom
            scrollToBottom();
        } else {
            console.error('Error sending message:', data);
            alert('Failed to send message. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while sending the message: ' + error.message);
    })
    .finally(() => {
        sendButton.disabled = false;
        sendButton.innerHTML = '<i class="fas fa-paper-plane"></i>';
    });
}

// Helper function to convert newlines to <br> tags
function nl2br(str) {
    if (!str) return '';
    return str.replace(/\n/g, '<br>');
}

// Listen for form submit
document.getElementById('messageForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    sendMessage();
});

// Listen for visibility changes to reset notification count
document.addEventListener('visibilitychange', function() {
    if (document.visibilityState === 'visible') {
        // Reset page title when user returns to the tab
        const totalUnreadElement = document.getElementById('totalUnread');
        if (totalUnreadElement && totalUnreadElement.style.display !== 'none') {
            document.title = 'Doctor Portal - New Messages';
        } else {
            document.title = 'Doctor Portal';
        }
        
        // Mark messages as read when tab becomes visible
        markMessagesAsRead();
    }
});

// Function to mark messages as read when tab becomes visible
function markMessagesAsRead() {
    const receiverId = document.querySelector('input[name="receiver_id"]')?.value;
    
    if (!receiverId) return;
    
    const markReadUrl = `/doctor/message/mark-read/${receiverId}`;
    
    fetch(markReadUrl, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        credentials: 'same-origin',
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update unread counts
            getUnreadCounts();
        }
    })
    .catch(error => {
        console.error('Error marking messages as read:', error);
    });
}

// Polling for new messages
function pollForNewMessages() {
    const receiverId = document.querySelector('input[name="receiver_id"]')?.value;
    
    if (!receiverId) return;
    
    const lastMessageId = getLastMessageId();
    const pollUrl = `/doctor/message/poll/${receiverId}?last_id=${lastMessageId}`;
    
    fetch(pollUrl, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Accept': 'application/json'
        },
        credentials: 'same-origin',
    })
    .then(response => response.json())
    .then(data => {
        if (data.success && data.messages.length > 0) {
            appendNewMessages(data.messages);
            
            // Update unread counts
            getUnreadCounts();
            
            // Mark as read if tab is visible
            if (document.visibilityState === 'visible') {
                markMessagesAsRead();
            }
        }
    })
    .catch(error => {
        console.error('Error polling for new messages:', error);
    });
}

// Get the ID of the last message in the chat
function getLastMessageId() {
    const messageElements = document.querySelectorAll('[data-message-id]');
    
    if (messageElements.length > 0) {
        const lastElement = messageElements[messageElements.length - 1];
        return lastElement.getAttribute('data-message-id');
    }
    
    return 0;
}

// Append new messages received from polling
function appendNewMessages(messages) {
    const messagesContainer = document.getElementById('messagesContainer');
    const authUserId = document.body.getAttribute('data-auth-id');
    
    messages.forEach(message => {
        // Skip if this message is already in the DOM
        if (document.querySelector(`[data-message-id="${message.id}"]`)) {
            return;
        }
        
        const isOutgoing = message.sender_id == authUserId;
        const messageClass = isOutgoing ? 'justify-content-end' : 'justify-content-start';
        const bubbleClass = isOutgoing ? 'bg-primary bg-opacity-25 text-dark' : 'bg-white';
        
        // Format the content with proper line breaks
        let messageContent = message.message ? nl2br(message.message) : '';
        
        // Format the attachment
        let attachmentHTML = '';
        if (message.attachment) {
            const storagePath = '/storage/' + message.attachment;
            const extension = message.attachment.split('.').pop().toLowerCase();
            
            if (['jpg', 'jpeg', 'png', 'gif'].includes(extension)) {
                attachmentHTML = `
                    <div class="message-attachment mt-2">
                        <img src="${storagePath}" 
                            alt="Image" 
                            class="message-image img-thumbnail" 
                            style="max-width: 100%; max-height: 300px; cursor: pointer;"
                            onclick="showFullImage('${storagePath}')">
                    </div>
                `;
            } else {
                attachmentHTML = `
                    <div class="message-attachment mt-2">
                        <a href="${storagePath}" 
                            target="_blank" 
                            class="btn btn-sm btn-outline-primary d-flex align-items-center" style="width: fit-content;">
                            <i class="fas fa-paperclip me-2"></i>
                            <span>${message.attachment.split('/').pop()}</span>
                        </a>
                    </div>
                `;
            }
        }
        
        // Create the new message HTML
        let newMessageHTML = `
            <div class="d-flex ${messageClass} mb-3">
                ${!isOutgoing ? `
                    <div class="me-2 d-flex align-items-end">
                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                            style="width: 35px; height: 35px; font-size: 0.9rem;">
                            ${document.querySelector('.card-header h5')?.textContent.charAt(0).toUpperCase() || 'P'}
                        </div>
                    </div>
                ` : ''}
                <div class="message-bubble p-3 rounded-3 ${bubbleClass}" style="max-width: 75%; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                    ${messageContent ? `<div class="message-text">${messageContent}</div>` : ''}
                    ${attachmentHTML}
                    <div class="d-flex justify-content-between align-items-center mt-1">
                        <small class="text-muted" style="font-size: 0.7rem;">
                            ${new Date(message.created_at).toLocaleString('en-US', {month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit'})}
                        </small>
                        ${isOutgoing ? `
                            <span data-message-id="${message.id}" class="ms-2">
                                <i class="fas fa-check text-muted" title="Sent" style="font-size: 0.8rem;"></i>
                            </span>
                        ` : ''}
                    </div>
                </div>
                ${isOutgoing ? `
                    <div class="ms-2 d-flex align-items-end">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                            style="width: 35px; height: 35px; font-size: 0.9rem;">
                            ${document.querySelector('.fw-bold')?.textContent.charAt(0).toUpperCase() || 'D'}
                        </div>
                    </div>
                ` : ''}
            </div>
        `;
        
        // Add the message to the container
        messagesContainer.insertAdjacentHTML('beforeend', newMessageHTML);
    });
    
    // Play notification sound if needed
    if (messages.length > 0 && messages.some(m => m.sender_id != authUserId)) {
        playNotificationSound();
    }
    
    // Scroll to bottom
    scrollToBottom();
}
    </script>

@endsection 