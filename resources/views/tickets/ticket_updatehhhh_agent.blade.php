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
   
<span class="border h5 fw-bold text-muted">  Tickets List </span>

<hr>
    <div class="table-responsive m-auto">


             <!-- BAR TABLE -->
             <nav class="navbar navbar-light border border-dark" style="background-color: #FF7900;">

             <!-- .. Dropdown Filter -->
                <div class="dropdown mx-3">
                    
                <button type="button" value="selectAll" class="main" onclick="checkAll()"><i class="fas fa-filter"></i>Select All</button>
                <button type="button" value="deselectAll" class="main" onclick="uncheckAll()"><i class="fas fa-cog"></i>Clear</button>

                </div> <!-- ../ Dropdown Filter -->
                  <!-- Filter Form -->
                  <div class="p-2 bd-highlight">
                <form class="d-flex">
                    <input class="form-control-sm me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-sm btn-dark mx-2" type="submit">Search</button>
                </form>
                </div>
            </nav>
             <!-- ../ BAR TABLE -->

        <table class="table table-bordered table-light table-condensed table-hover  text-center table-sm">

            <thead style="background-color:#FFF20E; font-weight: bold;">
            <tr>
            @include('dashboard/messages/flash-message-dashboard')
            </tr>
                <tr>
                    <th># ID</th>
                    <th>
                    
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-center text-dark p-2" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            CATEGORY
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        @foreach($categoryTickets as $categoryTicket)
                                <li>
                                    <a class="dropdown-item {{ request()->is(route('get-ticket-by',['category'=>$categoryTicket->title] )) ? 'active' : ''}}" href=" {{ route('get-ticket-by',['category'=>$categoryTicket->title] ) }} ">
                                    {{$categoryTicket->title}}                
                                    </a>
                                </li>
                    
                            @endforeach
                        </ul>
                        </li>
                    </ul>               
  
                    </th>
                    <th>Description</th>
                    <th>
                                    
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle bg-warning  text-dark p-2" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            STATUS
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        @foreach($statusTickets as $statusTicket)
                                <li>
                                    <a class="dropdown-item {{ request()->is( route('get-ticket-by',['status'=> $statusTicket->status] ) ) ? 'active' : ''}}" href=" {{ route('get-ticket-by',['status'=> $statusTicket->status] )  }} ">
                                    {{ $statusTicket->status }}                
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
                    <th>Assigned ticket</th>
                </tr>
            </thead>
            @foreach ($tickets as $ticket)
                <tbody>
                <tr>
                    <td>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="checkbox" id="checkbox_{{$ticket->id}}">
            <label class="form-check-label" for="checkbox_{{$ticket->id}}"> {{$ticket->id}}</label>
        </div>                   
                    
                   </td>
                    <td>{{$ticket->title}}</td>
                    <td>{{$ticket->description}}</td>
                    <td class="badge bg-warning text-dark">{{$ticket->status}}</td>
                    <td>{{$ticket->created_at}}</td>
                    <td>{{$ticket->started_at}}</td>
                    <td>{{$ticket->user_id}}</td>
                    <td>
                        <form class="row gy-2 gx-3 align-items-center" method="POST" action="{{url('tickets/update')}}">
                            @csrf
                            @method('put')

                            <div class="col-auto">
                                <input type="number" name="ticket_id" value="{{$ticket->id}}" hidden>
                            </div>
                            <div class="col-auto">
                                <select name="agent_id" class="form-select" required>
                                    <option value="">Select a User...</option>
                                    @foreach($agents as $agent)
                                        @if($agent->id != $ticket->user_id )
                                            <option value="{{ $agent->id }}" @if(old('agent_id') == $agent->id) {{ 'selected' }} @endif>
                                                {{ $agent->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="set-ticket-to-agent" value="set-ticket-to-agent" class="btn btn-sm btn-dark">Submit</button>
                            </div>
                        </form>
                    </td>
                </tr>
                </tbody>

            @endforeach

        </table>
        {{ $tickets->links() }}
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
         // Select all check boxes : Setting the checked property to true in checkAll() function
           function checkAll(){
             var items = document.getElementsByName('checkbox');
               for (var i = 0; i < items.length; i++) {
                   if (items[i].type == 'checkbox')
                       items[i].checked = true;
               }
           }
         // Clear all check boxes : Setting the checked property to false in uncheckAll() function
           function uncheckAll(){
             var items = document.getElementsByName('checkbox');
               for (var i = 0; i < items.length; i++) {
                   if (items[i].type == 'checkbox')
                       items[i].checked = false;
               }
           }
</script>
@endsection