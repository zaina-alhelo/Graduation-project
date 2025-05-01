<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
{
    $conversations = auth()->user()->conversationsAsDoctor()->orWhere('patient_id', auth()->id())->get();
    return view('conversations.index', compact('conversations'));
}
public function create()
{
    $doctors = User::where('role', 'doctor')->get();

    return view('conversations.create', compact('doctors'));
}



public function show($id)
{
    $conversation = Conversation::findOrFail($id);
    $messages = $conversation->messages; 
    return view('conversations.show', compact('conversation', 'messages'));
}

public function store(Request $request)
{

    $request->validate([
        'doctor_id' => 'required|exists:users,id',
    ]);

    $conversation = Conversation::create([
        'doctor_id' => $request->doctor_id,
        'patient_id' => auth()->id(),

        'status' => 'active',
    ]);

    return redirect()->route('conversations.show', $conversation->id);
}



}
