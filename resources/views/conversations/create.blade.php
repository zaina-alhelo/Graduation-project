@extends('layouts.app')

@section('content')
<div class="container">
    <h1>بدء محادثة جديدة</h1>
    <form action="{{ route('conversations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="doctor_id">اختر الطبيب:</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                <option value="">-- اختر الطبيب --</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">بدء المحادثة</button>
        </div>
    </form>
</div>
@endsection
