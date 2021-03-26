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
   


<span class="border h5 fw-bold text-muted"> User Details</span>

<hr>
<div class="row">

    <div class="col-6">
        <h6 class="fw-bold">User's Profile</h6>
        <hr>
        <ul class="list-group">

            <li class="list-group-item">ID: <strong>{{ $user->id }}</strong></li>
            <li class="list-group-item">Nom: <strong>{{ $user->name }}</strong></li>
            <li class="list-group-item">Email: <strong>{{ $user->email }}</strong></li>
            <li class="list-group-item">Phone: <strong>{{ $user->phone }}</strong></li>
            <li class="list-group-item">
                Roles: @foreach($user_roles as $user_role)
                    <span class="badge" style="background-color: #FF7900;">{{ $user_role->name }}</span>
                @endforeach
            </li>
        </ul>

    </div>

    <div class="col-6">

        <h6 class="fw-bold">Add user's role(e)</h6>
        <hr>

        @include('dashboard/messages/flash-message-dashboard')

        <form method="POST" action="{{route('user-set-role')}}">
            @method('PUT')
            @csrf

            <input type="hidden" id="userID" name="userID" value="{{  $user->id  }}">

            <select class="form-select form-select-sm" name="roles[]" multiple  required >
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ in_array( $role->id, old('roles') ?: [] ) ? 'selected' : '' }}> {{ $role->name }} : {{ $role->description }} </option>
                @endforeach
            </select>

            <button name="set-role-to-user" value="set-role-to-user" type="submit" class="btn btn-dark btn-sm mt-2" style="text-color: #FF7900;">Add Role(s)</button>
        </form>

    </div>
</div>
@endsection