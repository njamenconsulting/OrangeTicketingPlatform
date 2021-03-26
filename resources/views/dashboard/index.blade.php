@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
    </button>
    </div>
</div>
   


<span class="border h5 fw-bold text-muted">Statistics and Average</span>

    <hr>

    <div class="row align-items-start">

        <div class="col">

            <div class="card bg-inverse shadow-sm ">
                <div class="card-header bg-info text-center fw-bold">
                    Tickets Statistics
                </div>
                <div class="card-body">

                    <ul class="list-group">
                        <li class="list-group-item"> Terminated <span class="badge bg-secondary">12</span></li>
                        <li class="list-group-item"> Started  <span class="badge bg-danger">64</span></li>
                        <li class="list-group-item"> Cancelled  <span class="badge bg-warning">New</span></li>
                    </ul>

                </div>
            </div>

        </div>
        <div class="col">

        </div>
        <div class="col">


            <div class="card bg-inverse shadow-lg">
                <div class="card-header bg-warning text-center fw-bold">
                    Handled Tickets Statistics per day
                </div>
                <div class="card-body">

                    <canvas class="my-2 w-200" id="myChart" width="400" height="200"></canvas>

                </div>
            </div>

        </div>
    </div>

@endsection
                          
<script type="text/javascript"  src="{{asset('dashboard/js/chart.js/Chart.bundle.js')}}"></script>
<script type="text/javascript"  src="{{asset('dashboard/js/chart.js/stat.js')}}"></script>