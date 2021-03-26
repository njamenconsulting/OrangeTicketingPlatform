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
   


<span class="border h5 fw-bold text-muted"> Roles List </span>

<hr>
    <div class="table-responsive m-auto ">
             <!-- BAR TABLE -->
            <div class="d-flex bd-highlight mb-3 border border-dark" style="background-color: #FF7900;">
                <div class="me-auto p-2 ">
                </div>
                <!-- Filter Form -->
                <div class="p-2 bd-highlight">
                   <form class="form">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Filter</option>
                            <option value="1">By Status</option>
                            <option value="2">By Oldest</option>
                            <option value="3">By Newest</option>
                        </select>               
                    </form>
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

        <table class="table table-bordered table-light table table-hover table-sm">
            <thead>
            <tr>
                <th># ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            </thead>
            @foreach ($roles as $role)
                <tbody>
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->description}}</td>
                    <td>{{$role->created_at}}</td>

                    <td><a href="{{url('admin/roles/' .$role->id)}}" class="btn btn-sm btn-dark">Details</a> </td>

                </tr>
                </tbody>

            @endforeach

        </table>

        {{ $roles->links() }}

    </div>
@endsection