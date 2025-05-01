<?php
namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
  public function index($conversation_id)
    {
        $conversation = Conversation::with('messages')->where('id', $conversation_id)
            ->where(function ($query) {
                $query->where('doctor_id', auth()->id())
                      ->orWhere('patient_id', auth()->id());
            })
            ->firstOrFail();

        return view('chat.index', compact('conversation'));
    }
 

public function sendMessage(Request $request, $conversation_id)
{
    $conversation = Conversation::findOrFail($conversation_id);

    if ($conversation->doctor_id != auth()->id() && $conversation->patient_id != auth()->id()) {
        return redirect()->back()->with('error', 'Unauthorized');
    }

    $messageData = [
        'conversation_id' => $conversation->id,
        'sender_id' => auth()->id(),
        'message' => $request->message,
    ];

    if ($request->hasFile('file')) {
        $path = $request->file('file')->store('messages');
        $messageData['file_path'] = $path;
        $messageData['message_type'] = $request->file('file')->getMimeType() == 'audio/mpeg' ? 'voice' : 'image';
    } else {
        $messageData['message_type'] = 'text';
    }

    Message::create($messageData);

    return redirect()->route('chat', ['conversation_id' => $conversation->id]);
}

}
