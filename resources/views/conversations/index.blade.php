@extends('layouts.app')

@section('content')
<div class="container">
    <h1>المحادثات</h1>
    <p>هنا يمكنك رؤية قائمة المحادثات الخاصة بك.</p>
    
    <a href="{{ route('conversations.create') }}" class="btn btn-success mb-3">بدء محادثة جديدة</a>
    
    @if($conversations->count())
        <ul>
            @foreach($conversations as $conversation)
                <li>
                    <a href="{{ route('chat', ['conversation_id' => $conversation->id]) }}">
                        المحادثة مع {{ $conversation->doctor_id == auth()->id() ? $conversation->patient->name : $conversation->doctor->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>لا توجد محادثات.</p>
    @endif
</div>
@endsection
