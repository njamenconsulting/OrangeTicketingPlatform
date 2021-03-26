@extends('guests.layouts.app')

@section('main_content')

<div class="card col-sm-6 card-outline-primary card-inverse m-auto" style="background-color: #333; border-color: #333;">

  <div class="card-header bg-light">
       <h4 class="card-title text-white"> Describe your complaint</h4>
  </div>

  <div class="card-block">

    @include('flash-message')

    <form action="{{ route('ticket-store') }}" method="post">
        @csrf

        <input type="hidden"  name="ticketStatus" value="Created">


        <div class="mb-3">
            <label for="ticketPhone" class="form-label">Phone address:</label>
            <input type="tel" name="ticketPhone" value="{{old('ticketPhone')}}" placeholder=" 697 654 002" class="form-control @error('ticketPhone') is-invalid @enderror">
            
            @error('ticketPhone')
              <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        
        <div class="mb-3">

            <label for="ticketTitle" class="form-label">Product of your complaint:</label>
            <select class="form-control @error('ticketTitle') is-invalid @enderror" id="ticketTitle" name="ticketTitle"  aria-label="Brand product">
              <option value="" selected>Open this select menu</option>
              <option value="Orange Money">Orange Money</option>
              <option value="Orange Bonus">Orange Bonus</option>
              <option value="Orange Pulse">Orange Pulse</option>
            </select>
            
            @error('ticketTitle')
              <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">

            <label for="ticketDescription" class="form-label"> Describe Your Complaint:</label>
            <textarea  name="ticketDescription" id="ticketDescription"  value="{{old('ticketDescription')}}"  class="form-control @error('ticketDescription') is-invalid @enderror" rows="3"></textarea>
                        
            @error('ticketDescription')
              <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <button type="submit" class="btn btn-primary mb-3"> Submit</button>
    </form>

  </div>
</div>

@endsection