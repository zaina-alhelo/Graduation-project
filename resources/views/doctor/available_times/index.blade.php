@extends('doctor.master')

@section('title-page')
Manage Available Times
@endsection

@section('content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Your Available Times</h5>
                    <p>Use the table below to view and manage your available times. You can add, update, or delete available time slots.</p>

                    <!-- Button to open modal for adding new time slot -->
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTimeSlotModal">
                        Add New Time Slot
                    </button>

                    <!-- Table to display available times -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($availableTimes as $time)
                                <tr>
                                    <td>
                                        {{ ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'][$time->day_of_week] }}
                                    </td>
                                    <td>{{ $time->start_time }}</td>
                                    <td>{{ $time->end_time }}</td>
                                    <td>
<a href="{{ route('available_times.edit', $time->id) }}" class="btn btn-warning btn-sm">
    <i class="bi bi-pencil text-white"></i>
</a>

                                        <!-- Form to delete the time slot -->
                                        <form action="{{ route('available_times.destroy', $time->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
<button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete(event, this);">
    <i class="bi bi-trash"></i>
</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table -->

                </div>
            </div>

        </div>
    </div>

    <!-- Modal to add new time slot -->
    <div class="modal fade" id="addTimeSlotModal" tabindex="-1" aria-labelledby="addTimeSlotModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTimeSlotModalLabel">Add New Available Time Slot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form to add new time slot -->
                   <form action="{{ route('available_times.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="day_of_week" class="form-label">Day of Week</label>
        <select class="form-control" name="day_of_week" id="day_of_week">
            <option value="0" {{ old('day_of_week') == 0 ? 'selected' : '' }}>Sunday</option>
            <option value="1" {{ old('day_of_week') == 1 ? 'selected' : '' }}>Monday</option>
            <option value="2" {{ old('day_of_week') == 2 ? 'selected' : '' }}>Tuesday</option>
            <option value="3" {{ old('day_of_week') == 3 ? 'selected' : '' }}>Wednesday</option>
            <option value="4" {{ old('day_of_week') == 4 ? 'selected' : '' }}>Thursday</option>
            <option value="5" {{ old('day_of_week') == 5 ? 'selected' : '' }}>Friday</option>
            <option value="6" {{ old('day_of_week') == 6 ? 'selected' : '' }}>Saturday</option>
        </select>
        @error('day_of_week')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="start_time" class="form-label">Start Time</label>
        <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time') }}">
        @error('start_time')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="end_time" class="form-label">End Time</label>
        <input type="time" class="form-control" id="end_time" name="end_time" value="{{ old('end_time') }}">
        @error('end_time')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>


                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Display success message -->
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3085d6',
    });
</script>
@endif

<!-- Display validation errors -->
@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        confirmButtonColor: '#e3342f',
    });

    var myModal = new bootstrap.Modal(document.getElementById('addTimeSlotModal'));
    myModal.show();
</script>
@endif

<!-- Delete Confirmation using SweetAlert -->
<script>
    function confirmDelete(event, button) {
        event.preventDefault(); // Prevent form submission

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('form').submit(); // Submit the form if confirmed
            }
        });
    }
</script>
@endsection
