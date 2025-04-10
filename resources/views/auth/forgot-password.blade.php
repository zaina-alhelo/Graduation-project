@extends('auth.layout')

@section('title', 'Reset Password')

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
@section('content')

    <h2>Reset Password</h2>
    <p class="text-center mb-4">
        Enter your email address and we'll send you instructions to reset your password.
    </p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" autocomplete="email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Reset Password</button>

        <div class="text-center mt-3">
            <p>Remember your password? <a href="{{ route('login') }}">Back to Login</a></p>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var successMessage = '{{ session('status') }}';
            if (successMessage) {
                var toast = new bootstrap.Toast(document.getElementById('successToast'));
                toast.show();
            }
        });
    </script>
@endsection
