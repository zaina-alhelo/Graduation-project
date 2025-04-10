<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AvailableTime;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $appointments = Appointment::where('doctor_id', auth()->id())->get();
    return view('doctor.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
      $doctor = auth()->user();
  $patients = User::where('role', 'user')->get();
    return view('doctor.appointments.create', compact('patients'));
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'patient_id' => 'required|exists:users,id',
        'date' => 'required|date',
        'time' => 'required',
        'notes' => 'nullable|string',
    ]);

    Appointment::create([
        'doctor_id' => auth()->id(),           // الطبيب الحالي
        'patient_id' => $request->patient_id,  // المريض من الفورم
        'date' => $request->date,
        'time' => $request->time,
        'notes' => $request->notes,
        'status' => 'pending',
    ]);

    return redirect()->route('appointments.index')->with('success', 'Appointment created successfully!');
}
public function getAvailableTimes($doctorId, $dayOfWeek)
{
    // تحقق من أن الطبيب الذي يطلب الأوقات هو المستخدم الحالي
    if (auth()->id() != $doctorId) {
        return response()->json(['times' => []], 403);
    }

    // الحصول على الأوقات المتاحة من قاعدة البيانات
    $availableTimes = AvailableTime::where('doctor_id', $doctorId)
        ->where('day_of_week', $dayOfWeek)
        ->get();

    // إنشاء مصفوفة للأوقات المتاحة
    $times = [];
    foreach ($availableTimes as $time) {
        // تحويل وقت البداية والنهاية إلى ساعات فردية
        $start = strtotime($time->start_time);
        $end = strtotime($time->end_time);
        $interval = 30 * 60; // 30 دقيقة بالثواني

        // إضافة كل فترة زمنية بين وقت البداية والنهاية
        for ($i = $start; $i < $end; $i += $interval) {
            $times[] = date('H:i', $i);
        }
    }

    // التحقق من المواعيد الموجودة بالفعل واستبعادها
    $bookedAppointments = Appointment::where('doctor_id', $doctorId)
        ->whereDate('date', request('date', now()->toDateString()))
        ->get();

    foreach ($bookedAppointments as $appointment) {
        $bookedTime = date('H:i', strtotime($appointment->time));
        $key = array_search($bookedTime, $times);
        if ($key !== false) {
            unset($times[$key]);
        }
    }

    return response()->json(['times' => array_values($times)]);
}
    /**
     * Display the specified resource.
     */
   public function show($id)
{
    $appointment = Appointment::find($id);
    
    if (!$appointment || $appointment->doctor_id !== auth()->id()) {
        return redirect()->route('appointments.index')->with('error', 'Appointment not found.');
    }
    
    return view('doctor.appointments.show', compact('appointment'));
}
public function updateStatus(Request $request, $id)
{
    $appointment = Appointment::find($id);

    if (!$appointment || $appointment->doctor_id !== auth()->id()) {
        return redirect()->route('appointments.index')->with('error', 'Appointment not found.');
    }

    $appointment->status = $request->status;
    $appointment->save();

    return redirect()->route('appointments.index')->with('success', 'Appointment status updated successfully');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
