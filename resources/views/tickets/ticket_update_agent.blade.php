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

             <!-- .. Dropdown  -->
                <div class="dropdown mx-3">
                    
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <!-- ../ CHECK ALL BTN -->
                        <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                        <label class="btn btn-outline-dark" for="btncheck1"  onclick="checkAll()"> Check All</label>
                        <button type="button" class="btn btn btn-outline-dark"> Submit </button>
                        <!-- ../ CHECK ALL BTN -->
                        <!--  ROW NUMBER PER PAGE -->
                        <div class="btn-group">
                            <button type="button" class="btn btn btn-outline-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Number of Rows
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href=" {{ route('dispatchers',['nberRows'=> 10] )  }} "> 10 </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href=" {{ route('dispatchers',['nberRows'=> 50] )  }} "> 50 </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href=" {{ route('dispatchers',['nberRows'=> 10] )  }} ">  100 </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href=" {{ route('dispatchers',['nberRows'=> 10] )  }} "> All</a></li>
                            </ul>
                        </div><!-- ../ ROW NUMBER PER PAGE -->
                        
                    </div>

                </div> <!-- ../ Dropdown  -->
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

            <thead style="background-color: #FFF20E; font-weight: bold;">
            <tr>
            @include('dashboard/messages/flash-message-dashboard')
            </tr>
                <tr>
                    <th># ID</th>
                    <th>

                    <!--  DROPDOWN CATEGORY -->
                    <ul class="nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-center text-dark p-2" href="#" style="background-color:#C0C0C0" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            CATEGORY
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        @foreach($categoryColumnValues as $value)
                                <li>
                                    <a class="dropdown-item {{ request()->is(route('dispatchers',['category'=>$value->title] )) ? 'active' : ''}}" href=" {{ route('dispatchers',['category'=>$value->title] ) }} ">
                                    {{$value->title}}                
                                    </a>
                                </li>
                    
                            @endforeach
                        </ul>
                        </li>
                    </ul><!-- ../ DROPDOWN CATEGORY -->   

                    </th>
                    <th>Description</th>
                    <th>

                    <!--  DROPDOWN STATUS-->             
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark p-2" href="#" style="background-color:#C0C0C0" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            STATUS
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            @foreach($statusColumnValues as $value)
                                <li>
                                    <a class="dropdown-item {{ request()->is( route('dispatchers',['status'=> $value->status] ) ) ? 'active' : ''}}" href=" {{ route('dispatchers',['status'=> $value->status] )  }} ">
                                    {{ $value->status }}                
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        </li>
                    </ul><!-- ../ DROPDOWN STATUS-->
                                   
                    </th>
                    <th>Created at</th>
                    <th>Started at</th>
                    <th>User ID</th>
                    <th>
                    
                    <!-- DROPDOWN ASSIGN TO -->   
                    <ul class="nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-center text-dark p-2" href="#" style="background-color:#C0C0C0" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ASSIGN TO
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            @foreach($agents as $agent)
                                <li>
                                    <a class="dropdown-item {{ request()->is(route('dispatchers',['category'=>$agent->id] )) ? 'active' : ''}}" href=" {{ route('dispatchers',['category'=>$agent->id] ) }} ">
                                    {{$agent -> name}}                
                                    </a>
                                </li>
                    
                            @endforeach
                        </ul>
                        </li>
                    </ul> 
                    <!-- ../ DROPDOWN ASSIGN TO -->                        
                    
                    </th>
                </tr>
            </thead>
            @foreach ($tickets as $ticket)
                <tbody>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="ticketId" id="ticketId_{{$ticket->id}}">
                            <label class="form-check-label" for="ticketId_{{$ticket->id}}"> {{$ticket->id}}</label>
                        </div>                   
                    
                   </td>
                    <td>{{$ticket->title}}</td>
                    <td>{{$ticket->description}}</td>
                    <td class="badge bg-warning text-dark">{{$ticket->status}}</td>
                    <td>{{$ticket->created_at}}</td>
                    <td>{{$ticket->started_at}}</td>
                    <td>{{$ticket->user_id}}</td>
                    <td>
                        <form class="row gy-2 gx-3 align-items-center" method="POST" action="{{ route('dispatchers') }}">
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
            
            let btncheck1=  document.querySelector('#btncheck1');

            if(btncheck1.checked){
           
               var items = document.getElementsByName('ticketId');
               for (var i = 0; i < items.length; i++) {
                   if (items[i].type == 'checkbox')
                       items[i].checked = true;
               }
            }
            else{
                var items = document.getElementsByName('ticketId');
                for (var i = 0; i < items.length; i++) {
                   if (items[i].type == 'checkbox')
                       items[i].checked = false;
                }
            }

           }

</script>
@endsection