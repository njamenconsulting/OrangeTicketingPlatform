<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">

    <a class="navbar-brand px-2"><img src="{{asset('dashboard/brand/ORANGE_LOGO_rgb.jpg')}}" alt="Logo Oange CMR" title="Back to homepage"  width="40" height="40"/></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">

  @if(@auth()->check())
    <div class="dropdown mx-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-user-tie"></i>
       Hey' {{Auth::user()->name}} !
      </button>
      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
        <li>
            <a class="dropdown-item {{ request()->routeIs( 'users.show', ['user' => Auth::user()->id] ) ? 'active' : ''}}" href="  {{ route('users.show', ['user' => Auth::user()->id] ) }} ">
              <span class="icon"><i class="fas fa-user-circle"></i></span>
              <span>Profile </span>                 
            </a>
          </li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}">
            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
              <span>Logout</span>                
            </a>
        </li>
      </ul>
  </div>
  @endif
</header>