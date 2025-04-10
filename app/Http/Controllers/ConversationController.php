<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
{
    // عرض المحادثات الخاصة بالطبيب أو المريض
    $conversations = auth()->user()->conversationsAsDoctor()->orWhere('patient_id', auth()->id())->get();
    return view('conversations.index', compact('conversations'));
}
public function create()
{
    // جلب قائمة الأطباء لإنشاء المحادثة معهم
    // تأكد أن لديك دور الطبيب أو فلتر لعرض الأطباء فقط
    $doctors = User::where('role', 'doctor')->get();

    return view('conversations.create', compact('doctors'));
}



public function show($id)
{
    $conversation = Conversation::findOrFail($id);
    $messages = $conversation->messages; // جلب جميع الرسائل في هذه المحادثة
    return view('conversations.show', compact('conversation', 'messages'));
}

public function store(Request $request)
{

    $request->validate([
        'doctor_id' => 'required|exists:users,id',
    ]);

    $conversation = Conversation::create([
        'doctor_id' => $request->doctor_id,
        'patient_id' => auth()->id(), // استخدم auth()->id() بدلاً من $request->patient_id
        'status' => 'active',
    ]);

    return redirect()->route('conversations.show', $conversation->id);
}



}
