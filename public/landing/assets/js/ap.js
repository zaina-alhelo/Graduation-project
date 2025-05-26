   $(document).ready(function() {
        // Initialize jQuery UI datepicker with enhanced features
        $("#appointment-calendar").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0, // Disable past dates
            showOtherMonths: true,
            selectOtherMonths: true,
            beforeShowDay: function(date) {
                const day = date.getDay();
                // Disable Sundays (0)
                if (day === 0) return [false, ''];
                
                // Generate random availability status for demo purposes
                // In a real app, this would come from your database
                const dateStr = $.datepicker.formatDate('yy-mm-dd', date);
                const randomValue = Math.random();
                
                if (randomValue < 0.1) {
                    // Fully booked
                    return [true, 'fully-booked', 'Fully booked'];
                } else {
                    // Has available slots
                    return [true, 'has-available-slots', 'Available appointments'];
                }
            },
            onSelect: function(dateText) {
                // Update selected date displays
                const selectedDate = new Date(dateText);
                const formattedDate = formatDisplayDate(selectedDate);
                
                $("#selectedDate").text(dateText);
                $("#displayFormattedDate").text(formattedDate);
                $("#displaySelectedDate").text("Selected Date");
                $("#appointment_date").val(dateText);
                
                // Clear previous time selection
                $(".time-slot-btn").removeClass("active");
                $("#selectedTime").text("Not selected");
                $("#selectedDateTime").addClass("d-none");
                
                // Generate time slots for the selected date
                generateTimeSlots(dateText);
            }
        });
        
        // Today button functionality
        $("#todayButton").click(function() {
            $("#appointment-calendar").datepicker("setDate", new Date());
            // Trigger the select event to update time slots
            const dateText = $("#appointment-calendar").datepicker("getDate");
            const formattedDate = $.datepicker.formatDate('yy-mm-dd', dateText);
            $("#appointment-calendar").datepicker("option", "onSelect").call(
                $("#appointment-calendar")[0], formattedDate, { selectedDay: dateText.getDate(), 
                                                              selectedMonth: dateText.getMonth(), 
                                                              selectedYear: dateText.getFullYear() }
            );
        });
        
        // Format date for display
        function formatDisplayDate(date) {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString('en-US', options);
        }

        // Function to generate time slots with morning/afternoon grouping
        function generateTimeSlots(date) {
            const morningSlots = $("#morningSlots");
            const afternoonSlots = $("#afternoonSlots");
            const noTimesMessage = $("#noTimesMessage");
            
            // Clear previous slots
            morningSlots.empty();
            afternoonSlots.empty();
            noTimesMessage.addClass("d-none");
            
            // Get day of week (0 = Sunday, 6 = Saturday)
            const dayOfWeek = new Date(date).getDay();
            
            // Define available time slots based on day of week
            let startTime, endTime;
            let hasAvailableSlots = false;
            
            if (dayOfWeek === 6) { // Saturday
                startTime = 10; // 10 AM
                endTime = 14;   // 2 PM
            } else {
                startTime = 9;  // 9 AM
                endTime = 17;   // 5 PM
            }
            
            // Generate time slots
            for (let hour = startTime; hour < endTime; hour++) {
                for (let minutes of ["00", "30"]) {
                    const timeString = `${hour}:${minutes}`;
                    const displayTime = formatTime(hour, minutes);
                    const isMorning = hour < 12;
                    
                    const button = $("<button>")
                        .addClass("btn btn-outline-primary btn-sm time-slot-btn")
                        .attr("data-time", timeString)
                        .text(displayTime);
                    
                    // Random availability (in real app, this would come from backend)
                    if (Math.random() > 0.3) {
                        hasAvailableSlots = true;
                        button.click(function() {
                            $(".time-slot-btn").removeClass("active");
                            $(this).addClass("active");
                            const selectedTime = $(this).text();
                            $("#selectedTime").text(selectedTime);
                            $("#appointment_time").val(selectedTime); // Update hidden field
                            $("#selectedDateTime").removeClass("d-none");
                        });
                        
                        // Add to morning or afternoon container
                        if (isMorning) {
                            morningSlots.append(button);
                        } else {
                            afternoonSlots.append(button);
                        }
                    } else {
                        button.addClass("disabled btn-light").attr("disabled", true);
                        button.append(" <small><i class='fa-solid fa-lock-keyhole fa-xs'></i></small>");
                        
                        // Add to morning or afternoon container even if disabled
                        if (isMorning) {
                            morningSlots.append(button);
                        } else {
                            afternoonSlots.append(button);
                        }
                    }
                }
            }
            
            // Check if there are no available slots
            if (!hasAvailableSlots) {
                noTimesMessage.removeClass("d-none");
            }
            
            // Hide empty sections
            if (morningSlots.children().length === 0) {
                morningSlots.parent().addClass("d-none");
            } else {
                morningSlots.parent().removeClass("d-none");
            }
            
            if (afternoonSlots.children().length === 0) {
                afternoonSlots.parent().addClass("d-none");
            } else {
                afternoonSlots.parent().removeClass("d-none");
            }
        }
        
        // Format time to 12-hour format
        function formatTime(hour, minutes) {
            const suffix = hour >= 12 ? "PM" : "AM";
            const displayHour = hour > 12 ? hour - 12 : (hour === 0 ? 12 : hour);
            return `${displayHour}:${minutes} ${suffix}`;
        }
        
        // Confirm button click handler
        $("#confirmTimeBtn").click(function() {
            // Show success message
            const successMessage = $(`
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="fa-solid fa-circle-check me-2"></i>Appointment slot reserved!</strong>
                    <p class="mb-0">Your appointment on ${$("#selectedDate").text()} at ${$("#selectedTime").text()} has been reserved.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `);
            
            // Insert after the selected date/time
            $("#selectedDateTime").after(successMessage);
            
            // Scroll to success message
            $('html, body').animate({
                scrollTop: successMessage.offset().top - 100
            }, 500);
            
            // Auto-dismiss after 5 seconds
            setTimeout(function() {
                successMessage.alert('close');
            }, 5000);
        });
        
        // Initialize with current date selected
        $("#appointment-calendar").datepicker("setDate", new Date());
        // Trigger the onSelect to load today's time slots
        const today = new Date();
        const formattedToday = $.datepicker.formatDate('yy-mm-dd', today);
        $("#appointment-calendar").datepicker("option", "onSelect").call(
            $("#appointment-calendar")[0], formattedToday, { selectedDay: today.getDate(), 
                                                          selectedMonth: today.getMonth(), 
                                                          selectedYear: today.getFullYear() }
        );

        // Remove the remaining code related to form handling since we removed the form
        // ...
    });