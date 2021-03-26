<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 mt-3">

        <div class="shadow-lg bg-body rounded">
  
            <a class="nav-link h5 {{ request()->is('home') ? 'active' : ''}}"
               aria-current="page" href="{{url('home')}}">
                <i class="fas fa-tachometer-alt"></i>Dashboard  </a>
        </div>

        <hr>
        {{-- @auth('admin')   --}}
        <!-- ADMIN -->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>ADMIN</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
            <i class="fas fa-user-tie"></i>
        </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
            <a class="nav-link {{ request()->routeIs( 'users-create' ) ? 'active' : ''}}"
               aria-current="page" href="{{route( 'users-create' )}}">
                <i class="fas fa-user-plus"></i>
                   Add User  
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ request()->routeIs( 'users-index' ) ? 'active' : ''}}"
               aria-current="page" href="{{route('users-index')}}">
                <i class="fas fa-eye"></i>
                   Show Users
                </a>
            </li>
  
            <li class="nav-item">
            <a class="nav-link {{ request()->routeIs( 'roles.create' ) ? 'active' : ''}}"
               aria-current="page" href="{{ route( 'roles.create' ) }}">
                <i class="fas fa-clipboard-list"></i>
                   Add Role
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('roles.index') ? 'active' : ''}}"
               aria-current="page" href="{{ route('roles.index')}}">
                <i class="fas fa-eye"></i>
                   Show Roles
                </a>
            </li>
        </ul><!-- ../ ADMIN  -->
        {{--  @endauth   --}}
      

        <hr>
        
        <!-- TICKETS -->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span> TICKETS</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
            <i class="fas fa-ticket-alt"></i>
        </a>
        </h6>
      
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
            <a class="nav-link {{ request()-> routeIs( 'dispatchers',['status'=> 'Created'] ) ? 'active' : ''}}"
               aria-current="page" href="{{  route('dispatchers',['status'=> 'Created'] ) }}">
                <i class="fas fa-arrows-alt"></i>
                  Dispatch Ticket(s)
                </a>
            </li>
    
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs( 'closures',['status'=> 'Started'] ) ? 'active' : ''}}"
                  aria-current="page" href="{{ route('closures',['status'=> 'Started'] ) }}">
                  <i class="fas fa-door-closed"></i>
                   Closure Ticket(s)
                </a>
            </li>
        </ul><!-- ../ TICKETS -->
  
        

         <!-- TICKETS --><!--
        <ul class="nav flex-column mb-2">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="ticketMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-clipboard"></i>  
                DISPATCHER MENU
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="ticketMenu">
                <li>
                    <a class="nav-link {{ request()-> routeIs( 'dispatchers',['status'=> 'Created'] ) ? 'active' : ''}}"
                        aria-current="page" href="{{  route('dispatchers',['status'=> 'Created'] ) }}">
                    <i class="fas fa-arrows-alt"></i>
                    Dispatch Ticket(s)
                    </a>
                </li>
                <li>

                </li>
                <li>
                    <a class="dropdown-item {{ request()->is('tickets/show') ? 'active' : ''}}" 
                    href="{{url('tickets/show')}}"> 
                    <i class="fas fa-chart-line"></i>
                    Closure Ticket(s)</a>
                </li>
            </ul>
            </li>
        </ul> ../ TICKETS -->

    </div>
</nav>