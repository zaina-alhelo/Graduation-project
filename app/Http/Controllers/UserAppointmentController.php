<?php

    namespace App\Http\Controllers;

    use App\Models\Appointment;
    use App\Models\AvailableTime;
    use App\Models\User;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;

    class UserAppointmentController extends Controller
    {
        public function showAppointmentForm()
        {
            $doctors = User::where('role', 'doctor')->get();
            return view('landing.appointment', compact('doctors'));
        }
  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'appointment_date' => 'required|date|after_or_equal:today',
        'appointment_time' => 'required|date_format:H:i',
        'doctor_id' => 'required|exists:users,id',
        'notes' => 'nullable|string|max:500',
    ], [
        'name.required' => 'Please enter your full name.',
        'email.required' => 'Please enter your email address.',
        'email.email' => 'Please enter a valid email address.',
        'phone.required' => 'Please enter your phone number.',
        'appointment_date.required' => 'Please select an appointment date.',
        'appointment_date.after_or_equal' => 'The appointment date cannot be in the past.',
        'appointment_time.required' => 'Please select an appointment time.',
        'appointment_time.date_format' => 'Invalid time format.',
        'doctor_id.required' => 'Please select a doctor.',
    ]);

    $date = Carbon::parse($request->appointment_date)->format('Y-m-d');
    $time = $request->appointment_time;
    $dayOfWeek = Carbon::parse($date)->dayOfWeek;
    $doctorId = $request->doctor_id;
    
    // Check if specific doctor is available
    if (!$this->checkTimeAvailability($doctorId, $date, $time, $dayOfWeek)) {
        return redirect()->back()->with('error', 'The selected time slot is no longer available. Please select another time.')->withInput();
    }

    // Check if user exists or create a new user
    $user = User::where('email', $request->email)->first();
    
    if (!$user) {
        // Create new user with patient role
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt(Str::random(10)), 
            'role' => 'user',
        ]);
    }

    // Create the appointment
    Appointment::create([
        'doctor_id' => $doctorId,
        'patient_id' => $user->id,
        'date' => $date,
        'time' => $time,
        'notes' => $request->notes,
        'status' => 'pending',
    ]);

    return redirect()->back()->with('success', 'Your appointment has been scheduled successfully! We will contact you shortly to confirm.');
}

    /**
     * Get available times for a specific doctor and day.
     */
    public function getAvailableTimes($doctorId, $dayName, Request $request)
    {
        $selectedDate = $request->query('date', date('Y-m-d'));
        
        if (Carbon::parse($selectedDate)->isPast() && !Carbon::parse($selectedDate)->isToday()) {
            return response()->json(['times' => [], 'message' => 'Cannot book appointments for past dates']);
        }
        
        $dayNumber = $this->convertDayNameToNumber($dayName);
        
        $availableTimes = AvailableTime::where('doctor_id', $doctorId)
            ->where('day_of_week', $dayNumber) 
            ->orderBy('start_time')
            ->get();
            
        if ($availableTimes->isEmpty()) {
            return response()->json(['times' => [], 'message' => 'No schedule available for this day']);
        }
        
        $allTimeSlots = [];
        foreach ($availableTimes as $scheduleTime) {
            $slots = $this->generateTimeSlots($scheduleTime->start_time, $scheduleTime->end_time);
            $allTimeSlots = array_merge($allTimeSlots, $slots);
        }
        
        $bookedTimes = Appointment::where('doctor_id', $doctorId)
            ->whereDate('date', $selectedDate)
            ->where('status', '!=', 'cancelled')
            ->pluck('time')
            ->map(function($time) {
                return Carbon::parse($time)->format('H:i');
            })
            ->toArray();
            
        $currentTime = Carbon::now();
        $isToday = Carbon::parse($selectedDate)->isToday();
        
        $availableSlots = array_filter($allTimeSlots, function($timeSlot) use ($bookedTimes, $currentTime, $isToday) {
            if (in_array($timeSlot, $bookedTimes)) {
                return false;
            }
            
            if ($isToday) {
                $slotTime = Carbon::parse($timeSlot);
                $slotDateTime = Carbon::now()->setHour($slotTime->hour)->setMinute($slotTime->minute)->setSecond(0);
                
                if ($slotDateTime->isPast()) {
                    return false;
                }
            }
            
            return true;
        });
        
        return response()->json(['times' => array_values($availableSlots)]);
    }

    /**
     * Get all doctors' available times for a specific day
     */
 

    /**
     * Get unavailable/fully booked dates.
     */
