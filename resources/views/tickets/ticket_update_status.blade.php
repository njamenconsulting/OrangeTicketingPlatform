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
   


<span class="border h5 fw-bold text-muted"> Your Tickets to Handle </span>

<hr>
            <div class="table-responsive">

             <!-- BAR TABLE -->
             <div class="d-flex bd-highlight mb-3 border border-dark" style="background-color: #FF7900;">
                <div class="me-auto p-2 ">

                    <div class="btn-group">
                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Number of Rows
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href=" {{ route('closures',['nberRows'=> 10] )  }} "> 10 </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href=" {{ route('closures',['nberRows'=> 50] )  }} "> 50 </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href=" {{ route('closures',['nberRows'=> 10] )  }} ">  100 </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href=" {{ route('closures',['nberRows'=> 10] )  }} "> All</a></li>
                        </ul>
                    </div>

                </div>
                <!-- Filter Form -->
                <div class="p-2 bd-highlight">

           
                
                </div> <!-- Filter Form -->
                <!-- Search Form -->
                <div class="p-2 bd-highlight">
                    <form class="form-row ">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-sm" placeholder="Search" aria-label="Search" aria-describedby="search">
                            <button class="btn btn-sm btn-dark" type="button" name="search" id="search">Button</button>
                        </div>
                    </form>
                </div> <!-- ../ Search Form -->
            </div> <!-- ../ BAR TABLE -->

            <table class="table table-bordered table-light table table-hover text-center table-sm">
                <thead>
                <tr>
                    @include('dashboard/messages/flash-message-dashboard')
                </tr>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>
                    
                    
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle bg-warning  text-dark p-2" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            STATUS
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            @foreach($statusColumnValues as $statusColumnValue)
                                <li>
                                    <a class="dropdown-item {{ request()->is( route('closures',['status'=> $statusColumnValue->status] ) ) ? 'active' : ''}}" href=" {{ route('closures',['status'=> $statusColumnValue->status] )  }} ">
                                    {{ $statusColumnValue->status }}                
                                    </a>
                                </li>
                    
                            @endforeach
                        </ul>
                        </li>
                    </ul>                    
                    
                    
                    </th>

                    <th>Created at</th>
                    <th>Started at</th>
                    <th>User ID</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach ($tickets as $ticket)
                    <tbody>
                    <tr>
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->title}}</td>
                    <td>{{$ticket->description}}</td>
                    <td class="badge bg-warning text-dark">{{$ticket->status}}</td>
                    <td>{{$ticket->created_at}}</td>
                    <td>{{$ticket->started_at}}</td>
                    <td>{{$ticket->user_id}}</td>
                    <td>
                    
                        <form class="row gy-2 gx-3 align-items-center" method="POST" action="{{ route('closures') }}">
                                @csrf
                                @method('PUT')
                            <div class="col-auto">
                               <input type="number" name="userId" value="{{$ticket->user_id}}" hidden>
                               <input type="number" name="ticketId" value="{{$ticket->id }}" hidden>
                            </div>
                            <div class="col-auto">
                            <select class="form-select form-select-sm" name="ticketStatus" aria-label=" Ticket status" required>
                                <option value="" selected>Open this select menu</option>
                                @foreach($statusColumnValues as $statusColumnValue)
                                    @if($ticket->status != $statusColumnValue -> status)
                                        <option value="{{ $statusColumnValue ->status}}" @if(old('ticketStatus') == $statusColumnValue->status) {{ 'selected' }} @endif>
                                            {{ $statusColumnValue ->status }}
                                        </option>
                                    @endif

                                @endforeach
                            </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="set-status-ticket" value="set-status-ticket" class="btn btn-sm btn-dark">Submit</button>
                            </div>
                        </form>


                    </tr>
                    </tbody>

                @endforeach

            </table>

            {{$tickets->links()}}

         </div>
@endsection