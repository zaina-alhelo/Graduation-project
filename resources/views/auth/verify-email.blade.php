@extends('auth.layout')

<!-- Toasts for messages -->
@if (session('status'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

<!-- Toasts for error messages -->
@if ($errors->any())
    <div class="toast-container position-fixed top-0 end-0 p-3">
        @foreach ($errors->all() as $error)
            <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="bi bi-x-circle-fill me-2"></i> {{ $error }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endforeach
    </div>
@endif

@if (session('error'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-x-circle-fill me-2"></i> {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
@section('content')
    <h2>Verify Your Email</h2>
    

    <!-- Hidden form for verification submission -->
    <form id="verificationForm" method="POST" action="{{ route('verification.verify') }}" style="display: none;">
        @csrf
        <input type="hidden" name="verification_code" id="verification_code">
    </form>

    <div id="verificationRequest">
        <p class="verify-description">
            We've sent a verification code to your email address. Please enter it below to verify your account.
        </p>
        
        <div class="verification-code">
            <input type="text" maxlength="1" class="code-input" autofocus>
            <input type="text" maxlength="1" class="code-input">
            <input type="text" maxlength="1" class="code-input">
            <input type="text" maxlength="1" class="code-input">
            <input type="text" maxlength="1" class="code-input">
            <input type="text" maxlength="1" class="code-input">
        </div>
        
        <button type="button" id="verifyButton" class="btn btn-primary">Verify Email</button>
        
        <div class="form-footer">
            <p>Didn't receive the code? <a href="#" id="resendCode">Resend Code</a></p>
            <p>Want to use a different email? <a href="{{ route('register') }}">Change Email</a></p>
        </div>
    </div>
    
    <div id="successMessage" class="success-message" style="display:none;">
        <h3>Email Verified Successfully!</h3>
        <p>Your email has been verified. You can now access all features of your account.</p>
        <button type="button" id="continueButton" class="btn btn-success" style="margin-top: 15px;">Continue to Login</button>
    </div>
@endsection

@section('scripts')
<script>
    function ensureToastContainer() {
        let container = document.querySelector('.toast-container');
        if (!container) {
            container = document.createElement('div');
            container.classList.add('toast-container', 'position-fixed', 'top-0', 'end-0', 'p-3');
            document.body.appendChild(container);
        }
        return container;
    }

    // Auto-focus next input when typing verification code
    document.querySelectorAll('.code-input').forEach((input, index) => {
        input.addEventListener('input', function() {
            if (this.value.length === 1) {
                const nextInput = document.querySelectorAll('.code-input')[index + 1];
                if (nextInput) {
                    nextInput.focus();
                }
            }
        });
        
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && !this.value) {
                const prevInput = document.querySelectorAll('.code-input')[index - 1];
                if (prevInput) {
                    prevInput.focus();
                }
            }
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && document.activeElement.classList.contains('code-input')) {
            document.getElementById('verifyButton').click();
        }
    });

    document.getElementById('verifyButton').addEventListener('click', function() {
        const inputs = document.querySelectorAll('.code-input');
        let code = '';
        let isValid = true;
        
        inputs.forEach(input => {
            code += input.value;
            if (!input.value) {
                isValid = false;
                input.style.borderColor = '#e74c3c';
            } else {
                input.style.borderColor = '#ddd';
            }
        });
        
        if (isValid) {
            document.getElementById('verification_code').value = code;
            
            document.getElementById('verificationForm').submit();
        } else {
            showToast('Please enter the complete verification code', 'error');
        }
    });

    document.getElementById('resendCode').addEventListener('click', function(e) {
        e.preventDefault();
        
        const resendLink = this;
        const originalText = resendLink.textContent;
        resendLink.textContent = 'Sending...';
        resendLink.style.pointerEvents = 'none';
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        
        fetch("{{ route('verification.resend') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
                "Accept": "application/json"
            },
            credentials: 'same-origin',
            body: JSON.stringify({})  
        })
        .then(response => {
            if (response.ok) {
                return response.json().catch(() => ({}));
            }
            throw new Error('Network response was not ok');
        })
        .then(data => {
            showToast(data.message || 'Verification code has been sent', 'success');
            
            document.querySelectorAll('.code-input').forEach(input => {
                input.value = '';
            });
            document.querySelectorAll('.code-input')[0].focus();
        })
        .catch(error => {
            console.error('Error during fetch:', error);
            showToast('There was an error sending the code. Please try again.', 'error');
        })
        .finally(() => {
            setTimeout(() => {
                resendLink.textContent = originalText;
                resendLink.style.pointerEvents = 'auto';
            }, 1000);
        });
    });

    document.getElementById('continueButton').addEventListener('click', function() {
        window.location.href = "{{ route('login') }}";
    });

  function showToast(message, type = 'success') {
        const toastContainer = ensureToastContainer();
        
        const toast = document.createElement('div');
        toast.classList.add('toast', 'align-items-center', 'text-white', 
            type === 'success' ? 'bg-success' : 'bg-danger', 'border-0');
        toast.setAttribute('role', 'alert');
        toast.setAttribute('aria-live', 'assertive');
        toast.setAttribute('aria-atomic', 'true');
        
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-${type === 'success' ? 'check-circle-fill' : 'x-circle-fill'} me-2"></i> ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        `;
        
        toastContainer.appendChild(toast);
        
        const bsToast = new bootstrap.Toast(toast, {
            animation: true,
            autohide: true,
            delay: 5000
        });
        
        bsToast.show();
        
        toast.addEventListener('hidden.bs.toast', function() {
            this.remove();
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        @if(session('status'))
            showToast('{{ session('status') }}', 'success');
        @endif

        @if(session('error'))
            showToast('{{ session('error') }}', 'error');
        @endif
        
        @if($errors->any())
            @foreach($errors->all() as $error)
                showToast('{{ $error }}', 'error');
            @endforeach
        @endif
    });
</script>
@endsection