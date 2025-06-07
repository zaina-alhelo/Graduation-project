$(document).ready(function() {
    $('#test-doctor').on('change', function() {
        $('#test-output').html('Selected: ' + $(this).val() + ' - ' + $(this).find("option:selected").text());
    });
});

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
            // Remove expanded class when no doctor is selected
            $('#appointment-calendar').removeClass('expanded');
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
        
        // Add expanded class to make the calendar larger
        $('#appointment-calendar').addClass('expanded');
        
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
