@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Start a New Conversation</h1>
    <form action="{{ route('conversations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="doctor_id">Choose a Doctor:</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                <option value="">-- Choose a Doctor --</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Start Conversation</button>
        </div>
    </form>
</div>
@endsection
