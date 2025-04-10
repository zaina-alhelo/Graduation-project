@extends('doctor.master')

@section('title-page')
Overview
@endsection

@section('content')
<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">
        <!-- Users Card -->
        <div class="col-xxl-4 col-xl-12">
          <div class="card info-card customers-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li>
                  <a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'today']) }}">
                    Today
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'month']) }}">
                    This Month
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'year']) }}">
                    This Year
                  </a>
                </li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Users <span>| {{ ucfirst($filter) }}</span></h5> <!-- عرض الفلتر الحالي -->
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $userCount }}</h6> <!-- عرض عدد المستخدمين -->
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Users Card -->

        <!-- Doctors Card -->
        <div class="col-xxl-4 col-xl-12">
          <div class="card info-card customers-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li>
                  <a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'today']) }}">
                    Today
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'month']) }}">
                    This Month
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('doctor.dashboard', ['filter' => 'year']) }}">
                    This Year
                  </a>
                </li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Doctors <span>| {{ ucfirst($filter) }}</span></h5> <!-- عرض الفلتر الحالي -->
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person-badge"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $doctorCount }}</h6> <!-- عرض عدد الأطباء -->
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Doctors Card -->
      </div>
    </div>
  </div>
</section>
@endsection
