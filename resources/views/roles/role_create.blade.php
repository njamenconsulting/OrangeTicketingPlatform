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
   
    <span class="border h5 fw-bold text-muted"> Create New Role</span>

    <hr>

    @include('dashboard/messages/flash-message-dashboard')

    <form class ="border border-warning m-3" role="form" action="  {{ route('roles.store') }} " method="post">
        @csrf

        <div class="col m-3">

            <div class="mb-3">
                <label for="roleName" class="form-label fw-bold"> Role's Name:</label>
                <input type="text" class="form-control" name="roleName"  value="{{old('roleName')}}" placeholder=" Ex: Dispatcher" class="form-control @error('roleName') is-invalid @enderror" >
                @error('roleName')
                   <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="roleDescription" class="form-label fw-bold"> Role Description:</label>
                <textarea class="form-control" name="roleDescription"  value="{{old('roleDescription')}}" placeholder=" Give in few word a description pf this role" rows="3"></textarea>
                @error('roleDescription')
                   <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col m-3">
            <button class="btn btn-lg text-white" style="background-color: #FF4500;" type="submit">Submit</button>
        </div>
    </form>
 
@endsection