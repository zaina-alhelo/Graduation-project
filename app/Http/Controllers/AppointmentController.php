<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AvailableTime;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('doctor_id', auth()->id())
            ->with('patient')
            ->orderBy('date', 'desc')
            ->orderBy('time', 'asc')
            ->paginate(15);
            
        return view('doctor.appointments.index', compact('appointments'));
    }
public function show($id)
{
    $appointment = Appointment::findOrFail($id);
    return view('doctor.appointments.show', compact('appointment'));
}
public function updateNote(Request $request, $id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->notes = $request->notes;
    $appointment->save();

    return redirect()->route('appointments.show', $id)->with('success', 'Note updated successfully.');
}

    public function create()
    {
        $doctor = auth()->user();
        $patients = User::where('role', 'user')->get();
        return view('doctor.appointments.create', compact('patients'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'notes' => 'nullable|string|max:500',
        ], [
    'patient_id.required' => 'Please select a patient.',
    'patient_id.exists' => 'The selected patient does not exist.',
    
    'date.required' => 'Please choose an appointment date.',
    'date.date' => 'The appointment date must be a valid date.',
    'date.after_or_equal' => 'The appointment date cannot be in the past.',
    
    'time.required' => 'Please select an appointment time.',
    'time.date_format' => 'The time format must be HH:MM.',
    
    'notes.string' => 'Notes must be a valid text.',
    'notes.max' => 'Notes may not be longer than 500 characters.',
        ]);

        $date = Carbon::parse($request->date)->format('Y-m-d');
        $time = $request->time;
        $dayOfWeek = Carbon::parse($date)->dayOfWeek;
        $dayName = Carbon::parse($date)->format('l'); 
        
        if (!$this->checkTimeAvailability(auth()->id(), $date, $time, $dayOfWeek)) {
            return redirect()->back()->with('error', 'The selected time slot is no longer available. Please select another time.')->withInput();
        }

        Appointment::create([
            'doctor_id' => auth()->id(),
            'patient_id' => $request->patient_id,
            'date' => $date,
            'time' => $time,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment scheduled successfully!');
    }
public function updateStatus(Request $request, $id)
{
    $appointment = Appointment::findOrFail($id);

    $appointment->status = $request->status;
    $appointment->save();

    return redirect()->back()->with('success', 'Appointment status updated successfully.');
}
public function edit($id)
{
    $appointment = Appointment::findOrFail($id);
    $patients = User::where('role', 'user')->get();   
    return view('doctor.appointments.edit', compact('appointment', 'patients'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'patient_id' => 'required|exists:users,id',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required|date_format:H:i',
        'notes' => 'nullable|string|max:500',
    ]);

    $appointment = Appointment::findOrFail($id);
    $appointment->patient_id = $request->patient_id;
    $appointment->date = $request->date;
    $appointment->time = $request->time;
    $appointment->notes = $request->notes;
    $appointment->save();

    return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully!');
}


    public function getAvailableTimes($doctorId, $dayName, Request $request)
    {
        if (auth()->id() != $doctorId && auth()->user()->role != 'admin') {
            return response()->json(['times' => [], 'message' => 'Unauthorized access'], 403);
        }

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

    public function getFullyBookedDates($doctorId)
    {
        try {
            $workingDays = AvailableTime::where('doctor_id', $doctorId)
                ->distinct()
                ->pluck('day_of_week')
                ->toArray();
                
                
            $nonWorkingDates = [];
            $startDate = Carbon::today();
            $endDate = Carbon::today()->addMonths(3);
            
            for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
                $dayNumber = $date->dayOfWeek;
                if (!in_array($dayNumber, $workingDays)) {
                    $nonWorkingDates[] = $date->format('Y-m-d');
                }
            }
            
            $fullyBookedDates = [];
            $appointmentCounts = DB::table('appointments')
                ->select(DB::raw('date, COUNT(*) as booked_count'))
                ->where('doctor_id', $doctorId)
                ->where('date', '>=', Carbon::today())
                ->where('status', '!=', 'cancelled')
                ->groupBy('date')
                ->get();
                
            foreach ($appointmentCounts as $dateCount) {
                $date = Carbon::parse($dateCount->date);
                $dayNumber = $date->dayOfWeek;
                
                $availableTimesCount = $this->getAvailableTimeSlotsCount($doctorId, $dayNumber);
                
                if ($dateCount->booked_count >= $availableTimesCount && $availableTimesCount > 0) {
                    $fullyBookedDates[] = $dateCount->date;
                }
            }
            
            $allUnavailableDates = array_merge($nonWorkingDates, $fullyBookedDates);
            
            return response()->json(['fullyBookedDates' => $allUnavailableDates]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function checkTimeAvailability($doctorId, $date, $time, $dayNumber)
    {
        $workingDay = AvailableTime::where('doctor_id', $doctorId)
            ->where('day_of_week', $dayNumber)
            ->exists();
            
     
        
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
        
   
        $isBooked = Appointment::where('doctor_id', $doctorId)
            ->whereDate('date', $date)
            ->whereTime('time', $time)
            ->where('status', '!=', 'cancelled')
            ->exists();
            
     
        
        return !$isBooked;
    }

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
            $slotDuration = 30;
            
            $slotsCount += floor($duration / $slotDuration);
        }
        
        return $slotsCount;
    }

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