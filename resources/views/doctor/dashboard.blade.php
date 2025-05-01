@extends('doctor.master')

@section('title-page')
Overview
@endsection

@section('content')
<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row g-4">

        <!-- Users Card -->
       <div class="col-xxl-4 col-xl-12 mb-4">
  <div class="card info-card customers-card shadow-sm">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-three-dots"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>
        <li><a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'today']) }}">Today</a></li>
        <li><a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'month']) }}">This Month</a></li>
        <li><a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'year']) }}">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Users <span>| {{ ucfirst($filter) }}</span></h5>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-primary text-white">
          <i class="bi bi-person fs-4"></i>
        </div>
        <div class="ps-3">
          <h6 class="mb-0">{{ $userCount }}</h6>
          <small class="text-muted">Total users</small>
        </div>
      </div>
    </div>

  </div>
</div>


        <!-- Doctors Card -->
      <div class="col-xxl-4 col-xl-12 mb-4">
  <div class="card info-card customers-card shadow-sm">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-three-dots"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>
        <li><a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'today']) }}">Today</a></li>
        <li><a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'month']) }}">This Month</a></li>
        <li><a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'year']) }}">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Doctors <span>| {{ ucfirst($filter) }}</span></h5>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-success text-white">
          <i class="bi bi-person-badge fs-4"></i>
        </div>
        <div class="ps-3">
          <h6 class="mb-0">{{ $doctorCount }}</h6>
          <small class="text-muted">Total doctors</small>
        </div>
      </div>
    </div>

  </div>
</div>

        <!-- Filter Options -->
        <div class="col-md-12">
          <div class="d-flex justify-content-end mb-2">
            <div class="dropdown">
              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Filter by: {{ ucfirst($filter) }}
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'today']) }}">Today</a></li>
                <li><a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'month']) }}">This Month</a></li>
                <li><a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'year']) }}">This Year</a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Appointments Table -->
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Appointments <span class="text-muted">| {{ ucfirst($filter) }}</span></h5>

              @if($appointments->count())
              <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                  <thead class="table-light">
                    <tr>
                      <th>#</th>
                      <th>Patient Name</th>
                      <th>Appointment Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($appointments as $index => $appointment)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $appointment->patient->name ?? 'N/A' }}</td>
                      <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d H:i') }}</td>
                      <td>
                        @php
                          $status = strtolower($appointment->status);
                          $badgeClass = match($status) {
                            'confirmed' => 'success',
                            'cancelled' => 'danger',
                            'pending' => 'warning',
                            default => 'secondary'
                          };
                        @endphp
                        <span class="badge bg-{{ $badgeClass }}">{{ ucfirst($status) }}</span>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              @else
              <p class="text-muted">No appointments found for {{ $filter }}.</p>
              @endif

            </div>
          </div>
        </div><!-- End Appointments Table -->

      </div>
    </div><!-- End Left Side Columns -->
<!-- Chart Card -->
<div class="col-12 col-xl-6">
  <div class="card shadow-sm">
    <div class="card-body">
      <h5 class="card-title">Appointments Trend <span class="text-muted">| Last 7 Days</span></h5>
      <canvas id="appointmentsChart" style="min-height: 300px;"></canvas>
    </div>
  </div>
</div>

  </div>
</section>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('appointmentsChart').getContext('2d');
  const appointmentsChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: @json($chartLabels),
      datasets: [{
        label: 'Appointments',
        data: @json($chartData),
        fill: true,
        backgroundColor: 'rgba(78, 115, 223, 0.2)',
        borderColor: 'rgba(78, 115, 223, 1)',
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          stepSize: 1
        }
      }
    }
  });
</script>

@endsection

