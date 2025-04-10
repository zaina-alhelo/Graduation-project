<!-- resources/views/chat/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Conversation with Dr. {{ $conversation->doctor->name }}</div>
    <div class="card-body">
        <div class="messages" id="messages">
            @foreach ($conversation->messages as $message)
                <div class="message {{ $message->sender_id == auth()->id() ? 'sent' : 'received' }}">
                    <strong>{{ $message->sender->name }}:</strong> 
                    @if($message->message_type == 'text')
                        <p>{{ $message->message }}</p>
                    @elseif($message->message_type == 'image')
                        <img src="{{ asset($message->file_path) }}" alt="image" width="200">
                    @elseif($message->message_type == 'voice')
                        <audio controls>
                            <source src="{{ asset($message->file_path) }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- إرسال رسالة جديدة -->
        <form method="POST" action="{{ route('sendMessage', $conversation->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="message" placeholder="Type your message..." required></textarea>
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="file" />
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>
@endsection
