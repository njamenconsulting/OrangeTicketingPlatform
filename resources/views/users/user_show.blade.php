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
   


<span class="border h5 fw-bold text-muted"> User Profile</span>

<hr>
<div class="row">

    <div class="col-6">
        <h6 class="fw-bold">Hello <strong>{{ $user->name }} ! You're welcome</strong></h6>
        <hr>
        <ul class="list-group">
            <li class="list-group-item"> ID: <strong>{{ $user->id }}</strong></li>
            <li class="list-group-item"> Nom: <strong>{{ $user->name }}</strong></li>
            <li class="list-group-item"> Email: <strong>{{ $user->email }}</strong></li>
            <li class="list-group-item"> Phone: <strong>{{ $user->phone }}</strong></li>
            <li class="list-group-item">
                Roles: @foreach($roles as $role)
                    <span class="badge" style="background-color: #FF7900;">{{ $role->name }}</span>
                @endforeach
            </li>
        </ul>

        <a href="{{route('users.edit',['user' => $user->id ] )}}" type="submit" class="btn btn-dark btn mt-2" style="text-color: #FF7900;"><i class="fas fa-edit"></i> Edit my profile</a>

    </div>

    <div class="col-6">
    <img src="{{asset('assets/img/cheep.gif')}}" alt="" class="img-fluid" width="125" height="150" loading="lazy"/>

    </div>

</div>
@endsection