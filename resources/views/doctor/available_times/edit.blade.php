@extends('doctor.master')

@section('title-page')
Edit Available Time
@endsection

@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Available Time</h5>
                    <p>Edit the details of the selected available time slot.</p>

                    <!-- Form to edit time slot -->
                    <form action="{{ route('available_times.update', $time->id) }}" method="POST">
                        @csrf
                        @method('PUT') 
                        
                        <div class="mb-3">
                            <label for="day_of_week" class="form-label">Day of Week</label>
                            <select class="form-control" name="day_of_week" id="day_of_week">
                                <option value="0" {{ $time->day_of_week == 0 ? 'selected' : '' }}>Sunday</option>
                                <option value="1" {{ $time->day_of_week == 1 ? 'selected' : '' }}>Monday</option>
                                <option value="2" {{ $time->day_of_week == 2 ? 'selected' : '' }}>Tuesday</option>
                                <option value="3" {{ $time->day_of_week == 3 ? 'selected' : '' }}>Wednesday</option>
                                <option value="4" {{ $time->day_of_week == 4 ? 'selected' : '' }}>Thursday</option>
                                <option value="5" {{ $time->day_of_week == 5 ? 'selected' : '' }}>Friday</option>
                                <option value="6" {{ $time->day_of_week == 6 ? 'selected' : '' }}>Saturday</option>
                            </select>
                            @error('day_of_week')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="start_time" class="form-label">Start Time</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" 
                                   value="{{ \Carbon\Carbon::createFromFormat('H:i:s', $time->start_time)->format('H:i') }}">
                            @error('start_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="end_time" class="form-label">End Time</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" 
                                   value="{{ \Carbon\Carbon::createFromFormat('H:i:s', $time->end_time)->format('H:i') }}">
                            @error('end_time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Time Slot</button>
                        <a type="button" class="btn btn-secondary" href="{{ route('available_times.index')}}">Cancel</a>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection  
