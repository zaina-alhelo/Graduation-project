<!-- resources/views/doctor/appointments/create.blade.php -->
@extends('doctor.master')

@section('title-page', 'Create Appointment')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create New Appointment</h5>
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
              <div class="mb-3">
                <label for="patient_id" class="form-label">Patient</label>
                <select name="patient_id" id="patient_id" class="form-select" required>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>

                <br><br>\
                <a href="{{ route('patients.create') }}" class="btn btn-secondary btn-sm">Add New Patient</a>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" name="time" id="time" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Notes (optional)</label>
                <textarea name="notes" id="notes" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Create Appointment</button>
        </form>
    </div>
</div>
@endsection
