@extends('doctor.master')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .time-slot {
            display: inline-block;
            margin: 5px;
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .time-slot:hover {
            background-color: #f0f7ff;
            border-color: #a3c8ff;
        }
        .time-slot.selected {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }
        .time-slot.disabled {
            background-color: #f5f5f5;
            color: #aaa;
            cursor: not-allowed;
            text-decoration: line-through;
        }
        #timeSlotsContainer {
            margin-top: 15px;
        }
        .date-info {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        .loader {
            display: none;
            margin: 10px 0;
            border: 3px solid #f3f3f3;
            border-radius: 50%;
            border-top: 3px solid #3498db;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .no-times-message {
            padding: 10px;
            color: #dc3545;
            font-style: italic;
        }
    </style>
@endsection

@section('title-page', 'Create Appointment')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create New Appointment</h5>
            <form action="{{ route('appointments.store') }}" method="POST" id="appointmentForm">
                @csrf

                <div class="mb-3">
                    <label for="patient_id" class="form-label">Patient</label>
                   <select name="patient_id" id="patient_id" class="form-select">
    <option value="" disabled selected>Select Patient</option>
    @foreach($patients as $patient)
        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
            {{ $patient->name }}
        </option>
    @endforeach
</select>
@error('patient_id')
    <div class="text-danger mt-1">{{ $message }}</div>
@enderror

                    <a href="{{ route('patients.create') }}" class="btn btn-outline-primary btn-sm mt-2">
                        <i class="fas fa-user-plus"></i> Add New Patient
                    </a>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Appointment Date</label>
<input type="text" name="date" id="date" class="form-control" placeholder="Select date" value="{{ old('date') }}">
@error('date')
    <div class="text-danger mt-1">{{ $message }}</div>
@enderror
                    <div class="loader" id="dateLoader"></div>
                </div>
                
                <div id="dateInfo" class="date-info" style="display:none">
                    <span id="selectedDateDisplay"></span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Available Time Slots</label>
            <input type="hidden" name="time" id="selectedTime" value="{{ old('time') }}">
@error('time')
    <div class="text-danger mt-1">{{ $message }}</div>
@enderror


                    <div id="timeSlotsContainer" class="mb-3"></div>
                </div>

                <div class="mb-3">
                    <label for="notes" class="form-label">Notes (optional)</label>
                    <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Add any special notes or instructions"></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Appointments
                    </a>
                    <button type="submit" id="submitBtn" class="btn btn-success" disabled>
                        <i class="fas fa-calendar-check"></i> Book Appointment
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const doctorId = {{ auth()->id() }};
        const timeSlotsContainer = document.getElementById('timeSlotsContainer');
        const dateLoader = document.getElementById('dateLoader');
        const selectedDateDisplay = document.getElementById('selectedDateDisplay');
        const dateInfo = document.getElementById('dateInfo');
        const selectedTimeInput = document.getElementById('selectedTime');
        const submitBtn = document.getElementById('submitBtn');
        
        let selectedTimeSlot = null;
        const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        const datePicker = flatpickr("#date", {
            altInput: true,
            altFormat: "l, F j, Y",
            dateFormat: "Y-m-d",
            minDate: "today",
            disable: [],
            locale: { firstDayOfWeek: 0 },
            onChange: function(selectedDates, dateStr, instance) {
                if (!dateStr) return;
                
                selectedTimeInput.value = '';
                selectedTimeSlot = null;
                submitBtn.disabled = true;
                
                dateLoader.style.display = 'inline-block';
                timeSlotsContainer.innerHTML = '<div class="text-center">Loading available times...</div>';
                
                const selectedDate = new Date(dateStr);
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                selectedDateDisplay.textContent = selectedDate.toLocaleDateString('en-US', options);
                dateInfo.style.display = 'block';
                
                const dayOfWeek = selectedDate.getDay();
                const dayName = dayNames[dayOfWeek];

                fetch(`/doctor/appointments/available-times/${doctorId}/${dayName}?date=${dateStr}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`Network response was not ok: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        dateLoader.style.display = 'none';
                        timeSlotsContainer.innerHTML = '';
                        
                        if (data.times && data.times.length > 0) {
                            data.times.forEach(time => {
                                const timeSlot = document.createElement('div');
                                timeSlot.className = 'time-slot';
                                timeSlot.textContent = formatTime(time);
                                timeSlot.dataset.time = time;
                                
                                timeSlot.addEventListener('click', function() {
                                    if (selectedTimeSlot) {
                                        selectedTimeSlot.classList.remove('selected');
                                    }
                                    
                                    this.classList.add('selected');
                                    selectedTimeSlot = this;
                                    selectedTimeInput.value = this.dataset.time;
                                    submitBtn.disabled = false;
                                });
                                
                                timeSlotsContainer.appendChild(timeSlot);
                            });
                        } else {
                            timeSlotsContainer.innerHTML = `
                                <div class="no-times-message">
                                    <i class="fas fa-exclamation-circle"></i> 
                                    No available time slots for this date. Please select another date.
                                </div>`;
                        }
                    })
                    .catch(error => {
                        dateLoader.style.display = 'none';
                        timeSlotsContainer.innerHTML = `
                            <div class="alert alert-danger">
                                Error loading available times: ${error.message}. Please try again.
                            </div>`;
                        console.error('Error fetching available times:', error);
                    });
            }
        });

        fetch(`/doctor/appointments/fully-booked-dates/${doctorId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Network response was not ok: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Fully booked dates:', data);
                if (data.fullyBookedDates && data.fullyBookedDates.length > 0) {
                    datePicker.set('disable', [...datePicker.config.disable, ...data.fullyBookedDates]);
                }
            })
            .catch(error => {
                console.error('Error fetching fully booked dates:', error);
            });

        document.getElementById('appointmentForm').addEventListener('submit', function(e) {
            if (!selectedTimeInput.value) {
                e.preventDefault();
                alert('Please select an appointment time');
            }
        });

        function formatTime(time24) {
            const [hours, minutes] = time24.split(':');
            let period = 'AM';
            let hour = parseInt(hours, 10);
            
            if (hour >= 12) {
                period = 'PM';
                if (hour > 12) {
                    hour -= 12;
                }
            }
            if (hour === 0) {
                hour = 12;
            }
            
            return `${hour}:${minutes} ${period}`;
        }
    });
</script>
@endsection