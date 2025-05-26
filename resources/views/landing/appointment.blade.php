@extends('landing.master')
@section('styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Add Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
    .take-appointment-3__form-input textarea {
        width: 100%;
        padding: 12px 20px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 15px;
    }
    
    .take-appointment-3__form-input textarea:focus {
        border-color: var(--rr-theme-primary);
        outline: none;
    }
    
    .time-slot-btn.active {
        background-color: var(--rr-theme-primary);
        color: white;
        border-color: var(--rr-theme-primary);
    }
    
    .ui-datepicker {
        width: 100%;
        padding: 0;
        border: none;
        box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    }
    
    .ui-datepicker-header {
        background-color: var(--rr-theme-primary, #185ec8);
        color: white;
        border: none;
        border-radius: 8px 8px 0 0;
    }
    
    .ui-datepicker th {
        background-color: #f8f9fa;
        padding: 10px 0;
    }
    
    .ui-datepicker-title {
        font-weight: bold;
    }
    
    .ui-datepicker td {
        padding: 5px 0;
    }
    
    .ui-datepicker td a {
        text-align: center;
        border-radius: 4px;
    }
    
    .ui-datepicker .ui-state-active {
        background-color: var(--rr-theme-primary, #185ec8);
        color: white;
        border: 1px solid var(--rr-theme-primary, #185ec8);
    }
    
    .ui-datepicker .ui-state-hover {
        background-color: #e9ecef;
    }
    
    .ui-datepicker-prev, .ui-datepicker-next {
        top: 7px !important;
    }
    
    .ui-datepicker-prev-hover, .ui-datepicker-next-hover {
        top: 7px !important;
    }
    
    .ui-datepicker .ui-icon {
        filter: brightness(0) invert(1);
    }
    
    /* Additional improvements to ensure calendar displays correctly */
    #appointment-calendar {
        background-color: white;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    }
    
    /* Time buttons styling */
    .time-slot-btn {
        margin-bottom: 8px;
        transition: all 0.3s ease;
    }
    
    /* Improved selected section appearance */
    .selected-datetime {
        background-color: #f8f9fa;
        border-left: 4px solid var(--rr-theme-primary, #185ec8);
    }
    
    /* Custom Toast styles to match your theme */
    .toast-success {
        background-color: #28a745 !important;
    }
    
    .toast-error {
        background-color: #dc3545 !important;
    }
    
    .toast-info {
        background-color: var(--rr-theme-primary, #185ec8) !important;
    }
    
    .toast-warning {
        background-color: #ffc107 !important;
        color: #212529 !important;
    }
    
    /* Improved "How it works" cards interface */
    .how-it-works-card {
        transition: transform 0.3s ease;
    }
    
    .how-it-works-card:hover {
        transform: translateY(-5px);
    }
    
    .circle-icon {
        width: 60px;
        height: 60px;
        background-color: var(--rr-theme-primary, #185ec8);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }
    
    /* Improved form buttons appearance */
    .rr-btn {
        border-radius: 8px;
        padding: 12px 24px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    /* Custom styled select */
.custom-select {
    width: 100%;
    padding: 12px 20px;
    padding-right: 45px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    background-color: #fff;
    font-size: 15px;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    position: relative;
}

.input-wrapper {
    position: relative;
}

.input-wrapper select {
    cursor: pointer;
}

.input-wrapper i {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #888;
    pointer-events: none;
    font-size: 18px;
}

/* On focus */
.custom-select:focus {
    border-color: var(--rr-theme-primary);
    outline: none;
}

/* Responsive spacing */
@media (max-width: 768px) {
    .custom-select {
        font-size: 14px;
        padding: 10px 16px;
    }

    .input-wrapper i {
        font-size: 16px;
    }
}

    
</style>
@endsection
@section('content')

    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('landing/images/about1.png') }}"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Book an Appointment</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('home')}}">Home</a></span></li>
                                    <li class="active"><span>Book Appointment</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area end  -->

    <!-- take-appointment-3 area start -->
    <section class="take-appointment-3 section-space__top section-space__bottom-70 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title-wrapper take-appointment-3__content text-center mb-60 mb-sm-50 mb-xs-40">
                        <h5 class="section__subtitle color-theme-primary mb-15 mb-xs-10 title-animation">
                            <img src="{{ asset('landing/assets/imgs/ask-quesiton/heart.png') }}" alt="icon not found" class="img-fluid"> Eye Examination Scheduling
                        </h5>
                        <h2 class="section__title mb-20 mb-xs-15 title-animation">Book Your Appointment Now</h2>
                        <p class="mb-0">Schedule a consultation with our eye care specialists. Early detection and regular monitoring are key to maintaining optimal eye health.</p>
                    </div>

                    <!-- Hidden divs for toast message data -->
                    @if(session('success'))
                    <div id="success-message" data-message="{{ session('success') }}" class="d-none"></div>
                    @endif

                    @if(session('error'))
                    <div id="error-message" data-message="{{ session('error') }}" class="d-none"></div>
                    @endif

                    <div class="row">
                        
                                    
                        <!-- Calendar Column -->
                        <div class="col-lg-5 mb-4 mb-lg-0">
                            
                            <div class="card shadow">
                                <div class="card-header py-3" style="background-color: #185ec8;">
                                    <h5 class="mb-0 text-white"><i class="fa-solid fa-calendar-days me-2"></i>Select Date & Time</h5>
                                </div>
                                <div class="card-body">
                                   

                                    <!-- Add clear display space for calendar -->
                                    <div id="appointment-calendar" class="mb-4 calendar-container"></div>
                                    
                                    <div class="time-slots mt-4">
                                        <h5 class="mb-3">Available Times</h5>
                                        <div class="time-slot-list" id="timeSlotContainer">
                                            <p class="text-muted">Please select a date to view available times</p>
                                        </div>
                                    </div>
                                    
                                    <div class="selected-datetime mt-4 p-3 rounded d-none" id="selectedDateTime">
                                        <h6 class="mb-2">Your Selected Appointment:</h6>
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-calendar-check text-primary me-2"></i>
                                            <span id="selectedDate">Not selected</span>
                                        </div>
                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-solid fa-clock text-primary me-2"></i>
                                            <span id="selectedTime">Not selected</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="calendar-loading-indicator" class="text-center d-none mt-2">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        <!-- Form Column -->
                        <div class="col-lg-7">
                            <div class="take-appointment-3__form card shadow">
                                <div class="card-header py-3" style="background-color: #185ec8;">
                                    <h5 class="mb-0 text-white"><i class="fa-solid fa-user-plus me-2"></i>Your Information</h5>
                                </div>
                                <div class="card-body">
                                    <form id="appointmentForm" method="POST" action="{{ route('appointments.store') }}">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="take-appointment-3__form-input">
                                                    <label for="name">Full Name<span class="text-danger">*</span></label>
                                                    <div class="input-wrapper">
                                                        <input name="name" id="name" type="text" placeholder="Enter your full name"  value="{{ old('name') }}">
                                                        <i class="fa-solid fa-user"></i>
                                                    </div>
                                                    @error('name')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="take-appointment-3__form-input">
                                                    <label for="phone">Phone Number<span class="text-danger">*</span></label>
                                                    <div class="input-wrapper">
                                                        <input name="phone" id="phone" type="text" placeholder="Enter your phone number"  value="{{ old('phone') }}">
                                                        <i class="fa-solid fa-phone"></i>
                                                    </div>
                                                    @error('phone')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="take-appointment-3__form-input">
                                                    <label for="email">Email<span class="text-danger">*</span></label>
                                                    <div class="input-wrapper">
                                                        <input name="email" id="email" type="email" placeholder="Enter your email"  value="{{ old('email') }}">
                                                        <i class="fa-solid fa-envelope"></i>
                                                    </div>
                                                    @error('email')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
    
 <div class="col-lg-12 mb-4">
    <div class="take-appointment-3__form-input">
        <label for="doctor_id">Choose Your Doctor <span class="text-danger">*</span></label>
        <div class="input-wrapper">
            <select id="doctor_id" name="doctor_id" class="custom-select">
                <option value="">-- Select a doctor --</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                        Dr. {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
            <i class="fa-solid fa-user-doctor"></i>
        </div>
        @error('doctor_id')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

                                            <input type="hidden" name="appointment_date" id="appointment_date" value="{{ old('appointment_date') }}">
                                            <input type="hidden" name="appointment_time" id="appointment_time" value="{{ old('appointment_time') }}">
                                            <div class="col-12">
                                                <button type="submit" class="rr-btn rr-btn__primary-color mt-0" id="submitBtn">
                                                    <span class="btn-wrap">
                                                        <span class="text-one">Confirm Appointment</span>
                                                     <span class="text-two">Confirm Appointment</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
             
            </div>
        </div>
    </section>
    <!-- take-appointment-3 area end -->
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<!-- Add Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
$(document).ready(function() {
 
        $('#test-doctor').on('change', function() {
            $('#test-output').html('Selected: ' + $(this).val() + ' - ' + $(this).find("option:selected").text());
        });
    });
</script>

<script>
$(document).ready(function() {
    // Configure Toastr options
    toastr.options = {
        closeButton: true,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };
    
    // Display toast messages if they exist
    if ($("#success-message").length) {
        toastr.success($("#success-message").data('message'), 'Success');
    }
    
    if ($("#error-message").length) {
        toastr.error($("#error-message").data('message'), 'Error');
    }
    
    // Initialize variables
    let selectedDate = null;    
    let selectedTime = null;
    let selectedDoctor = $('#doctor_id').val();
    let isCalendarInitialized = false;
    
    // Check if we have old input values (after form validation failed)
    const oldDate = $('#appointment_date').val();
    const oldTime = $('#appointment_time').val();
    
    // Initialize with old values if they exist (for maintaining state after validation error)
    if (oldDate && oldDate !== '') {
        selectedDate = oldDate;
        $('#selectedDate').text(formatDisplayDate(oldDate));
        $('#selectedDateTime').removeClass('d-none');
    }
    
    if (oldTime && oldTime !== '') {
        selectedTime = oldTime;
        $('#selectedTime').text(formatTime(oldTime));
    }
    
    // Initial setup - debug helpers
    console.log("Initial doctor value on page load:", selectedDoctor);
    if (!selectedDoctor || selectedDoctor === '') {
        console.log("No doctor selected initially, hiding calendar");
        $('#appointment-calendar').hide();
        $('#timeSlotContainer').html('<p class="text-muted">Please select a doctor first</p>');
    } else {
        console.log("Doctor already selected on page load:", selectedDoctor);
        // Add a small delay to ensure DOM is ready
        setTimeout(function() {
            reinitializeCalendar();
            
            // If we have a selected date from previous submission, fetch time slots again
            if (selectedDate) {
                const date = new Date(selectedDate);
                const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                const dayName = dayNames[date.getDay()];
                
                // Fetch time slots for the previously selected date
                fetchDoctorAvailableTimes(selectedDoctor, dayName, selectedDate);
            }
        }, 100);
    }
    
    // Doctor selection change handler
    $('#doctor_id').on('change', function() {
        selectedDoctor = $(this).val();
        console.log("Doctor changed to:", selectedDoctor);
        
        if (!selectedDoctor || selectedDoctor === '') {
            $('#appointment-calendar').hide();
            $('#timeSlotContainer').html('<p class="text-muted">Please select a doctor first</p>');
            $('#selectedDateTime').addClass('d-none');
            return;
        }
        
        // Show toast notification for doctor selection
        const doctorName = $(this).find("option:selected").text();
        
        // Reset date and time selections
        selectedDate = null;
        selectedTime = null;
        $('#selectedDate').text('Not selected');
        $('#selectedTime').text('Not selected');
        $('#appointment_date').val('');
        $('#appointment_time').val('');
        $('#selectedDateTime').addClass('d-none');
        
        // Reset time slots
        $('#timeSlotContainer').html('<p class="text-muted">Please select a date to view available times</p>');
        
        // Make this explicit - show calendar container
        $('#appointment-calendar').show();
        
        // Force a clean re-initialization of the calendar
        setTimeout(function() {
            reinitializeCalendar();
        }, 100);
    });
    
    function reinitializeCalendar() {
        // Get current doctor selection (re-check to be safe)
        selectedDoctor = $('#doctor_id').val();
        console.log("Reinitializing calendar for doctor:", selectedDoctor);
        
        if (!selectedDoctor || selectedDoctor === '') {
            console.log("No doctor selected, hiding calendar");
            $('#appointment-calendar').hide();
            $('#timeSlotContainer').html('<p class="text-muted">Please select a doctor first</p>');
            return;
        }
        
        // Show calendar and loading indicator
        $('#appointment-calendar').show();
        $('#calendar-loading-indicator').removeClass('d-none');
        
        // More explicit handling of datepicker destruction
        try {
            if ($("#appointment-calendar").hasClass("hasDatepicker")) {
                console.log("Destroying existing datepicker");
                $("#appointment-calendar").datepicker("destroy");
            }
        } catch (e) {
            console.error("Error destroying datepicker:", e);
        }
        
        console.log("Initializing new datepicker");
        // Initialize datepicker
        $("#appointment-calendar").datepicker({
            minDate: 0,
            firstDay: 0,
            dateFormat: "yy-mm-dd",
            showOtherMonths: true,
            selectOtherMonths: true,
            beforeShowDay: function(date) {
                // Default all dates to available until we get the data
                return [true, ""];
            },
            onSelect: function(dateText, inst) {
                console.log("Date selected:", dateText);
                handleDateSelection(dateText);
            }
        });
        
        // If we already have a selected date, highlight it
        if (selectedDate) {
            try {
                $("#appointment-calendar").datepicker("setDate", selectedDate);
            } catch (e) {
                console.error("Error setting date:", e);
            }
        }
        
        console.log("Datepicker initialized, now fetching unavailable dates");
        // Now fetch unavailable dates and update the calendar
        fetchUnavailableDates();
    }
    
    function handleDateSelection(dateText) {
        selectedDate = dateText;
        $('#appointment_date').val(dateText);
        
        // Get day name
        const date = new Date(dateText);
        const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const dayName = dayNames[date.getDay()];
        
        // Display selected date in a user-friendly format
        const formattedDate = formatDisplayDate(dateText);
        $('#selectedDate').text(formattedDate);
        $('#selectedDateTime').removeClass('d-none');
        
        console.log("Selected date:", formattedDate, "Day name:", dayName);
        
        
        // Reset time selection
        selectedTime = null;
        $('#selectedTime').text('Not selected');
        $('#appointment_time').val('');
        
        // Show loader while fetching times
        $('#timeSlotContainer').html('<div class="text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2">Loading available times...</p></div>');
        
        // Fetch available times for selected doctor
        fetchDoctorAvailableTimes(selectedDoctor, dayName, dateText);
    }
    
    // Form validation
    $('#appointmentForm').on('submit', function(e) {
        if (!selectedDoctor) {
            e.preventDefault();
            toastr.warning('Please select a doctor for your appointment.', 'Missing Information');
            return false;
        }
        
        if (!selectedDate || !selectedTime) {
            e.preventDefault();
            toastr.warning('Please select both a date and time for your appointment.', 'Missing Information');
            return false;
        }
        
        // Show loading toast when submitting
        toastr.info('Processing your appointment request...', 'Submitting');
        return true;
    });
    
    // Function to fetch and display available times for specific doctor
    function fetchDoctorAvailableTimes(doctorId, dayName, dateText) {
        console.log("Fetching available times for doctor:", doctorId, "on day:", dayName, "date:", dateText);
        
        $.ajax({
            url: `/appointments/available-times/${doctorId}/${dayName}`,
            method: 'GET',
            data: {
                date: dateText
            },
            success: function(response) {
                console.log("Available times received:", response);
                displayTimeSlots(response.times || []);
            },
            error: function(error) {
                console.error('Error fetching available times:', error);
                $('#timeSlotContainer').html('<div class="alert alert-danger">Error loading available times. Please try again.</div>');
                toastr.error('Unable to load available times. Please try again.', 'Error');
            }
        });
    }
    
    // Function to display time slots
    function displayTimeSlots(times) {
        const container = $('#timeSlotContainer');
        container.empty();
        
        if (!times || times.length === 0) {
            container.html('<div class="alert alert-warning">No available time slots for this date. Please select another date.</div>');
            toastr.warning('No available time slots for this date. Please select another date.', 'No Availability');
            return;
        }
        
        // Create time slot buttons
        times.forEach(time => {
            const formattedTime = formatTime(time);
            const isSelected = time === selectedTime;
            
            const button = $('<button>')
                .addClass('btn btn-outline-primary time-slot-btn me-2 mb-2' + (isSelected ? ' active' : ''))
                .attr('type', 'button')
                .attr('data-time', time)
                .text(formattedTime);
                
            container.append(button);
        });
    
        // Better click handler for time slots
        container.off('click', '.time-slot-btn').on('click', '.time-slot-btn', function() {
            $('.time-slot-btn').removeClass('active');
            $(this).addClass('active');
            
            selectedTime = $(this).data('time');
            $('#appointment_time').val(selectedTime);
            const formattedTime = formatTime(selectedTime);
            $('#selectedTime').text(formattedTime);
            
            
        });
    }
    
    // Function to fetch unavailable/disabled dates
    function fetchUnavailableDates() {
        console.log("Fetching unavailable dates for doctor ID:", selectedDoctor);
        
        $.ajax({
            url: '/appointments/fully-booked-dates',
            method: 'GET',
            data: {
                doctor_id: selectedDoctor
            },
            success: function(response) {
                console.log("Received fully booked dates:", response.fullyBookedDates);
                
                // Convert to Date objects for easier comparison
                const unavailableDates = response.fullyBookedDates.map(date => date);
                
                // Hide loading indicator
                $('#calendar-loading-indicator').addClass('d-none');
                
                // Update datepicker with unavailable dates
                $("#appointment-calendar").datepicker("option", "beforeShowDay", function(date) {
                    const dateString = $.datepicker.formatDate('yy-mm-dd', date);
                    // If date is in the fully booked array, make it unavailable
                    if (unavailableDates.includes(dateString)) {
                        return [false, "unavailable-date", "Not available"];
                    }
                    return [true, "available-date", "Available"];
                });
                
                // Refresh the datepicker to show the changes
                $("#appointment-calendar").datepicker("refresh");
                
                isCalendarInitialized = true;
                console.log("Calendar initialization complete");
            },
            error: function(error) {
                console.error('Error fetching unavailable dates:', error);
                $('#calendar-loading-indicator').addClass('d-none');
                
                // Reset datepicker to default state in case of error
                $("#appointment-calendar").datepicker("option", "beforeShowDay", function(date) {
                    return [true, "", ""];
                });
                $("#appointment-calendar").datepicker("refresh");
                
                // Show error toast
                toastr.error('Unable to load calendar availability. Please refresh the page.', 'Calendar Error');
            }
        });
    }
    
    // Format date for display
    function formatDisplayDate(dateString) {
        const date = new Date(dateString);
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        return date.toLocaleDateString('en-US', options);
    }
    
    // Function to format time from 24h to 12h format
    function formatTime(time24) {
        if (!time24) return 'Not selected';
        
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