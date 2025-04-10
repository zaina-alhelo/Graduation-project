@extends('auth.layout')

@section('title', 'Reset Password')

@section('content')
    <h2 class="text-center text-primary mb-4">Reset Password</h2>
    <p class="text-center text-muted mb-4">
        Enter your email address and we'll send you instructions to reset your password.
    </p>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" autofocus
                   class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" id="password" name="password"
                   class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100">Reset Password</button>

        <div class="mt-3 text-center">
            <p>Remember your password? <a href="{{ route('login') }}" class="text-decoration-none">Back to Login</a></p>
        </div>
    </form>
@endsection
