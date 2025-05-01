@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Conversations</h1>
    <p>Here you can view a list of your conversations.</p>
    
    <a href="{{ route('conversations.create') }}" class="btn btn-success mb-3">Start a New Conversation</a>
    
    @if($conversations->count())
        <ul>
            @foreach($conversations as $conversation)
                <li>
                    <a href="{{ route('chat', ['conversation_id' => $conversation->id]) }}">
                        Conversation with {{ $conversation->doctor_id == auth()->id() ? $conversation->patient->name : $conversation->doctor->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No conversations available.</p>
    @endif
</div>
@endsection
