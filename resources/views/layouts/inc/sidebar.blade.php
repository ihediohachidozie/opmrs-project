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
      <a class="nav-link" href="{{route('dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

 {{--    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Components:</h6>
          <a class="collapse-item" href="buttons.html">Buttons</a>
          <a class="collapse-item" href="cards.html">Cards</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Utilities:</h6>
          <a class="collapse-item" href="utilities-color.html">Colors</a>
          <a class="collapse-item" href="utilities-border.html">Borders</a>
          <a class="collapse-item" href="utilities-animation.html">Animations</a>
          <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    <div class="sidebar-heading">
      Menus
    </div>
    @if($p->count() > 0)
      @if($p[0] != null)
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Medical Activity</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Consultancy:</h6>
              @if ($p[0] == 0)
                <a class="collapse-item" href="{{route('Consultancy.create')}}">Nurse</a>
              @elseif ($p[0] == 1)
                <a class="collapse-item" href="{{route('physician')}}">Physician</a>
              @elseif ($p[0] == 2)
                <a class="collapse-item" href="{{route('Labtest.index')}}">Lab. Test</a>
              @elseif ($p[0] == 3)
                <a class="collapse-item" href="{{route('Pharmacy.index')}}">Pharmacy</a>
              


              @endif 
              
              
              
              
              
              {{-- @if ($p[0] == 1) --}}
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Patient's History</h6>
                <a class="collapse-item" href="{{route('history')}}">Medical History</a>
                {{--                 <a class="collapse-item" href="#">Lab Tests</a>
                <a class="collapse-item" href="#">Prescriptions</a> --}}
              {{-- @endif --}}

            </div>
          </div>
        </li>
          
      @endif
    @elseif(auth()->id() == 1)
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Medical Activity</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{route('Consultancy.create')}}">Patient Admission</a>
              <a class="collapse-item" href="{{route('physician')}}">Consultant</a>
              <a class="collapse-item" href="{{route('Labtest.index')}}">Laboratory</a>
              <a class="collapse-item" href="{{route('Pharmacy.index')}}">Pharmacy</a>   
            </div>
          </div>
        </li>
   @endif



    <!-- Nav Item - Charts -->
    @if (auth()->id() == 1)
      <li class="nav-item">
        <a class="nav-link" href="{{route('Practitionals.create')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Practitioners</span></a>
      </li>        
    @endif


    @auth
      <!-- Nav Item - Consulting -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('medicals')}}">
          <i class="fas fa-hospital-o"></i>
          <span>Medical History</span></a>
      </li>        
    @endauth

  
    <!-- Nav Item - Tables -->
{{--     <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>