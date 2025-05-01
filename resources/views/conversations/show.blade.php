@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Conversation with Dr. </div>
        <div class="card-body chat-box">
            <div class="messages">
                @foreach ($conversation->messages as $message)
                    <div class="message @if($message->sender_id == auth()->id()) sent @else received @endif">
                        <div class="message-content">
                            @if($message->message_type == 'text')
                                <p>{{ $message->message }}</p>
                            @elseif($message->message_type == 'voice')
                                <audio controls>
                                    <source src="{{ Storage::url($message->file_path) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            @elseif($message->message_type == 'file')
                                <a href="{{ Storage::url($message->file_path) }}" download>Download File</a>
                            @endif
                        </div>
                        <small class="text-muted">{{ $message->created_at->format('d/m/Y H:i') }}</small>
                    </div>
                @endforeach
            </div>

            <form action="{{ route('messages.store', $conversation->id) }}" method="POST" enctype="multipart/form-data" id="message-form">
                @csrf
                <div class="form-group">
                    <textarea name="message" class="form-control" placeholder="Type your message"></textarea>
                </div>

                <div class="form-group voice-record">
                    <label for="voice">Record Voice Message</label>
                    <button type="button" id="start-recording" class="btn btn-info">
                        <i class="fas fa-microphone"></i> Start Recording
                    </button>
                    <button type="button" id="stop-recording" class="btn btn-danger" disabled>
                        <i class="fas fa-stop"></i> Stop Recording
                    </button>
                    <audio id="audio-playback" controls></audio>
                    <input type="hidden" id="audio-file" name="audio_file">
                </div>

                <div class="form-group">
                    <label for="file">Upload File</label>
                    <input type="file" name="file" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .chat-box {
        height: 500px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .messages {
        flex-grow: 1;
    }

    .message {
        display: flex;
        justify-content: flex-start;
        padding: 10px;
        gap: 10px;
    }

    .message.sent {
        justify-content: flex-end;
    }

    .message-content {
        max-width: 60%;
        background-color: #f1f1f1;
        padding: 15px;
        border-radius: 15px;
        margin: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-size: 1rem;
    }

    .message.sent .message-content {
        background-color: #007bff;
        color: white;
        box-shadow: 0 4px 6px rgba(0, 123, 255, 0.4);
    }

    .message.received .message-content {
        background-color: #f8f9fa;
        color: #333;
    }

    .voice-record {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .form-control {
        border-radius: 20px;
    }

    button:disabled {
        opacity: 0.5;
    }

    .voice-record button {
        border-radius: 25px;
        padding: 10px 15px;
        font-size: 1rem;
    }

    .form-group textarea {
        border-radius: 25px;
        padding: 15px;
        font-size: 1.1rem;
    }
</style>
@endsection

@section('scripts')
<script>
    let mediaRecorder;
    let audioChunks = [];
    let audioBlob;
    let audioUrl;
    let audioFile;

    const startRecordingButton = document.getElementById('start-recording');
    const stopRecordingButton = document.getElementById('stop-recording');
    const audioPlayback = document.getElementById('audio-playback');
    const audioFileInput = document.getElementById('audio-file');

    startRecordingButton.addEventListener('click', () => {
        navigator.mediaDevices.getUserMedia({ audio: true })
            .then(stream => {
                mediaRecorder = new MediaRecorder(stream);
                mediaRecorder.ondataavailable = event => {
                    audioChunks.push(event.data);
                };
                mediaRecorder.onstop = () => {
                    audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
                    audioUrl = URL.createObjectURL(audioBlob);
                    audioPlayback.src = audioUrl;
                    
                    audioFile = new File([audioBlob], 'message.ogg', { type: 'audio/ogg' });

                    audioFileInput.value = audioFile;
                };

                mediaRecorder.start();
                startRecordingButton.disabled = true;
                stopRecordingButton.disabled = false;
            });
    });k

    stopRecordingButton.addEventListener('click', () => {
        mediaRecorder.stop();
        startRecordingButton.disabled = false;
        stopRecordingButton.disabled = true;
    });
</script>
@endsection
