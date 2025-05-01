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

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h4 class="card-title text-primary"><i class="bi bi-calendar-check"></i> Manage Appointments</h4>
                            <p class="text-muted mb-0">
                                Review all your upcoming appointments below. You can confirm, cancel, or view details of each appointment.
                            </p>
                        </div>
                        <a href="{{ route('appointments.create') }}" class="btn btn-outline-primary rounded-pill">
                            <i class="bi bi-plus-circle"></i> Add New Appointment
                        </a>
                    </div>

                    <!-- Table -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Update Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->patient->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appointment->date)->format('Y-m-d') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</td>
                                    <td>
                                        @if($appointment->status == 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($appointment->status == 'confirmed')
                                            <span class="badge bg-success">Confirmed</span>
                                        @elseif($appointment->status == 'cancelled')
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                  
                                    <td>
                                        <!-- Confirm Button -->
                                        <form action="{{ route('appointments.updateStatus', ['id' => $appointment->id]) }}" method="POST" style="display:inline;" class="confirm-form">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="confirmed">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="bi bi-check-circle"></i> Confirm
                                            </button>
                                        </form>

                                        <!-- Cancel Button with SweetAlert -->
                                        <form action="{{ route('appointments.updateStatus', ['id' => $appointment->id]) }}" method="POST" style="display:inline;" class="cancel-form">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="cancelled">
                                            <button type="button" class="btn btn-danger btn-sm cancel-btn">
                                                <i class="bi bi-x-circle"></i> Cancel
                                            </button>
                                        </form>
                                    </td>
                                    <td>
    <!-- Show Details Button with Icon -->
    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-info btn-sm">
        <i class="bi bi-eye"></i> Show
    </a>
    
    <!-- Edit Button with Icon -->
    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">
        <i class="bi bi-pencil"></i> Edit
    </a>
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

<!-- SweetAlert confirmation for Cancel button -->
<script>
    document.querySelectorAll('.cancel-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const form = this.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to cancel this appointment?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, cancel it!',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