public function getFullyBookedDates(Request $request)
{
    $doctorId = $request->query('doctor_id');
    
    if (!$doctorId) {
        return response()->json([
            'fullyBookedDates' => [], 
            'error' => 'Doctor ID is required'
        ]);
    }
    
    $fullyBookedDates = $this->getFullyBookedDatesForDoctor($doctorId);
    
    return response()->json(['fullyBookedDates' => $fullyBookedDates]);
}



private function getFullyBookedDatesForDoctor($doctorId)
{
    // Get doctor's working days
    $workingDays = AvailableTime::where('doctor_id', $doctorId)
        ->distinct()
        ->pluck('day_of_week')
        ->toArray();
    
    // Find dates where doctor doesn't work
    $nonWorkingDates = [];
    $startDate = Carbon::today();
    $endDate = Carbon::today()->addMonths(3);
    
    for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
        if (!in_array($date->dayOfWeek, $workingDays)) {
            $nonWorkingDates[] = $date->format('Y-m-d');
        }
    }
    
    // Find dates where doctor is fully booked
    $fullyBookedDates = [];
    $appointments = Appointment::where('doctor_id', $doctorId)
        ->where('date', '>=', Carbon::today())
        ->where('status', '!=', 'cancelled')
        ->select('date', DB::raw('COUNT(*) as count'))
        ->groupBy('date')
        ->get();
    
    foreach ($appointments as $appointment) {
        $dayNumber = Carbon::parse($appointment->date)->dayOfWeek;
        $availableSlots = $this->getAvailableTimeSlotsCount($doctorId, $dayNumber);
        
        if ($appointment->count >= $availableSlots) {
            $fullyBookedDates[] = $appointment->date;
        }
    }
    
    return array_unique(array_merge($nonWorkingDates, $fullyBookedDates));
}
    /**
     * Find an available doctor for the given date/time
     */


    /**
     * Check if a specific time slot is available for a doctor
     */
    private function checkTimeAvailability($doctorId, $date, $time, $dayNumber)
    {
        // Check if doctor works on this day
        $workingDay = AvailableTime::where('doctor_id', $doctorId)
            ->where('day_of_week', $dayNumber)
            ->exists();
            
        if (!$workingDay) {
            return false;
        }
        
        // Check if the time is within doctor's available hours
        $isInAvailableTime = false;
        $availableTimes = AvailableTime::where('doctor_id', $doctorId)
            ->where('day_of_week', $dayNumber)
            ->get();
            
        $timeObj = Carbon::parse($time);
        
        foreach ($availableTimes as $availableTime) {
            $start = Carbon::parse($availableTime->start_time);
            $end = Carbon::parse($availableTime->end_time);
            
            if ($timeObj->between($start, $end)) {
                $isInAvailableTime = true;
                break;
            }
        }
        
        if (!$isInAvailableTime) {
            return false;
        }
        
        // Check if the slot is already booked
        $isBooked = Appointment::where('doctor_id', $doctorId)
            ->whereDate('date', $date)
            ->whereTime('time', $time)
            ->where('status', '!=', 'cancelled')
            ->exists();
            
        return !$isBooked;
    }

    /**
     * Generate time slots between start and end times
     */
    private function generateTimeSlots($startTime, $endTime, $intervalMinutes = 30)
    {
        $slots = [];
        $start = Carbon::parse($startTime);
        $end = Carbon::parse($endTime);
        
        while ($start < $end) {
            $slots[] = $start->format('H:i');
            $start->addMinutes($intervalMinutes);
        }
        
        return $slots;
    }

    /**
     * Get the number of available time slots for a doctor on a specific day
     */
    private function getAvailableTimeSlotsCount($doctorId, $dayNumber)
    {
        $availableTimes = AvailableTime::where('doctor_id', $doctorId)
            ->where('day_of_week', $dayNumber)
            ->get();
            
        $slotsCount = 0;
        
        foreach ($availableTimes as $time) {
            $start = Carbon::parse($time->start_time);
            $end = Carbon::parse($time->end_time);
            $duration = $end->diffInMinutes($start);
            $slotDuration = 30; // 30-minute slots
            
            $slotsCount += floor($duration / $slotDuration);
        }
        
        return $slotsCount;
    }

    /**
     * Convert day name to number
     */
    private function convertDayNameToNumber($dayName)
    {
        $daysMap = [
            'Sunday' => 0,
            'Monday' => 1,
            'Tuesday' => 2,
            'Wednesday' => 3,
            'Thursday' => 4,
            'Friday' => 5,
            'Saturday' => 6
        ];
        
        return $daysMap[$dayName] ?? 0;
    }
        
    }