<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Crypt;

class MessageController extends Controller
{
 public function index(User $user)
    {
        $authId = Auth::id();
        $authUser = Auth::user();

        Message::where('sender_id', $user->id)
            ->where('receiver_id', $authId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $messages = Message::where(function ($query) use ($authId, $user) {
            $query->where('sender_id', $authId)
                ->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($authId, $user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', $authId);
        })->orderBy('created_at')->get();
        
        foreach ($messages as $message) {
            if ($message->message) {
                try {
                    $message->message = Crypt::decryptString($message->message);
                } catch (\Exception $e) {
                    $message->message = "[Unreadable message]";
                }
            }
        }

        if ($authUser->role === 'doctor') {
            $users = User::where('role', 'user')->get();
            return view('doctor.chats', compact('messages', 'user', 'users'));
        } else {
            $doctors = User::where('role', 'doctor')->get();
            return view('chat.index', compact('messages', 'user', 'doctors'));
        }
    }

    public function send(Request $request, User $user)
    {
        try {
            $request->validate([
                'receiver_id' => 'required|exists:users,id',
                'message'     => 'required_without:attachment|nullable|string',
                'attachment'  => [
                    'required_without:message',
                    'nullable',
                    File::types(['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt', 'ppt', 'pptx'])
                        ->max(10 * 1024)
                ],
            ]);

            $attachmentPath = null;
            $type = 'text';

            if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
                $file = $request->file('attachment');
                
                $extension = $file->getClientOriginalExtension();
                
                $attachmentPath = $file->store('messages', 'public');
                
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    $type = 'image';
                } else {
                    $type = 'file';
                }
                
                if (!$attachmentPath) {
                    return response()->json([
                        'success' => false, 
                        'message' => 'Failed to store file. Please try again.'
                    ], 500);
                }
            }
            
            $encryptedMessage = $request->message ? Crypt::encryptString($request->message) : null;

            $message = Message::create([
                'sender_id'   => Auth::id(),
                'receiver_id' => $request->receiver_id,
                'message'     => $encryptedMessage,
                'attachment'  => $attachmentPath,
                'type'        => $type,
                'is_read'     => false,
            ]);

            $message->load('sender', 'receiver');
            
            $responseMessage = $message->toArray();
            $responseMessage['message'] = $request->message;

            return response()->json(['success' => true, 'message' => $responseMessage]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request: ' . $e->getMessage()
            ], 500);
        }
    }


   
    // Method to mark messages as read via AJAX
    public function markAsRead(User $user)
    {
        $authId = Auth::id();
        
        $updated = Message::where('sender_id', $user->id)
                ->where('receiver_id', $authId)
                ->where('is_read', false)
                ->update(['is_read' => true]);
                
        return response()->json([
            'success' => true,
            'count' => $updated
        ]);
    }
    
    // Method to get unread message count
    public function getUnreadCount()
    {
        $authId = Auth::id();
        
        $counts = Message::where('receiver_id', $authId)
                ->where('is_read', false)
                ->selectRaw('sender_id, COUNT(*) as count')
                ->groupBy('sender_id')
                ->get()
                ->pluck('count', 'sender_id')
                ->toArray();
                
        return response()->json([
            'success' => true,
            'counts' => $counts
        ]);
    }
    
    // New method to check read status of messages
    public function checkReadStatus(User $user)
    {
        $authId = Auth::id();
        
        // Get all messages sent by authenticated user to this user
        $messages = Message::where('sender_id', $authId)
                ->where('receiver_id', $user->id)
                ->select('id', 'is_read')
                ->get();
                
        return response()->json([
            'success' => true,
            'messages' => $messages
        ]);
    }
}