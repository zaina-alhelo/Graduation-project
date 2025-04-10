<!-- resources/views/doctor/create-patient.blade.php -->
@extends('doctor.master')

@section('title-page')
Add New Patient
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New Patient</h5>

                    <!-- Patient Add Form -->
                    <form action="{{ route('patients.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Patient Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Patient</button>
                    </form>
                    <!-- End Patient Add Form -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
