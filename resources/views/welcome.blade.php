@extends('guests.layouts.app')

@section('main_content')

  <div class="discovery-module-one-pop-out bg-yellow py-3 py-lg-3">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6 col-lg-4">
          <h2 class="display-3">Ticketing Platform</h2>
          <p class="lead" lang="zxx">           
            Insert your body text in here. Ommoditatur sendand amusanti nobisci psandae dolupta tatur, con corrum sam fugitatiunt aliae
            pa doluptatur sit aut alite excerei ctasimin.
          </p>
          
          <a href=" {{url('tickets/create')}} " class="btn btn-secondary">
            Do you have a complaint?
            <img src="{{asset('assets/img/cheep.gif')}}" alt="" class="img-fluid" width="125" height="150" loading="lazy"/>

          </a>
        </div>
        <div class="col-12 col-md-6 col-lg-8">
          <img src="{{asset('assets/img/discovery.svg')}}" alt="" class="img-fluid" width="660" height="358" loading="lazy"/>

        </div>
      </div>
    </div>
  </div>

@endsection