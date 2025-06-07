@extends('auth.layout')

@section('content')
    <p class="welcome-text">Create a new account</p>
    <h2>Sign Up for OptiEye</h2>

    <!-- Google Sign Up Button -->
    <div class="google-signup mb-3">
        <a href="{{ route('login.google') }}" class="google-btn">
            <img src="https://w7.pngwing.com/pngs/937/156/png-transparent-google-logo-google-search-google-account-redes-search-engine-optimization-text-service-thumbnail.png" alt="Google Icon" style="width: 20px; margin-right: 10px;">
            Sign up with Google
        </a>
    </div>

    <form id="signupForm" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row">
            <div class="col">
                <div class="input-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="first_name" placeholder="Your first name" value="{{ old('first_name') }}">
                    @error('first_name')
                        <div class="error-message d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="last_name" placeholder="Your last name" value="{{ old('last_name') }}">
                    @error('last_name')
                        <div class="error-message d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="input-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Your email address" value="{{ old('email') }}" autocomplete="email">
            @error('email')
                <div class="error-message d-block">{{ $message }}</div>
            @enderror
        </div>
    <div class="input-group">
    <label for="phone">Phone Number</label>
    <input type="text" id="phone" name="phone" placeholder="Your phone number" value="{{ old('phone') }}">
    @error('phone')
        <div class="error-message d-block">{{ $message }}</div>
    @enderror
</div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password">
            @error('password')
                <div class="error-message d-block">{{ $message }}</div>
            @enderror
        </div>
    


        <div class="password-strength">
            <div class="strength-meter" id="strengthMeter"></div>
        </div>
        <div class="meter-text" id="strengthText">Password strength</div>

        <div class="input-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm your password">
            <div id="confirmPasswordError" class="error-message d-block text-danger"></div>
        </div>

        <button type="submit">Create Account</button>

        <div class="form-footer">
            <p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
        </div>
          <div class="mt-4 text-center">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to OptiEye
                </a>
            </div>
    </form>
@endsection

@section('scripts')
<script>
    document.getElementById("signupForm").addEventListener("submit", function(event) {
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirmPassword").value;
        const errorDiv = document.getElementById("confirmPasswordError");

        errorDiv.textContent = "";

        if(password !== confirmPassword){
            event.preventDefault();
            errorDiv.textContent = "Passwords don't match";
        }
    });

    document.getElementById("password").addEventListener("input", function() {
        const password = this.value;
        const meter = document.getElementById("strengthMeter");
        const meterText = document.getElementById("strengthText");

        meter.style.width = "0%";
        meter.style.backgroundColor = "#eee";
        meterText.textContent = "Password strength";

        if (password.length === 0) return;

        let strength = 0;
        if (password.length >= 8) strength += 25;
        if (/[A-Z]/.test(password)) strength += 25;
        if (/[0-9]/.test(password)) strength += 25;
        if (/[^A-Za-z0-9]/.test(password)) strength += 25;

        meter.style.width = strength + "%";

        if (strength < 25) {
            meter.style.backgroundColor = "#e74c3c";
            meterText.textContent = "Very Weak";
        } else if (strength < 50) {
            meter.style.backgroundColor = "#e67e22";
            meterText.textContent = "Weak";
        } else if (strength < 75) {
            meter.style.backgroundColor = "#f1c40f";
            meterText.textContent = "Moderate";
        } else {
            meter.style.backgroundColor = "#2ecc71";
            meterText.textContent = "Strong";
        }
    });
</script>
@endsection
