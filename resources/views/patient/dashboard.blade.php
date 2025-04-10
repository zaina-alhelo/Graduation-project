@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Patient Dashboard</div>
    <div class="card-body">
        <h5 class="card-title">Welcome, {{ Auth::user()->name }}!</h5>
        <p class="card-text">This is the patient dashboard.</p>
        <div class="row">
            <!-- حجز الموعد -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Book an Appointment</h5>
                        <p class="card-text">Schedule a new appointment with a doctor</p>
                    </div>
                </div>
            </div>

            <!-- المواعيد السابقة -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Appointments</h5>
                        <p class="card-text">View past and upcoming appointments</p>
                    </div>
                </div>
            </div>

            <!-- السجل الطبي -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Medical Record</h5>
                        <p class="card-text">View your medical history</p>
                    </div>
                </div>
            </div>
        </div>
k
        <!-- رابط الدردشة -->
        <div class="mt-3">
            @if(isset($conversation_id) && $conversation_id)
            @else
            @endif
        </div>
    </div>
</div>
@endsection
