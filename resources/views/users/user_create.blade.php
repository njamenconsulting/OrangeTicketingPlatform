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
   

<span class="border h5 fw-bold text-muted"> Create New User</span>

<hr>

<div class="row ">

@include('dashboard/messages/flash-message-dashboard')

    <form class ="border border-warning" role="form" method="POST" action ="{{route('users-store')}}">
          @csrf
            <div class="row g-3 m-2">
                <div class="col-sm-6">
                    <label for="name" class="form-label"> Fullname:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  placeholder="User name" value="{{old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="email" class="form-label"> Email:</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="" value="{{old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6">

                        <label for="phone" class="form-label">Phone number:</label>
                        <input type="tel" class="form-control  @error('phone') is-invalid @enderror" name="phone" placeholder="User Phone in format 6XXXXXXXX " value="{{old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="password" class="form-label"> Password:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="User password" value="{{old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="password_confirmation" class="form-label"> Password Confirmation:</label>
                        <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Password confirmation">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="col-sm-6">
                        <ul class="list-group m-2">
                            <li class="list-group-item active  bg-dark border-dark">Add Role(s)</li>
                            @foreach($roles as $role)
                                <li class="list-group-item">
                                    <div class="form-check">                           
                                        <input class="form-check-input" type="checkbox" value=" {{ $role->id }}" name="role_id[]" id="check-box-{{$role->id}}"  {{ in_array($role->id, old("role_id") ?: []) ? "checked ": " " }}>
                                        <label class="form-check-label" for="check-box-{{$role->id}}" >
                                        {{ $role->name }}: {{ $role->description }}
                                        </label>
                                    </div>                                
                                </li>                        
                            @endforeach
                        </ul>
                        @error('role_id[]')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <button class="w-100 btn btn-lg text-white" style="background-color: #FF4500;" type="submit">Submit</button>
                </div>

            </div>

    </form>
    </div>  
@endsection