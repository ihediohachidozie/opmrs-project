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
      <a class="nav-link" href="{{route('practitioner.dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Menus
    </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Medical Activity</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Consultancy:</h6>
              @if (Auth::user()->profession == 0)
                <a class="collapse-item" href="{{route('Consultancy.create')}}">Admission</a>
                <a class="collapse-item" href="#">Appointments</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Patient's History</h6>
                <a class="collapse-item" href="{{route('history')}}">Medical History</a>
              @elseif (Auth::user()->profession == 1)
                <a class="collapse-item" href="{{route('physician')}}">Physician</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Patient's History</h6>
                <a class="collapse-item" href="{{route('history')}}">Medical History</a>
              @elseif (Auth::user()->profession ==  2)
                <a class="collapse-item" href="{{route('Labtest.index')}}">Lab. Test</a>
              @elseif (Auth::user()->profession == 3)
                <a class="collapse-item" href="{{route('Pharmacy.index')}}">Pharmacy</a>
              
              @endif 
              

            </div>
          </div>
        </li>
          
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>