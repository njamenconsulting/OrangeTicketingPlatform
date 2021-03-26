<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Yves NJAMEN, njamenconsulting@gmail.com">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Ticketing Platform- Orange CMR</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('dashboard/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('fontawesome-free/css/all.min.css')}}">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{asset('dashboard/css/dashboard.css')}}" rel="stylesheet">
  </head>
  <body>
    
@include('dashboard/includes/_header')

        <div class="container-fluid">
          <div class="row">
              
              @include('dashboard/includes/_nav')

              <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  
              @yield('content')

              
              </main>

              <footer class="position-sticky-bottom m-2 py-4 bg-dark text-white-50">
                <div class="container text-center">
                  <small>Copyright &copy; 2021 
                  <i class="fas fa-laptop-code"></i> Yves NJAMEN  
                  <i class="fas fa-phone"></i> Tel: (+237) 697 387 673 - 
                  <i class="fas fa-envelope"></i> Email: njamenconsulting@gmail.com</small>
                </div>
            </footer>
 
          </div>
        </div>
       
            
        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="{{asset('dashboard/js/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 5 -->
        <script src="{{asset('dashboard/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
        <!-- Chart JS -->
        <script src="{{asset('dashboard/js/chart.js/Chart.bundle.js')}}"></script>
        <!-- Custum  JS -->
        <script src="{{asset('dashboard/js/dashboard.js')}}"></script>

        @yield('scripts')

  </body>
</html>
