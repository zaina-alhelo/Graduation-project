@extends('doctor.master')

@section('title-page')
Manage Appointments
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Appointments</h5>
                    <p>Below is a list of all your scheduled appointments. You can confirm, cancel, or review notes.</p>
<a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">Add New Appointment</a>

                    <!-- Table to display appointments -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Notes</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->patient->name }}</td>
                                    <td>{{ $appointment->date }}</td>
                                    <td>{{ $appointment->time }}</td>
                                    <td>
                                        @if($appointment->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($appointment->status == 'confirmed')
                                            <span class="badge bg-success">Confirmed</span>
                                        @elseif($appointment->status == 'cancelled')
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>{{ $appointment->notes ?? '—' }}</td>
                                    <td>
                                        @if($appointment->status == 'pending')
<form action="{{ route('appointments.updateStatus', ['id' => $appointment->id]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="confirmed">
                                                <button type="submit" class="btn btn-success btn-sm">Confirm</button>
                                            </form>

                                           <form action="{{ route('appointments.updateStatus', ['id' => $appointment->id]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="cancelled">
                                                <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                            </form>
                                        @else
                                            <span class="text-muted">No actions</span>
                                        @endif
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
@endsection
