<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eye Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            direction: rtl;
            text-align: right;
        }
        .hero {
            height: 70vh;
            background: linear-gradient(45deg, #4a8bfc, #2b6bfc);
            color: white;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Eye Clinic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Advanced Eye Clinic</h1>
                    <p class="lead">We offer excellent medical services using the latest AI technologies to detect eye diseases.</p>
                    <div class="mt-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-light btn-lg">Dashboard</a>
                            @else
                                <a href="{{ route('register') }}" class="btn btn-light btn-lg me-2">Register</a>
                                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">Login</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title">Smart Diagnosis</h3>
                            <p class="card-text">We use AI to help diagnose eye diseases with high accuracy.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title">Specialized Doctors</h3>
                            <p class="card-text">A team of highly experienced doctors in the field of ophthalmology and eye surgery.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title">Continuous Follow-up</h3>
                            <p class="card-text">We provide continuous follow-up for your health condition and treatment results.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Advanced Eye Clinic</h5>
                    <p>We offer excellent medical services using the latest technologies.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Contact Us</h5>
                    <p>Email: info@eyeclinic.com</p>
                    <p>Phone: 123-456-7890</p>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>&copy; {{ date('Y') }} Advanced Eye Clinic. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
