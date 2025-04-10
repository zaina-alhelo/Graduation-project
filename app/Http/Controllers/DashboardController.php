<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index()
{
    $user = Auth::user();
    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->isDoctor()) {
        return redirect()->route('doctor.dashboard');
    } else {
        $conversation = Conversation::where('patient_id', $user->id)
                                    ->orWhere('doctor_id', $user->id)
                                    ->first();
        
        $conversation_id = $conversation ? $conversation->id : null;
        
        return view('patient.dashboard', compact('conversation', 'conversation_id'));
    }
}
}
