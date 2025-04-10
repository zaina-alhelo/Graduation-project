<?php

// app/Http/Controllers/PatientController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
 
    public function create()
    {
        return view('doctor.patient.create');
    }

    public function store(Request $request)
    {
        $request->validate(rules: [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string',
        ]);

        $patient = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 'user', 
            'doctor_id' => auth()->id(), 
            'password' => bcrypt('password'),
        ]);

        return redirect()->route('appointments.create')->with('success', 'Patient added successfully!');
    }
}
