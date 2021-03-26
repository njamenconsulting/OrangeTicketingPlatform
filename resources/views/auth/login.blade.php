@extends('guests.layouts.app')

@section('main_content')
<div class="m-auto p-2" style ="background-color: #f5f5f5;">

    <form method="POST" action="{{route('authenticate')}}" class="form-signin">
        @csrf
        <img src="{{asset('assets/img/ORANGE_LOGO_rgb.jpg')}}" alt="Back to homepage" class="rounded mx-auto d-block" width="100" height="100" title="Back to homepage"/>
        
        <h1 class="h3 m-2 text-center font-weight-normal">Please sign in</h1>
        @include('flash-message')
        <label for="email" class="sr-only">Email address</label>
        <input type="email" id="email" name="email"  value="{{old('email') }}" class="form-control" placeholder="Email address">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror       

        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password"  value="{{old('password') }}" class="form-control" placeholder="Password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror  

        <div class="checkbox mb-3">
            <label>
                  <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>

        <button class="btn btn-lg btn-block text-primary" type="submit" style ="background-color: #292b2c;">Sign in</button>
        
        <p class="mt-5 mb-3 text-muted">&copy; Orange Digital Center 2021 (njamenconsulting@gmail.com)</p>

    </form>
</div>
@endsection