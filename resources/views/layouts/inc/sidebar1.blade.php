<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <i class="fas fa-clinic-medical"></i>
      </div>
      <div class="sidebar-brand-text mx-3">OPMRS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Menus
    </div>
    
    @auth
        <!-- Nav Item - Consulting -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('Profile.create')}}">
          <i class="fas fa-user"></i>
          <span>Profile</span>
        </a>
      </li>
      <!-- Nav Item - Consulting -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('Dependent.create')}}">
          <i class="fas fa-users"></i>
          <span>Dependents</span>
        </a>
      </li>      
    <!-- Divider -->
    <hr class="sidebar-divider">
      <!-- Nav Item - Consulting -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-bed"></i>
          <span>Book Appointment</span>
        </a>
      </li> 
      <!-- Nav Item - Consulting -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('medicals')}}">
          <i class="fas fa-file-alt"></i>
          <span>Medical History</span>
        </a>
      </li> 
        <hr class="sidebar-divider">
      <!-- Nav Item - Consulting -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
        
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>           
    @endauth

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>