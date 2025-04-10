<?php

namespace App\Http\Controllers;

use App\Models\AvailableTime;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AvailableTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $availableTimes = AvailableTime::where('doctor_id', auth()->id())->get();
        return view('doctor.available_times.index', compact('availableTimes'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'day_of_week' => 'required|integer|between:0,6',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
    ]);

  

    $conflict = AvailableTime::where('doctor_id', auth()->id())
        ->where('day_of_week', $request->day_of_week)
        ->where(function ($query) use ($request) {
            $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                  ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                  ->orWhere(function ($query2) use ($request) {
                      $query2->where('start_time', '<=', $request->start_time)
                             ->where('end_time', '>=', $request->end_time);
                  });
        })->exists();

    if ($conflict) {
        return back()->withErrors(['conflict' => 'This time slot conflicts with an existing one.'])->withInput();
    }

    AvailableTime::create([
        'doctor_id' => auth()->id(),
        'day_of_week' => $request->day_of_week,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
    ]);

    return redirect()->route('available_times.index')->with('success', 'Available time added successfully');
}



    

    /**
     * Display the specified resource.
     */
    public function show(AvailableTime $availableTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

public function edit($id)
{
    $time = AvailableTime::find($id);
    
    if (!$time) {
        return redirect()->route('available_times.index')->with('error', 'Time slot not found');
    }

    return view('doctor.available_times.edit', compact('time'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'day_of_week' => 'required|integer',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
    ]);

    $time = AvailableTime::find($id);
    
    if (!$time) {
        return redirect()->route('available_times.index')->with('error', 'Time slot not found');
    }

      $start_time = Carbon::createFromFormat('H:i', $request->start_time)->format('H:i');
    $end_time = Carbon::createFromFormat('H:i', $request->end_time)->format('H:i');

    $time->day_of_week = $request->day_of_week;
    $time->start_time = $start_time;
    $time->end_time = $end_time;
    $time->save();

    return redirect()->route('available_times.index')->with('success', 'Time slot updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AvailableTime $availableTime)
{
    if ($availableTime->doctor_id !== auth()->id()) {
        return redirect()->route('available_times.index')->with('error', 'You are not authorized to delete this time slot.');
    }

    $availableTime->delete();

    return redirect()->route('available_times.index')->with('success', 'Time slot deleted successfully');
}

}
