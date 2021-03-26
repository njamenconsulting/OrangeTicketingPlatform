<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!--
      Neue Helvetica is a trademark of Monotype Imaging Inc. registered in the U.S.
      Patent and Trademark Office and may be registered in certain other jurisdictions.
      Copyright © 2014 Monotype Imaging Inc. All rights reserved.
      Orange Company had buy the right for used Helvetica onto digital applications.
      If you are not autorized to used it, don't include the orangeHelvetica.css
      See NOTICE.txt for more informations.
    -->
    <link rel="stylesheet" href="{{asset('assets/css/orangeHelvetica.css')}}" />
    <!--
      Orange Icons
      Copyright (C) 2016 Orange SA All rights reserved
      See NOTICE.txt for more informations.
    -->
    <link rel="stylesheet" href="{{asset('assets/css/orangeIcons.css')}}" />

    <!-- Boosted CSS -->
    <link rel="stylesheet" href="{{asset('assets/css//boosted.css')}}">
  </head>
  <body class ="bg-primary">

      @include('guests.layouts._header')

      <div class="container">
        
        <div class="row p-3 ">
            @yield('main_content')
        </div>
        
      </div>
        <!-- jQuery first, then Tether, then Boosted JS. -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/boosted.js')}}"></script>
  </body>
</html>