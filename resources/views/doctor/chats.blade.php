@extends('doctor.master')

@section('title-page')
chats
@endsection

@section('content')





<div class="container-fluid py-4">
        <div class="row">
            <!-- Sidebar Patient List -->
            <div class="col-md-3 border-end h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Patients</h5>
                    <span class="badge bg-primary" id="totalUnread"></span>
                </div>
                
                <div class="list-group">
                    @forelse($users as $patientUser)
                        @php
                            $unreadCount = \App\Models\Message::where('sender_id', $patientUser->id)
                                ->where('receiver_id', Auth::id())
                                ->where('is_read', false)
                                ->count();
                        @endphp
                        <a href="{{ route('message.index', $patientUser) }}" 
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center
                                {{ $patientUser->id == $user->id ? 'active' : '' }}">
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center me-2" 
                                        style="width: 40px; height: 40px;">
                                        {{ strtoupper(substr($patientUser->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $patientUser->name }}</h6>
                                        <small class="text-muted">{{ $patientUser->email }}</small>
                                    </div>
                                </div>
                            </div>
                            <span class="badge bg-danger rounded-pill unread-count" id="unread-{{ $patientUser->id }}" 
                                style="{{ $unreadCount > 0 ? '' : 'display: none;' }}">
                                {{ $unreadCount }}
                            </span>
                        </a>
                    @empty
                        <div class="text-center py-4">
                            <p class="text-muted">No registered patients yet</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Chat Area -->
            <div class="col-md-9">
                @if($user->id)
                    <div class="card border-0 shadow-sm h-100">
                        <!-- Chat Header -->
                        <div class="card-header bg-primary text-white py-3">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center me-3" 
                                    style="width: 45px; height: 45px;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h5 class="mb-0">{{ $user->name }}</h5>
                                    <small>{{ $user->email }}</small>
                                </div>
                            </div>
                        </div>

                        <!-- Messages Display Area -->
                        <div class="card-body p-3" id="messagesContainer" style="height: calc(75vh - 180px); overflow-y: auto; background-color: #f5f5f5;">
                            @forelse($messages as $message)
        <div class="d-flex {{ $message->sender_id == Auth::id() ? 'justify-content-end' : 'justify-content-start' }} mb-3">
            <div class="p-3 rounded w-auto" 
                style="max-width: 70%; 
                    background-color: {{ $message->sender_id == Auth::id() ? '#d9fdd3' : '#fff' }}; 
                    color: #000; 
                    box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                @if($message->message)
                    {!! nl2br(e($message->message)) !!}
                @endif
                
                @if($message->attachment)
                    @php
                        $extension = pathinfo($message->attachment, PATHINFO_EXTENSION);
                        $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                    @endphp
                    
                    @if($isImage)
                        <br>
                        <img src="{{ asset('storage/' . $message->attachment) }}" 
                            alt="Image" 
                            class="message-image mt-2" 
                            style="max-width: 100%; max-height: 300px; cursor: pointer; border-radius: 8px;"
                            onclick="showFullImage('{{ asset('storage/' . $message->attachment) }}')">
                    @else
                        <br>
                        <a href="{{ asset('storage/' . $message->attachment) }}" 
                        target="_blank" 
                        class="btn btn-sm btn-outline-primary mt-2">
                            <i class="fas fa-download me-1"></i>Download {{ strtoupper($extension) }} File
                        </a>
                    @endif
                @endif
                
                <div class="text-muted small mt-1 text-end">
                    {{ $message->created_at->format('H:i') }}
                    @if($message->sender_id == Auth::id())
                        <span data-message-id="{{ $message->id }}">
                            @if($message->is_read)
                                <i class="fas fa-check-double text-primary ms-1" title="Read"></i>
                            @else
                                <i class="fas fa-check ms-1" title="Sent"></i>
                            @endif
                        </span>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <div class="mb-3">
                <i class="fas fa-comments text-muted" style="font-size: 3rem;"></i>
            </div>
            <h5>Start a conversation with {{ $user->name }}</h5>
            <p class="text-muted">Send a message to begin chatting</p>
        </div>
    @endforelse
                        </div>

                        <!-- Message Form -->
                        <form id="messageForm" class="border-top p-3 d-flex align-items-center" enctype="multipart/form-data" style="background-color: #f7f7f7;">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                            <input type="file" id="fileInput" name="attachment" class="d-none" onchange="showFileName(this)">
                            <div class="position-relative me-2">
                                <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('fileInput').click()">
                                    <i class="fas fa-paperclip"></i>
                                </button>
                                <small id="selectedFileName" class="position-absolute start-100 mt-1 text-muted" style="width: max-content; display: none;"></small>
                            </div>
                            <input type="text" name="message" id="messageInput" class="form-control me-2" placeholder="Type a message...">
                            <button type="submit" class="btn btn-success" id="sendButton">
                                <i class="fas fa-paper-plane me-1"></i> 
                            </button>
                        </form>
                    </div>
                @else
                    <div class="d-flex flex-column align-items-center justify-content-center h-100 py-5">
                        <i class="fas fa-user-md text-primary mb-3" style="font-size: 4rem;"></i>
                        <h3 class="text-center">Hello, Dr. {{ Auth::user()->name }}</h3>
                        <p class="text-muted text-center">Select a patient from the sidebar to start a conversation</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Full Image Viewer -->
    <div id="imageOverlay" class="position-fixed top-0 start-0 w-100 h-100 d-none" style="background-color: rgba(0,0,0,0.9); z-index: 2000; cursor: pointer; display: flex; justify-content: center; align-items: center;">
        <div class="position-relative" style="max-width: 90%; max-height: 90%;">
            <button id="closeImageBtn" class="position-absolute btn btn-light rounded-circle p-1" style="top: -20px; right: -20px; width: 36px; height: 36px; font-size: 18px;">
                <i class="fas fa-times"></i>
            </button>
            <img id="fullImage" src="" class="img-fluid" style="max-height: 90vh; max-width: 100%;">
            <div id="downloadButtonContainer" class="position-absolute bottom-0 start-0 mb-3 ms-3">
            </div>
        </div>
    </div>

    <!-- Desktop Notification Modal -->
    <div class="modal fade" id="notificationPermissionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Enable Notifications</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Would you like to receive notifications when you get new messages from patients?</p>
                    <div class="d-flex justify-content-center mt-3">
                        <i class="fas fa-bell text-primary" style="font-size: 3rem;"></i>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Not Now</button>
                    <button type="button" class="btn btn-primary" id="enableNotificationsBtn">Enable Notifications</button>
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
        });

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
            const closeBtn = document.getElementById('closeImageBtn');
            
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
        }

        function showFullImage(imageSrc) {
            const overlay = document.getElementById('imageOverlay');
            const fullImage = document.getElementById('fullImage');
            const downloadButtonContainer = document.getElementById('downloadButtonContainer');

            fullImage.src = imageSrc;

            // Show the image
            overlay.classList.remove('d-none');
            overlay.classList.add('d-flex');
            
            // Add download link
            downloadButtonContainer.innerHTML = `
                <a href="${imageSrc}" download class="btn btn-light mt-2">
                    <i class="fas fa-download"></i> Download
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
            @if(isset($user) && $user->id)
            fetch("{{ route('message.check-read-status', ['user' => $user->id]) }}", {
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
            @endif
        }

        // Function to update read status indicators
        function updateReadStatus(messages) {
            messages.forEach(message => {
                const messageElements = document.querySelectorAll(`[data-message-id="${message.id}"]`);
                if (messageElements.length > 0) {
                    messageElements.forEach(element => {
                        if (message.is_read) {
                            element.innerHTML = '<i class="fas fa-check-double text-primary ms-1" title="Read"></i>';
                        } else {
                            element.innerHTML = '<i class="fas fa-check ms-1" title="Sent"></i>';
                        }
                    });
                }
            });
        }

        // Function to get unread message counts
        function getUnreadCounts() {
            fetch("{{ route('message.unread-count') }}", {
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

    if (!messageInput.value.trim() && fileInput.files.length === 0) {
        return; 
    }

    sendButton.disabled = true;
    sendButton.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>';

    let formData = new FormData(messageForm);
    
    if (fileInput.files.length > 0) {
        formData.delete('attachment');
        formData.append('attachment', fileInput.files[0]);
    }

    fetch("{{ route('message.send', ['user' => $user->id]) }}", {
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
            const messageContainer = document.getElementById('messagesContainer');

            const messageClass = message.sender_id == {{ Auth::id() }} ? 'justify-content-end' : 'justify-content-start';
            const messageBackground = message.sender_id == {{ Auth::id() }} ? '#d9fdd3' : '#fff';

            let attachmentHTML = '';
            if (message.attachment) {
                const extension = message.attachment.split('.').pop().toLowerCase();
                if (['jpg', 'jpeg', 'png', 'gif'].includes(extension)) {
                    const storagePath = '/storage/' + message.attachment;
                    attachmentHTML = `<br><img src="${storagePath}" alt="Image" class="message-image mt-2" style="max-width: 100%; max-height: 300px; cursor: pointer; border-radius: 8px;" onclick="showFullImage('${storagePath}')">`;
                } else {
                    attachmentHTML = `<br><a href="/storage/${message.attachment}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                        <i class="fas fa-download me-1"></i>Download ${extension.toUpperCase()} File</a>`;
                }
            }

            const readStatusIcon = '<span data-message-id="' + message.id + '"><i class="fas fa-check ms-1" title="Sent"></i></span>';

            let messageContent = message.message || '';
            messageContent = messageContent.replace(/\n/g, '<br>');
            
            let newMessage = `
                <div class="d-flex ${messageClass} mb-3">
                    <div class="p-3 rounded w-auto" style="max-width: 70%; background-color: ${messageBackground}; color: #000; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                        ${messageContent}
                        ${attachmentHTML}
                        <div class="text-muted small mt-1 text-end">
                            ${new Date().toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'})}
                            ${message.sender_id == {{ Auth::id() }} ? readStatusIcon : ''}
                        </div>
                    </div>
                </div>
            `;

            messageContainer.innerHTML += newMessage;
            scrollToBottom();
            
            messageInput.value = '';
            fileInput.value = '';
            document.getElementById('selectedFileName').style.display = 'none';
        } else {
            console.error('Error in response:', data);
            alert('Failed to send message. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while sending the message: ' + error.message);
    })
    .finally(() => {
        sendButton.disabled = false;
        sendButton.innerHTML = '<i class="fas fa-paper-plane me-1"></i>';
    });
}

        document.getElementById('messageForm').addEventListener('submit', function (e) {
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
            }
        });
    </script>

@endsection