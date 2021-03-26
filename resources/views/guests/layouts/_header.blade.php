<header role="banner">
    <nav class="navbar navbar-inverse navbar-toggleable-sm">
        <div class="container">
            <a href="{{url('/')}}" class="navbar-brand"><img src="{{asset('assets/img/ORANGE_LOGO_rgb.jpg')}}" alt="Back to homepage" title="Back to homepage"/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsing-navbar">
                <span class="sr-only">toggle navigation</span>
                <span class="icon-menu"></span>
            </button>
            <div class="navbar-collapse collapse" id="collapsing-navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link
                                {{request()->is('/') ? 'active' : ''}}"
                           href="#"
                        > About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link
                                {{request()->is('/tickets/create') ? 'active' : ''}}"
                           href="{{route('ticket-create')}}"
                        > New ticket</a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link
                                {{request()->is('auth/login') ? 'active' : ''}}"
                           href="{{url('auth/login')}}"> Private Area</a>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Help</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link icon">
                            <span class="sr-only">open basket</span>
                            <span class="icon-buy" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link icon">
                            <span class="sr-only">open search bar</span>
                            <span class="icon-search" aria-hidden="true"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>