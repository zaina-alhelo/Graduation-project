@extends('doctor.master')

@section('title-page')
Appointment Details
@endsection

@section('content')

    <div class="row ">
        <div class="col-lg-12">

            <div class="card shadow-sm border-0 rounded-4 mt-4">
                <div class="card-body p-4">

                    <h3 class="card-title text-center mb-4 text-success">
                        <i class="bi bi-calendar-check"></i> Appointment Details
                    </h3>

                    <!-- 👤 Patient Info -->
                    <div class="bg-light rounded-3 p-3 mb-4 border-start border-4 border-primary">
                        <h5 class="text-primary mb-3"><i class="bi bi-person-fill"></i> Patient Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> {{ $appointment->patient->name }}</p>
                                <p><strong>Email:</strong> {{ $appointment->patient->email ?? '—' }}</p>
                                <p><strong>Phone:</strong> {{ $appointment->patient->phone ?? '—' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Gender:</strong> {{ ucfirst($appointment->patient->gender ?? '—') }}</p>
                                <p><strong>Birth Date:</strong> {{ $appointment->patient->birth_date ?? '—' }}</p>
                                <p><strong>Age:</strong> 
                                    @if($appointment->patient->birth_date)
                                        {{ \Carbon\Carbon::parse($appointment->patient->birth_date)->age }} years
                                    @else
                                        —
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- 🕒 Appointment Info -->
                    <div class="bg-white rounded-3 p-3 mb-4 border-start border-4 border-success">
                        <h5 class="text-success mb-3"><i class="bi bi-clock-history"></i> Appointment Details</h5>
                        <p><strong>Date:</strong> {{ $appointment->date }}</p>
                        <p><strong>Day:</strong> {{ \Carbon\Carbon::parse($appointment->date)->translatedFormat('l') }}</p>
                        <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</p>

                        <p><strong>Status:</strong>
                            @if($appointment->status == 'pending')
                                <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split"></i> Pending</span>
                            @elseif($appointment->status == 'confirmed')
                                <span class="badge bg-success"><i class="bi bi-check-circle"></i> Confirmed</span>
                            @elseif($appointment->status == 'cancelled')
                                <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Cancelled</span>
                            @endif
                        </p>

                        <p><strong>Notes:</strong> {{ $appointment->notes ?? 'No notes available for this appointment.' }}</p>
                    </div>

                    <!-- ✍️ Add/Edit Note Button -->
                        <div class="text-center mb-3">
                            <button class="btn btn-outline-primary rounded-pill px-4 py-2" id="toggleNoteForm">
                                <i class="bi bi-pencil-square me-1"></i> Add / Edit Note
                            </button>
                        </div>

                    <!-- 📝 Note Form -->
                    <form action="{{ route('appointments.updateNote', $appointment->id) }}" method="POST" class="mb-4" id="noteForm" style="display: none;">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="notes" class="form-label fw-bold">Write Note:</label>
                            <textarea name="notes" id="notes" class="form-control rounded-3" rows="4">{{ $appointment->notes }}</textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success rounded-pill px-4">
                                <i class="bi bi-save2"></i> Save Note
                            </button>
                        </div>
                    </form>

                    <!-- 🔙 Back Button -->
                    <div class="text-start">
                        <a href="{{ route('appointments.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="bi bi-arrow-left-circle"></i> Back to Appointments
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('toggleNoteForm')?.addEventListener('click', function () {
        const form = document.getElementById('noteForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });
</script>

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
