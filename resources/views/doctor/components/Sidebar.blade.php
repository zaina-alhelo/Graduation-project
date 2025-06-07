  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('doctor.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

   
      
      
      

   



      <li class="nav-heading">Pages</li>

      <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('available_times.index') }}">
        <i class="bi bi-calendar-check"></i>
        <span>Available Times</span>
    </a>
</li><!-- End Available Times Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('appointments.index') }}">
        <i class="bi bi-calendar-event"></i>
        <span>Manage Appointments</span>
    </a>
</li><!-- End Manage Appointments Nav -->

    <li class="nav-item">
  <a class="nav-link collapsed" href="{{ route('message.index', Auth::user()->id) }}">
    <i class="bi bi-chat-dots"></i>
    <span>Chats</span>
  </a>
</li>
  


      
         <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('doctor.diagnose') }}">
          <i class="bi bi-clipboard-pulse"></i>
          <span>Diagnose</span>
        </a>
      </li><!-- End Medical Condition Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->