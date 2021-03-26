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

    <span class="border h5 fw-bold text-muted"> Users list</span>

    <hr>
    <nav class="navbar navbar-light border border-dark" style="background-color: #FF7900;">
        <div class="btn-group mx-2">
            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul>
        </div>
        <form class="d-flex mx-2">
            <input class="form-control-sm me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm btn-outline-dark" type="submit">Search</button>
        </form>
    </nav>

    <div class="table-responsive">
        <table class="table table-bordered table-light table table-hover table-sm">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Role(s)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge" style="background-color: #FF7900;"> {{ $role->name }} </span>
                            @endforeach
                        </td>
                        <td><a href="{{route('user-detail',[ 'id' => $user->id ] )}}" class="btn btn-sm btn-dark"> Details </a> </td>
                    </tr>
                @endforeach
            </tbody>
        
            
        
        </table>
        {{ $users->links() }}

    </div>  
@endsection