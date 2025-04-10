@extends('auth.layout')

@section('title', 'Login')

@section('content')

        <img src="eye-2-32.png" alt="" class="logo">
        <h2 class="text-primary">Login to OptiEye</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email address</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" value="{{ old('email') }}" autocomplete="email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" autocomplete="current-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3 form-check text-start">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Sign In</button>
            
            <div class="mt-3 text-center">
                <p class="text-muted mb-2">Or login with</p>
                <a href="{{ route('login.google') }}" class="btn-google">
                    <img src="https://w7.pngwing.com/pngs/937/156/png-transparent-google-logo-google-search-google-account-redes-search-engine-optimization-text-service-thumbnail.png" alt="Google Logo">
                    Login with Google
                </a>
            </div>

            <div class="mt-3 text-center">
                <p><a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a></p>
                <p>Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Sign up</a></p>
            </div>
        </form>
@endsection
